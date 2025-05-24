<a href="/">Главная</a>
<?php if ($username === null) : ?>
    <a href="/?controller=security">Авторизации</a>
<?php endif;?>
<a href="/?controller=tasks">Задачи</a>
<br>

<?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?= $username ?>. <a href="?action=logout">[Выход]</a></p>
<?php endif;?>