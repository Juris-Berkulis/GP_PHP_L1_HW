<?php

class TaskProvider
{
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList($userId)
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE userId = :userId AND isDone = :isDone'
        );

        $statement->execute([
            'userId' => $userId,
            'isDone' => false,
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function getDoneList($userId)
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE userId = :userId AND isDone = :isDone'
        );

        $statement->execute([
            'userId' => $userId,
            'isDone' => true,
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function getAllList(int $userId)
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE userId = :userId'
        );

        $statement->execute([
            'userId' => $userId,
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function addTask(Task $task, int $userId)
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (description, isDone, userId) VALUES (:description, :isDone, :userId)'
        );

        $statement->execute([
            'description' => $task->getDescription(),
            'isDone' => $task->getIsDone(),
            'userId' => $userId,
        ]);

        return $statement->rowCount();
    }

    public function deleteTask(string $id, int $userId)
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND userId = :userId'
        );

        $statement->execute([
            'id' => $id,
            'userId' => $userId,
        ]);

        return $statement->rowCount();
    }

    public function updateDone(string $id, bool $isTaskDone, $userId)
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = :isDone WHERE id = :id AND userId = :userId'
        );

        $statement->execute([
            'isDone' => $isTaskDone,
            'id' => $id,
            'userId' => $userId,
        ]);

        return $statement->rowCount();
    }
}