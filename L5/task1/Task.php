<?php
class Task
{
    private ?string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone = false;
    public User $user;

    private array $comments;

    function __construct (User $user, ?string $description, int $priority = 1)
    {
        $this->user = $user;
        $this->setDateCreated();
        $this->description = $description;
        $this->priority = $priority;
    }

    private function getNowDateTime ()
    {
        return new DateTime();
    }

    public function getDateCreated () {
        return $this->dateCreated;
    }

    private function setDateCreated () {
        $this->setDateUpdated();
        $this->dateCreated = $this->getDateUpdated();
    }

    public function getDateUpdated () {
        return $this->dateUpdated;
    }

    private function setDateUpdated () {
        $this->dateUpdated = $this->getNowDateTime();
    }

    public function getDateDone () {
        return $this->dateDone;
    }

    private function setDateDone () {
        $this->setDateUpdated();
        $this->dateDone = $this->isDone ? $this->getDateUpdated() : null;
    }

    public function getDescription () {
        return $this->description;
    }

    public function setDescription (string $value) {
        $this->description = $value;
        $this->setDateUpdated();
    }

    public function markAsDone () {
        $this->isDone = true;
        $this->setDateDone();
    }

    public function markAsDrift () {
        $this->isDone = false;
        $this->setDateDone();
    }

    public function getPriority () {
        return $this->priority;
    }

    public function setPriority (int $value) {
        $this->priority = $value;
    }

    public function getIsDone() {
        return $this->isDone;
    }

    public function setIsDone(bool $value) {
        $this->isDone = $value;
    }

    public function getComments () {
        return $this->comments;
    }

    public function addComments (string $name, int $id, string $text) {
        $this->comments[$id][$name] = $text;
    }

    public function deleteComments (int $id) {
        unset($this->comments[$id]);
    }

}
