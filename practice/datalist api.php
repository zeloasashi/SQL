<?php

require __DIR__ . '/parts/connect_db.php';
$pageNmae = 'list';
$perPage = 20; //每頁最多4筆資料
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;



// 取得資料庫的總筆數
$t_sql = "SELECT COUNT(1) FROM address_book";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 計算總頁數，用無條件進位ceil
$totalPages = ceil($totalRows / $perPage);

$rows = []; // 預設值

//有資料才執行
if ($totalRows > 0) {
    if ($page < 1) {
        header('Location: ?page=1');
        exit;
    }
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages); // 當輸入頁數大於總頁數時，會停在最後一頁
        exit;
    }
    //TODO: 取得該資料的頁面
    $sql = sprintf("SELECT * FROM `address_book` ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage); //0,4 4,4 8,4 索引值*拿幾筆資料 // %s是一個蘿蔔一個坑，數字填進去
    $rows = $pdo->query($sql)->fetchAll();
}
echo json_encode([
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'perPage' => $perPage,
    'page' => $page,
    'rows' => $row,
]);


?>

