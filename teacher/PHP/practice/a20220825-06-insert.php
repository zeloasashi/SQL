<?php
require __DIR__. '/parts/connect_db.php';

$sql = "INSERT INTO `address_book`(
    `name`,
    `email`, 
    `mobile`, 
    `birthday`, 
    `address`, 
    `created_at`
    ) VALUES (
        '小明',
        'aaa@aaa.com',
        '0935111222',
        '1990-12-11',
        '台南市',
        NOW()
    )";

$stmt = $pdo->query($sql);
echo $stmt->rowCount(); // 影響的資料筆數

