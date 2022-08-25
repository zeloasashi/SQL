<?php
require __DIR__. '/parts/connect_db78.php'; //要先設定好連到宣蘋的資料庫

$sql = "SELECT * FROM address_book";  //連到宣蘋的資料庫看通訊錄
$stmt = $pdo->query($sql);
$rows = $stmt->fetchALL(); //讀取所有資料

//因為老師提供的資料有在欄位中打標籤<>，會被以為是html，所以要在header多下一個指令
header('Content-Type: application/json'); 
echo json_encode($rows);