<?php

class TaskProvider
{
    public static function getUndoneList()
    {
        return array_filter($_SESSION['tasks'], fn($task) => !$task->getIsDone());
    }

    public static function getDoneList()
    {
        return array_filter($_SESSION['tasks'], fn($task) => $task->getIsDone());
    }

    public static function getAllList()
    {
        return $_SESSION['tasks'];
    }

    public static function addTask(Task $task)
    {
        $_SESSION['tasks'][$task->getId()] = $task;
    }
}