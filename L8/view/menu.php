<a href="/">Главная</a>
<?php if ($username === null) : ?>
    <a href="/?controller=security">Авторизация</a>
<?php else : ?>
    <a href="/?controller=tasks">Задачи</a>
    <a href="/?controller=security&action=logout">Выход</a>
<?php endif;?>
<br>

<?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?= $username ?>.</p>
<?php endif;?>