<?php

class Task
{
    private string $id;

    private string $description;

    private bool $isDone;

    private int $userId;

    function __construct(string $description = '', $isDone = false)
    {
        $this->id = microtime(true) * 10000 + rand();
        $this->description = $description;
        $this->isDone = $isDone;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

}