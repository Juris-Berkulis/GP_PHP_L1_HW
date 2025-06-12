<?php
require_once 'L8/model/User.php';
require_once 'L8/model/UserProvider.php';

session_start();

$pdo = include 'L8/db.php';

$error = null;

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $username, 'password' => $password] = $_POST;

    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($username, $password);

    if ($user === null) {
        $error = 'Пользователь с указанными учетными данными не найден';
    } else {
        $_SESSION['username'] = $user;

        header("Location: index.php");
        die();
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['username']);
    session_destroy();

    header('location: /');
    die();
}

include "L8/view/signin.php";