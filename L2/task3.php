<?php
do {
    $number = (int) readline("Введите любое целое положительное число: ");
} while ($number <= 0);

switch ($number % 8) {
    case 1: {
        echo "Большой палец";
        break;
    }
    case 0:
    case 2: {
        echo "Указательный палец";
        break;
    }
    case 3:
    case 7: {
        echo "Средний палец";
        break;
    }
    case 4:
    case 6: {
        echo "Безымянный палец";
        break;
    }
    case 5: {
        echo "Мизинец";
        break;
    }
}
