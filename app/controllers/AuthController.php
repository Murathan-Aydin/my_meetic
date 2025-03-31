<?php

require_once("../models/users.php");

class AuthController extends User
{
    private $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function register()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $pseudo = $data['pseudo'] ?? null;
        $lastname = $data['lastname'] ?? null;
        $firstname = $data['firstname'] ?? null;
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;
        $genre = $data['genre'] ?? null;
        $birthdate = $data['birthdate'] ?? null;

        if ($pseudo && $lastname && $firstname && $email && $password && $genre && $birthdate) {
            echo $this->users->registerUser($pseudo, $lastname, $firstname, $email, $password, $genre, $birthdate);
        } else {
            echo "Tous les champs sont obligatoires.";
        }
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(["error" => "Méthode non autorisée"]);
            exit;
        }

        $data = json_decode(file_get_contents("php://input"), true);

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if ($email && $password) {
            $this->users->loginUser($email, $password);
        } else {
            echo "Tous les champs sont obligatoires.";
        }
    }

    public function stepTwo()
    {
        
        session_start();
    
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(["error" => "Utilisateur non connecté", "success" => false]);
            return;
        }
    
        $hobbie = $_POST['hobbie'] ?? null;
        $image = $_FILES['image'] ?? null;
        $city = $_POST['city'] ?? null;

        if ($hobbie && $image && $city) {

            if ($image['error'] === UPLOAD_ERR_OK) {

                $imageTmpName = $image['tmp_name'];
                $imageName = pathinfo($image['name'], PATHINFO_EXTENSION);
                $userId = $_SESSION['user_id'];

                $newFileName = $userId . "_" . uniqid() . "." . $imageName;
                $destination = dirname(__DIR__, 2) . "/public/storage/" . $newFileName;
                
                if (move_uploaded_file($imageTmpName, $destination)) {
                    return $this->users->registerStepTwo($hobbie, $newFileName, $city);
                } else {
                    echo json_encode(["error" => "Échec de l'upload", "success" => false]);
                }
            } else {
                echo json_encode(["error" => "Erreur lors du téléchargement de l'image", "success" => false]);
            }
            return;
        } else {
            echo json_encode(["error" => "Tous les champs sont obligatoires", "success" => false]);
        }
        return;
    }
    
    public function getUsers()
    {
        return $this->users->getUser();
    }

    public function logout()
    {
        $this->users->destroy();
    }
}

$AuthController = new AuthController($users);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($_POST['action']) && $_POST['action'] === 'logout') {
        $AuthController->logout();
        exit;
    } elseif (isset($data['type']) && $data['type'] === 'register') {
        $AuthController->register();
        exit;
    } elseif (isset($data['type']) && $data['type'] === 'login') {
        $AuthController->login();
        exit;
    } elseif (isset($_POST["type"]) && $_POST['type'] === "stepTwo") {
        $AuthController->stepTwo();
        exit;
    } else {
        echo ["Error : " => "Methode non autorisé"];
    }
} else {
    $res = $AuthController->getUsers();
    echo json_encode($res);
}
