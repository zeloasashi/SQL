<?php
require __DIR__. '/parts/connect_db.php';
$sql = "SELECT * FROM address_book";
$stmt = $pdo->query($sql); //stmt = statement

// 用while迴圈一筆一筆讀取通訊錄資料 // 把$stmt->fetch()的值給row
while($row = $stmt->fetch()){
    echo "<div>{$row['name']}: {$row['mobile']}</div>";
}