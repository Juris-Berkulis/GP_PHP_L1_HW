<?php
do {
    $isSuccess = true;
    $answer = readline("В каком году произошло крещение Руси?\nВарианты: 810, 988 или 740 год");

    switch ($answer) {
        case "810":
        case "740": {
            echo "Ответ неверный!";
            break;
        }
        case "988": {
            echo "Поздравляем с правильным ответом!";
            break;
        }
        default: {
            $isSuccess = false;
            break;
        }
    }
} while (!$isSuccess);
