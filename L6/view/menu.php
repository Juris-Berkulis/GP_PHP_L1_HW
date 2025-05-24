<a href="/">Главная</a>
<?php if ($username === null) : ?>
    <a href="/?controller=security">Авторизации</a>
<?php else : ?>
    <a href="/?controller=security&action=logout">Выход</a>
<?php endif;?>
<a href="/?controller=tasks">Задачи</a>
<br>

<?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?= $username ?>.</p>
<?php endif;?>