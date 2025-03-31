<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../models/usersAll.php');

class AllUsersController extends Users
{
    private $AllUsers;

    public function __construct($AllUsers)
    {
        $this->AllUsers = $AllUsers;
    }

    public function getAllUsers()
    {
        return $this->AllUsers->getUsers();
    }


    public function addFollower()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $followedId = $data['followedId'];
        
        if ($followedId) {
            return $this->AllUsers->followUser($followedId);
        } else {
            echo "Error : ";
        }
    }
}

$AllUsersController = new AllUsersController($AllUsers);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $users = $AllUsersController->getAllUsers();
    echo json_encode($users);
    exit; 
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = $AllUsersController->addFollower();
    echo json_encode($response);
    exit;
} else {
    echo json_encode(["success" => false, "message" => "Méthode non autorisée."]);
}
