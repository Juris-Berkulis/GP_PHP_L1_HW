<?php

include_once 'Task.php';
include_once 'User.php';

$user1 = new User('Alex', 1992, 'male');

$task1 = new Task($user1, null);
$task1->markAsDone();

print_r($task1);
