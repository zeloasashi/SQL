<?php
require __DIR__ . '/parts/connect_db.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0;

// C: 加到購物車, sid, qty
// R: 查看購物車內容
// U: 更新, sid, qty
// D: 移除項目, sid

if(! empty($sid)) {

    if(! empty($qty)) {
        // 新增或變更

        if(!empty($_SESSION['cart'][$sid])){
            // 已存在, 變更
            $_SESSION['cart'][$sid]['qty'] = $qty;
        } else {
            // 新增
            // TODO: 檢查資料表是不是有這個商品

            $row = $pdo->query("SELECT * FROM products WHERE sid=$sid")->fetch();
            if(! empty($row)){
                $row['qty'] = $qty;  // 先把數量放進去
                $_SESSION['cart'][$sid] = $row;
            }
        }
    } else {
        // 刪除項目
        unset($_SESSION['cart'][$sid]);
    }
}

echo json_encode($_SESSION['cart']);