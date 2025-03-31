<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('./app/models/users.php');
$userModel = new User($pdo);

$route = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

if (isset($_SESSION['user_id'])) {
    if (!$userModel->registerStepTwoVerify($_SESSION['user_id'])) {
        $route = 'registerStep2';
    } elseif ($route === '') {
        $route = 'home';
    }
} else {
    if ($route === '') {
        $route = 'login';
    }
}

switch ($route) {
    case 'home':
        include './app/views/home.php';
        break;
    case 'registerStep2':
        include './app/views/registerStep2.php';
        break;
    case 'user':
        include './app/views/user/user.php';
        break;
    case 'login':
        include './app/views/loginhtml.php';
        break;
    case 'signup':
        include './app/views/signup.php';
        break;
    default:
        include './app/views/error.php';
        break;
}
