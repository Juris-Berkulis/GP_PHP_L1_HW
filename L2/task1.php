<?php
do {
    $answer = readline("В каком году произошло крещение Руси?\nВарианты: 810, 988 или 740 год");

    switch ($answer) {
        case "810":
        case "740": {
            echo "Ответ неверный!";
            break(2);
        }
        case "988": {
            echo "Поздравляем с правильным ответом!";
            break(2);
        }
    }
} while (true);
