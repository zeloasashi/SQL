<?php
require __DIR__. '/parts/connect_db.php';

$sql = "SELECT * FROM address_book";

$stmt = $pdo->query($sql);


while($row = $stmt->fetch()){

    echo "<div>{$row['name']}: {$row['mobile']}</div>";
}
