<?php

// Для запуска перегрузки базы данных:
// 1. В консоли запустить сервер командой "php8.3 -S localhost:80 L7/fixture.php";
// 2. В браузере перейти по адресу "http://localhost/".

include 'L7/model/User.php';
include 'L7/model/UserProvider.php';

$pdo = include 'L7/db.php';

$pdo->exec('CREATE TABLE users (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(150),
  username VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL
)');

$user = new User('admin');
$user->setName('Juris');

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, '123');

echo 'Перегрузка базы данных выполнена успешно!';
