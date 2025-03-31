<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../config/database.php');

class Users extends Database
{
    private $bdd;

    public function __construct($bdd)
    {
        session_start();
        $this->bdd = $bdd;
    }

    public function getUsers()
    {
        if (!isset($_SESSION['user_id'])) {
            return json_encode(["success" => false, "error" => "Utilisateur non connecté"]);
        }

        $userId = $_SESSION['user_id'];

        try {
            $sql = 'SELECT 
                    u.id, 
                    u.pseudo, 
                    u.lastname, 
                    u.firstname, 
                    u.birthdate, 
                    ui.hobbie, 
                    ui.image, 
                    ui.city
                FROM user u
                INNER JOIN user_info ui ON u.id = ui.id_user
                WHERE u.id != :user_id
            ';

            $stmt = $this->bdd->prepare($sql);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();
            $allUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $followedSql = 'SELECT followed_id FROM user_follower WHERE follower_id = :user_id';
            $followedStmt = $this->bdd->prepare($followedSql);
            $followedStmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $followedStmt->execute();
            $followedUsers = $followedStmt->fetchAll(PDO::FETCH_COLUMN);

            return ["users" => $allUsers, "followId" => $followedUsers];
        } catch (PDOException $e) {
            return json_encode(["success" => false, "error" => "Erreur SQL : " . $e->getMessage()]);
        }
    }

    public function followUser($followedId)
    {
        if (!isset($_SESSION['user_id'])) {
            return json_encode(["success" => false, "error" => "Utilisateur non connecté"]);
        }

        $currentUserId = $_SESSION['user_id'];

        if (!filter_var($followedId, FILTER_VALIDATE_INT)) {
            return json_encode(["success" => false, "error" => "ID utilisateur invalide"]);
        }

        try {
            $checkStmt = $this->bdd->prepare("SELECT COUNT(*) FROM user_follower WHERE follower_id = :follower_id AND followed_id = :followed_id");
            $checkStmt->bindParam(':follower_id', $currentUserId, PDO::PARAM_INT);
            $checkStmt->bindParam(':followed_id', $followedId, PDO::PARAM_INT);
            $checkStmt->execute();
            $alreadyFollowing = $checkStmt->fetchColumn();

            if ($alreadyFollowing) {
                return json_encode(['status' => 'error', 'message' => 'Déjà suivi']);
            }

            $insertStmt = $this->bdd->prepare("INSERT INTO user_follower (follower_id, followed_id) VALUES (:follower_id, :followed_id)");
            $insertStmt->bindParam(':follower_id', $currentUserId, PDO::PARAM_INT);
            $insertStmt->bindParam(':followed_id', $followedId, PDO::PARAM_INT);
            $insertStmt->execute();

            return json_encode(['status' => 'success', 'message' => 'Utilisateur suivi avec succès']);
        } catch (PDOException $e) {
            return json_encode(["success" => false, "error" => "Erreur SQL : " . $e->getMessage()]);
        }
    }
}

$AllUsers = new Users($pdo);
