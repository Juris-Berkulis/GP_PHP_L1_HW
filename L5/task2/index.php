<?php

include_once 'L5/task1/Task.php';
include_once 'L5/task1/User.php';
include_once 'TaskService.php';
include_once 'Comment.php';

$user1 = new User('Manana', 1998, 'female');

$task1 = new Task($user1, 'This is task description');

TaskService::addComment($user1, $task1, 'Text of the comment 1');
$comment2 = TaskService::addComment($user1, $task1, 'Text of the comment 2');
TaskService::addComment($user1, $task1, 'Text of the comment 3');

$task1->deleteComments($comment2->getId());

print_r($task1);
