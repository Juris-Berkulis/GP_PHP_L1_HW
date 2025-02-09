<?php
$arr = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$evenOrOdd = function ($item)
{
    return $item % 2 ? 'Нечётный' : 'Чётный';
};

$result = array_map($evenOrOdd, $arr);

var_dump($result);
