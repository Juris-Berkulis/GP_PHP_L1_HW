<?php
$arr = [2, 5, 6456, 456345, 23, 546, 34534, 34];

function func (array $arr): array
{
    return [
        'max' => max($arr),
        'min' => min($arr),
        'average' => array_sum($arr) / count($arr),
    ];
}

var_dump(func($arr));
