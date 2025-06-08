<?php

class TaskProvider
{
    public static function getUndoneList()
    {
        $tasks = $_SESSION['tasks'] ?? [];
        return array_filter($tasks, fn($task) => !$task->getIsDone());
    }

    public static function getDoneList()
    {
        $tasks = $_SESSION['tasks'] ?? [];
        return array_filter($tasks, fn($task) => $task->getIsDone());
    }

    public static function getAllList()
    {
        $tasks = $_SESSION['tasks'] ?? [];
        return $tasks;
    }

    public static function addTask(Task $task)
    {
        $_SESSION['tasks'][$task->getId()] = $task;
    }

    public static function deleteTask(string $id)
    {
        if (isset($_SESSION['tasks'], $_SESSION['tasks'][$id])) {
            unset($_SESSION['tasks'][$id]);
        }
    }

    public static function updateDone(string $id)
    {
        if (isset($_SESSION['tasks'], $_SESSION['tasks'][$id])) {
            $_SESSION['tasks'][$id]->setIsDone(!$_SESSION['tasks'][$id]->getIsDone());
        }
    }
}