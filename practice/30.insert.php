<?php 
require __DIR__. '/parts/connect_db.php';

//避免 SQL injection (SQL隱碼攻擊)發生

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
    "小明's 女友", // 可以用雙引號包單引號
    'abc@gmail.com',
    '09123456789',
    '2022-08-25',
    '台北',
]);

echo json_encode([
    $stmt->rowCount(), // 影響的資料筆數
    $pdo->lastInsertId(), // 最新的新增資料的主鍵
]);