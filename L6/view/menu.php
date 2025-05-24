<a href="/">Главная</a>
<a href="/?controller=security">Авторизации</a>
<a href="/?controller=tasks">Задачи</a>
<br>
<?php if ($username !== null) : ?>
    <p>Рады вас приветствовать, <?= $username ?>. <a href="?action=logout">[Выход]</a></p>
<?php endif;?>