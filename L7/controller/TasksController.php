<?php
require_once 'L7/model/User.php';
include_once 'L7/model/Task.php';
include_once 'L7/model/TaskProvider.php';

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$pageHeader = "Задачи";

$user = null;
$username = null;

$pdo = include 'L7/db.php';

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

include "L7/view/tasks.php";