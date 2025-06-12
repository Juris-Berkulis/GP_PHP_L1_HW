<?php

// Для запуска проекта:
// 1. В консоли запустить сервер командой "php8.3 -S localhost:80 L8/index.php";
// 2. В браузере перейти по адресу "http://localhost/".

$controller = $_GET['controller'] ?? 'index';

$routes = require 'routes.php';

require_once $routes[$controller] ?? die('404');