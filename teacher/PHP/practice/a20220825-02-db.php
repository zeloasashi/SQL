<?php
require __DIR__. '/parts/connect_db.php';

$sql = "SELECT * FROM address_book";

$stmt = $pdo->query($sql);

// $row = $stmt->fetch(PDO::FETCH_NUM); // 讀取一筆, 索引式陣列
// $row = $stmt->fetch(PDO::FETCH_ASSOC); // 讀取一筆, 關聯式陣列
$row = $stmt->fetch(); // 讀取一筆, 關聯式陣列

echo json_encode($row);