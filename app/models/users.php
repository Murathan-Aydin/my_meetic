<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../config/database.php';

class User extends Database
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function registerUser($pseudo, $lastname, $firstname, $email, $password, $genre, $birthdate)
    {
        try {
            $firstHash = hash('sha256', $password);
            $hashedPassword = password_hash($firstHash, PASSWORD_DEFAULT);

            $sql = "INSERT INTO user (pseudo, lastname, firstname, email, password, genre, birthdate, deleted) 
            VALUES (:pseudo, :lastname, :firstname, :email, :password, :genre, :birthdate, :deleted)";
            $stmt = $this->bdd->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
            $stmt->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
            $deleted = 0;
            $stmt->bindParam(':deleted', $deleted, PDO::PARAM_STR);
            $stmt->execute();

            return json_encode(['success' => true]);
            exit;
        } catch (PDOException $e) {
            return json_encode(["Erreur lors de l'inscription : " => $e->getMessage()]);
        }
    }

    public function loginUser($email, $password)
    {
        try {
            $req = "SELECT * FROM user WHERE email = :email";
            $sql = $this->bdd->prepare($req);
            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_ASSOC);

            $firstHash = hash('sha256', $password);
            if ($user && password_verify($firstHash, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_pseudo'] = $user['pseudo'];

                echo json_encode(['response' => true, 'sessionId' => $_SESSION['user_id']]);
            } else {
                echo json_encode(["response" => false, "error" => "Email ou mot de passe incorrect."]);
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion : " . $e->getMessage();
        }
    }

    public function registerStepTwoVerify()
    {

        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            try {
                $sql = $this->bdd->prepare('SELECT COUNT(*) FROM user_info WHERE id_user = :user_id');
                $sql->bindParam(':user_id', $userId, PDO::PARAM_INT);
                $sql->execute();
                $result = $sql->fetchColumn();

                return $result > 0;
            } catch (PDOException $e) {
                echo "Erreur lors du follow" . $e->getMessage();
                return false;
            }
        }
    }

    public function registerStepTwo($hobbie, $imageName, $city)
    {
        $userId = $_SESSION['user_id'];

        try {
            $sql = $this->bdd->prepare('INSERT INTO user_info (id_user, loisir, photo, ville) VALUES (:user_id, :hobbie, :image, :city)');
            $sql->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $sql->bindParam(':hobbie', $hobbie, PDO::PARAM_STR);
            $sql->bindParam(':image', $imageName, PDO::PARAM_STR);
            $sql->bindParam(':city', $city, PDO::PARAM_STR);
            $sql->execute();

            echo json_encode(["success" => true, "message" => "Données enregistrées avec succès"]);
        } catch (PDOException $e) {
            echo json_encode(["error" => $e->getMessage(), "success" => false]);
        }
    }


    public function getUser()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $tab = [];
            try {
                $sql = $this->bdd->prepare(
                    'SELECT
                        u.id,
                        u.pseudo,
                        u.lastname,
                        u.firstname,
                        u.birthdate,
                        u.genre,
                        u.email,
                        u.created_at,
                        ui.hobbie,
                        ui.image,
                        ui.city
                    FROM user u
                    INNER JOIN user_info ui ON u.id = ui.id_user
                    WHERE u.id = :idUser'
                );
                $sql->bindParam(':idUser', $id, PDO::PARAM_INT);
                $sql->execute();
                $user = $sql->fetchAll(PDO::FETCH_ASSOC);
                $tab["result"] = $user;
                return ($tab);
            } catch (PDOException $e) {
                $tab["error"] = "Erreur lors de la récuperation des donnée : " . $e->getMessage();
                return ($tab);
            }
        } else {
            return "erreur1";
        }
    }

    public function deleteUser()
    {
        session_start();

        try {
            $sql = "UPDATE user SET deleted = :deleted WHERE id = :user_id";
            $stmt = $this->bdd->prepare($sql);

            $deleted = 'true';
            $userId = $_SESSION['user_id'];

            $stmt->bindParam(':deleted', $deleted, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $stmt->execute();

            return json_encode(["success" => true]);
        } catch (PDOException $e) {
            return json_encode(["success" => true, "Error : " => $e->getMessage()]);
        }
    }

    public function destroy()
    {
        session_start();
        session_unset();
        session_destroy();

        try {

            setcookie("PHPSESSID", "", time() - 3600, '/');
            unset($_COOKIE['cookieName']);

            header('Location: /login');
            exit;
        } catch (PDOException $e) {
            echo 'Error lors de la déconnexion : ' . $e->getMessage();
        }
    }
}

$users = new User($pdo);
// $users->loginUser('azerty@azeryy.com', 'Azerty710?');
