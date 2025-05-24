<?php
require_once 'L6/model/User.php';

session_start();

$pageHeader = "Задачи";

$username = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $username = $user->getUsername();
}

$tasks = [
    'Погулять с собакой',
    'Починить компьютер'
];

include "L6/view/tasks.php";