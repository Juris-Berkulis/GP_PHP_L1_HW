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

$tasks = TaskProvider::getAllList() ?? [];

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

if (isset($_REQUEST['newTaskDescription'])) {
    $task = new Task($_REQUEST['newTaskDescription']);
    TaskProvider::addTask($task);

    header('location: ?controller=tasks');
}

if (isset($_GET['action']) && $_GET['action'] === 'updateDone') {
    $taskKey = $_GET['taskKey'];

    if (isset($_SESSION['tasks'])) {
        $_SESSION['tasks'][$taskKey]->setIsDone(!$_SESSION['tasks'][$taskKey]->getIsDone());
    }

    header('location: ?controller=tasks');
}

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $taskKey = $_GET['taskKey'];

    if (isset($_SESSION['tasks'])) {
        unset($_SESSION['tasks'][$taskKey]);
    }

    header('location: ?controller=tasks');
}

include "L6/view/tasks.php";