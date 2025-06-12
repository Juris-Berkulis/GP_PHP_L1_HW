<?php

// Для запуска проекта:
// 1. В консоли запустить сервер командой "php8.3 -S localhost:80 L8/index.php";
// 2. В браузере перейти по адресу "http://localhost/".

try {
    $controller = $_GET['controller'] ?? 'index';

    $routes = require 'routes.php';

    require_once $routes[$controller] ?? die('404');
} catch (PDOException $exception) {
    echo 'Проблемы с базой данных!';
    var_dump($exception);
} catch (Exception $exception) {
    echo 'Неизвестное исключение!';
    var_dump($exception);
} catch (Error $error) {
    echo 'Неизвестная ошибка!';
    var_dump($error);
} catch (Throwable $throwable) {
    echo 'Неизвестное исключение или ошибка!';
    var_dump($throwable);
}
