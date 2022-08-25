<?php 

$db_host = 'localhost';
$db_user = '07';
$db_pass = 'aaadmin';
$db_name = 'project57';

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