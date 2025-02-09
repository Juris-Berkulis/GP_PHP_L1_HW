<?php
$arr1 = range(1, 10);
$arr2 = range(1, 10);

$result = [];

foreach ($arr1 as $key => $value) {
    $result[] = $value * $arr2[$key];
}

print_r($result);
