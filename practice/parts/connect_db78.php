<?php 

$db_host = '192.168.33.78';
$db_user = 'meow';
$db_pass = 'meow';
$db_name = 'meow';
// 連到宣蘋的資料庫

$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

// 也可以先在這裡設定好篩選條件，和怎麼樣會出現錯誤訊息
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try{
    $pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);
} catch(PDOException $ex) {
    echo "Experion". $ex->getMessage();
}


?>