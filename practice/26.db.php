<?php
// db = database的縮寫
require __DIR__. '/parts/connect_db.php';
$sql = "SELECT * FROM address_book";

$stmt = $pdo->query($sql);
// stmt = 為statement 狀態的縮寫  // query是詢問、要求資料，一般查詢資料會使用query

// $row = $stmt->fetch(PDO::FETCH_NUM); // 讀取一筆,索引式陣列
// PDO = PHP Data Objects，是一種在PHP裡連接資料庫的使用介面。
// FETCH_NUM抓number的資料→索引式陣列
// $row = $stmt->fetch(PDO::FETCH_ASSOC); //讀取一筆關聯式陣列
// FETCH_ASSOC抓associate的資料→關聯式陣列
$row = $stmt->fetch(); //如果connect_db.php有設定好可以只打這句，不然要打上面兩列

echo json_encode($row);