<?php
require __DIR__. '/parts/connect_db.php';

// SQL injection, SQL 隱碼攻擊

$sql = "INSERT INTO `address_book`(
        `name`,
        `email`, 
        `mobile`, 
        `birthday`, 
        `address`, 
        `created_at`
    ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        NOW()
    )";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    "小明's 女友",
    'aaa@aaa.com',
    '0935111222',
    '1990-12-11',
    '台南市',
]);

echo json_encode([
    $stmt->rowCount(), // 影響的資料筆數
    $pdo->lastInsertId(), // 最新的新增資料的主鍵
]);
