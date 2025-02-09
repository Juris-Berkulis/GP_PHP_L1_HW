<?php
$box = [
    [
        0 => 'Тетрадь',
        1 => 'Книга',
        2 => 'Настольная игра',
        3 => [
            'Настольная игра',
            'Настольная игра',
        ],
        4 => [
            [
                'Ноутбук',
                'Зарядное устройство'
            ],
            [
                'Компьютерная мышь',
                'Набор проводов',
                [
                    'Фотография',
                    'Картина'
                ]
            ],
            [
                'Инструкция',
                [
                    'Ключ'
                ]
            ]
        ]
    ],
    [
        0 => 'Пакет кошачьего корма',
        1 => [
            'Музыкальный плеер',
            'Книга'
        ]
    ]
];

$targetThing = 'Пакет кошачьего корма';

function searchThing($targetThing, $box)
{
    foreach ($box as $thing) {
        if (is_array($thing)) {
            $result = searchThing($targetThing, $thing);

            if ($result) return true;
        }
        elseif ($thing === $targetThing) {
            return true;
        }
    }

    return false;
}

var_dump(searchThing($targetThing, $box));
