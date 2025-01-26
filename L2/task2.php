<?php
$n = 3;
$name = readline("Введите своё имя: ");

const QUESTION1 = "Какая задача стоит перед вами сегодня? ";
const QUESTION2 = "Сколько примерно времени эта задача займет? ";

for ($i = 1, $fullTime = 0; $i <= $n; $fullTime += $$time, $i++) {
    $task = "task$i";
    $time = "time$i";
    $$task = readline(QUESTION1);
    $$time = (int) readline(QUESTION2);
}

echo "$name, сегодня у вас запланировано 3 приоритетных задачи на день:\n";

for ($i = 1; $i <= $n; $i++) {
    $task = "task$i";
    $time = "time$i";
    echo "- {$$task} ({$$time}ч)\n";
}

echo "Примерное время выполнения плана = {$fullTime}ч";
