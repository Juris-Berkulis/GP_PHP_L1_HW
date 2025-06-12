<?php
require_once 'L8/model/User.php';

session_start();

var_dump($_SESSION);

$pageHeader = 'Добро пожаловать';

$username = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $username = $user->getUsername();
}

include "L8/view/index.php";