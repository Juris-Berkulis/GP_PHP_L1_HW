<?php
$epithet = ['бесконечного', 'крепкого', 'ошеломительного', 'сногсшибательного', 'огромного'];
$wish = ['счастья', 'здоровья', 'успеха', 'везения', 'богатства'];

$name = readline('Введите имя: ');

$congratulations_count = 3;

$congratulations = [];

for ($i = 0; $i < $congratulations_count; $i++) {
    $epithet_index = array_rand($epithet);
    $wish_index = array_rand($wish);

    $congratulations[] = "$epithet[$epithet_index] $wish[$wish_index]";

    unset($epithet[$epithet_index]);
    unset($wish[$wish_index]);
}

$last_congratulations = array_pop($congratulations);

$congratulations_string = implode(', ', $congratulations);

echo "Дорогой $name, от всего сердца поздравляю тебя с днем рождения, желаю $congratulations_string и $last_congratulations!";
