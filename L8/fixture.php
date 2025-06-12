<?php

// Для запуска перегрузки базы данных:
// 1. В консоли запустить сервер командой "php8.3 -S localhost:80 L8/fixture.php";
// 2. В браузере перейти по адресу "http://localhost/".

include 'L8/model/User.php';
include 'L8/model/UserProvider.php';

$pdo = include 'L8/db.php';

$pdo->exec('CREATE TABLE IF NOT EXISTS users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$user = new User('admin');
$user->setName('Juris');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');

$pdo->exec('CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    description VARCHAR(150) NOT NULL,
    isDone TINYINT NOT NULL,
    userId INTEGER NOT NULL
)');

echo 'Перегрузка базы данных выполнена успешно!';
