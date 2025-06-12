<?php

// Для запуска проекта:
// 1. В консоли запустить сервер командой "php8.3 -S localhost:80 L8/index.php";
// 2. В браузере перейти по адресу "http://localhost/".

include_once 'L8/log/Logger.php';

$logger = new Logger('errors');

try {
    $controller = $_GET['controller'] ?? 'index';

    $routes = require 'routes.php';

    require_once $routes[$controller] ?? die('404');
} catch (PDOException $exception) {
    echo 'Проблемы с базой данных!';
    var_dump($exception);

    $logger->log($exception);
} catch (ExceptionTaskIsEmpty $exception) {
    echo 'Кастомная ошибка!';
    var_dump($exception);

    $logger->log($exception);
} catch (Exception $exception) {
    echo 'Неизвестное исключение!';
    var_dump($exception);

    $logger->log($exception);
} catch (Error $error) {
    echo 'Неизвестная ошибка!';
    var_dump($error);

    $logger->log($error);
} catch (Throwable $throwable) {
    echo 'Неизвестное исключение или ошибка!';
    var_dump($throwable);

    $logger->log($throwable);
}
