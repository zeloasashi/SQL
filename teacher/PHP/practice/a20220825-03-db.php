<?php
require __DIR__. '/parts/connect_db.php';

$sql = "SELECT * FROM address_book";

$stmt = $pdo->query($sql);


$rows = $stmt->fetchAll(); // 讀取所有資料

header('Content-Type: application/json');
echo json_encode($rows);