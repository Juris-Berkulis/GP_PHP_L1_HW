<?php
require_once 'L6/model/User.php';
include_once 'L6/model/Task.php';
include_once 'L6/model/TaskProvider.php';

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$pageHeader = "Задачи";

$username = null;

$tasks = TaskProvider::getAllList();

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $username = $user->getUsername();
}

if (isset($_GET['showTasks']) && $_GET['showTasks'] === 'undone') {
    $tasks = TaskProvider::getUndoneList();
}

if (isset($_GET['showTasks']) && $_GET['showTasks'] === 'done') {
    $tasks = TaskProvider::getDoneList();
}

if (isset($_GET['action']) && $_GET['action'] === 'addTask' && isset($_POST['newTaskDescription'])) {
    $newTaskDescriptionSafe = strip_tags($_POST['newTaskDescription']);
    $task = new Task($newTaskDescriptionSafe);
    TaskProvider::addTask($task);

    header('location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'updateDone') {
    $taskId = $_GET['taskId'];

    TaskProvider::updateDone($taskId);

    header('location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $taskId = $_GET['taskId'];
    TaskProvider::deleteTask($taskId);

    header('location: /?controller=tasks');
    die();
}

include "L6/view/tasks.php";