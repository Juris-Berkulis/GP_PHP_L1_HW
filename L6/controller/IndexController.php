<?php
require_once 'L6/model/User.php';

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$pageHeader = 'Добро пожаловать';

$username = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $username = $user->getUsername();
}

include "L6/view/index.php";