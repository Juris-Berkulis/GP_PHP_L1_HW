<?php
class TaskService
{
    public static function addComment (User $user, Task $task, string $text)
    {
        $comment = new Comment($user, $task, $text);
        $task->addComments($user->getName(), $comment->getId(), $text);

        return $comment;
    }
}
