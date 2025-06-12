<?php
require_once 'L8/model/User.php';
include_once 'L8/model/Task.php';
include_once 'L8/model/TaskProvider.php';

session_start();

var_dump($_SESSION);

$pageHeader = "Задачи";

$user = null;
$username = null;

$pdo = include 'L8/db.php';

$taskProvider = new TaskProvider($pdo);

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];

    if (!$user) {
        header('location: /');
        die();
    }

    $username = $user->getUsername();
}

$tasks = $taskProvider->getAllList($user->getId());

if (isset($_GET['showTasks']) && $_GET['showTasks'] === 'undone') {
    $tasks = $taskProvider->getUndoneList($user->getId());
}

if (isset($_GET['showTasks']) && $_GET['showTasks'] === 'done') {
    $tasks = $taskProvider->getDoneList($user->getId());
}

var_dump($tasks);

if (isset($_GET['action']) && $_GET['action'] === 'addTask' && isset($_POST['newTaskDescription'])) {
    $newTaskDescriptionSafe = strip_tags($_POST['newTaskDescription']);
    $task = new Task($newTaskDescriptionSafe);
    $taskProvider->addTask($task, $user->getId());

    header('location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'updateDone' && isset($_GET['isTaskDone'])) {
    $taskId = $_GET['taskId'];
    $isTaskDone = $_GET['isTaskDone'];

    $taskProvider->updateDone($taskId, $isTaskDone, $user->getId());

    header('location: /?controller=tasks');
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete') {
    $taskId = $_GET['taskId'];
    $taskProvider->deleteTask($taskId, $user->getId());

    header('location: /?controller=tasks');
    die();
}

include "L8/view/tasks.php";