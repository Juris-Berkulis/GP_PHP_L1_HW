<?php
$group_by_group_name = [
    'БАП1320' => [
        'Смирнова Христина Потаповна' => 5,
        'Рогозин Даниил Арсениевич' => 3,
        'Золин Владилен Леонтиевич' => 2,
        'Архаткина Владислава Никитевна' => 4,
        'Мещерякова Мария Елизаровна' => 5,
        'Саврасова Фаина Ивановна' => 4,
        'Хромченко Зинаида Николаевна' => 2,
        'Протасова Майя Леонидовна' => 3,
    ],
    'ИТ1720' => [
        'Ябров Тимур Чеславович' => 2,
        'Белорусов Ефрем Изяславович' => 3,
        'Ягода Назар Прохорович' => 2,
        'Ярилова Розалия Серафимовна' => 4,
        'Нырко Платон Вадимович' => 5,
        'Калинин Агап Моисеевич' => 3,
        'Никифоров Юлиан Прокофиевич' => 2,
    ]
];

$average_score = [];
$exclude = [];

foreach ($group_by_group_name as $group_name => $group) {
    $average_score[$group_name] = array_sum($group) / count($group);

    foreach ($group as $student_name => $student_score) {
        if ($student_score < 3) {
            $exclude[$group_name][] = $student_name;
        }
    }
}

$top_groups = array_keys($average_score, max($average_score));
$top_groups_string = implode(', ', $top_groups);
$top_average_score = $average_score[$top_groups[0]];

echo "Наивысший средний балл $top_average_score у групп: {$top_groups_string}" . PHP_EOL;
echo "Список студентов на отчисление:" . PHP_EOL;
print_r($exclude);
