<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1><?= $pageHeader ?></h1>

<?php include "menu.php" ?>

<br>

<form action="?controller=tasks" method="post">
    <label>
        Создать задачу:

        <input name="newTaskDescription">
    </label>
</form>

<div>
    <span>Показать: </span>

    <a href="?controller=tasks&showTasks=undone">Невыполненные</a>

    <a href="?controller=tasks&showTasks=done">Выполненные</a>

    <a href="?controller=tasks">Все</a>
</div>

<div>
    <?php foreach ($tasks as $task):?>
        <div>
            <span><?=$task->getDescription()?></span>

            <a href="?controller=tasks&action=updateDone&taskKey=<?=$task->getId() ?>"><?=$task->getIsDone() ? 'Отменить' : 'Подтвердить' ?></a>

            <a href="?controller=tasks&action=delete&taskKey=<?=$task->getId() ?>">Удалить</a>
        </div>
    <?php endforeach;?>
</div>
</body>
</html>