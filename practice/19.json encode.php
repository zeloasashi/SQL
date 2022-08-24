<?php 
$ar = [
    'name' => '林小新',
    'age' => 30,
    'data' => '/abc',
    'data1' => [2, 4, 6, 8, 10]
];

echo json_encode($ar, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// JSON_UNESCAPED_UNICODE如果不加這個中文會轉成code，變成\u6797\u5c0f\u65b0 (\是跳脫的意思)

// 裝估狗外掛json viewer 可以讓網頁直接變成程式碼樹狀圖的樣子