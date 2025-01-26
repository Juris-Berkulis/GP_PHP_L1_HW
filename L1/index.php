<?php
///**
// * Задание 1
// */
//echo "Задание 1\n";
//
//$name = readline("Введите своё имя: ");
//
//$age = readline("Введите свой возраст: ");
//
//echo "Вас зовут $name, вам $age лет";
//
//echo "\n";
//
///**
// * Задание 2 (Вариант 1)
// */
//echo "Задание 2\n";
//
//$name = readline("Введите своё имя: ");
//
//$question1 = "Какая задача стоит перед вами сегодня? ";
//$question2 = "Сколько примерно времени эта задача займет? ";
//
//$task1 = readline($question1);
//$time1 = (int) readline($question2);
//
//$task2 = readline($question1);
//$time2 = (int) readline($question2);
//
//$task3 = readline($question1);
//$time3 = (int) readline($question2);
//
//$fullTime = $time1 + $time2 + $time3;
//
//echo <<<HERE
//$name, сегодня у вас запланировано 3 приоритетных задачи на день:
//- $task1 ({$time1}ч)
//- $task2 ({$time2}ч)
//- $task3 ({$time3}ч)
//Примерное время выполнения плана = {$fullTime}ч
//HERE;
//
//// Аналог "\n"
//echo PHP_EOL;

/**
 * Задание 2 (Вариант 2)
 */
echo "Задание 2\n";

$name = readline("Введите своё имя: ");

$question1 = "Какая задача стоит перед вами сегодня? ";
$question2 = "Сколько примерно времени эта задача займет? ";

$i = 1;
$fullTime = 0;

$task = "task$i";
$time = "time$i";
$$task = readline($question1);
$$time = (int) readline($question2);
$fullTime += $$time;
$i++;

$task = "task$i";
$time = "time$i";
$$task = readline($question1);
$$time = (int) readline($question2);
$fullTime += $$time;
$i++;

$task = "task$i";
$time = "time$i";
$$task = readline($question1);
$$time = (int) readline($question2);
$fullTime += $$time;
$i++;

echo "$name, сегодня у вас запланировано 3 приоритетных задачи на день:\n";
echo "- {$task1} ({$time1}ч)\n";
echo "- {$task2} ({$time2}ч)\n";
echo "- {$task3} ({$time3}ч)\n";
echo "Примерное время выполнения плана = {$fullTime}ч";
