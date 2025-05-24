<?php
class Comment
{
    private int $id;

    private User $author;
    private Task $task;
    private string $text;

    public function __construct(User $author, Task $task, string $text)
    {
        $this->setAuthor($author);
        $this->setTask($task);
        $this->setText($text);
        $this->setId();
    }

    public function getId()
    {
        return $this->id;
    }

    private function setId()
    {
        $this->id = microtime(true) * 10000 + rand();
    }

    public function getAuthor()
    {
        return $this->author;
    }

    private function setAuthor(User $author)
    {
        $this->author = $author;
    }

    public function getTask()
    {
        return $this->task;
    }

    private function setTask(Task $task)
    {
        $this->task = $task;
    }

    public function getText()
    {
        return $this->text;
    }

    private function setText(string $text)
    {
        $this->text = $text;
    }

}
