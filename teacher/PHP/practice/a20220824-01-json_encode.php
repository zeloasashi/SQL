<?php

$ar = [
    'name' => '林小新',
    'age' => 30,
    'data' => '/abc',
    'data1' => [2,4,6,8],
];

echo json_encode($ar, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);