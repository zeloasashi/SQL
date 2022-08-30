<?php
require __DIR__ . '/parts/connect_db.php';

if(! isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0; //商品主鍵
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0; //商品數量

// C 加到購物車，需要sid, qty
// R 查看購物車
// U 更新，需要sid, qty
// D 移除 ，需要sid

if(! empty($qty)){
    //新增或變更
    if(!empty($_SESSION['cart'][$sid])){
        //購物車內已有商品，要做變更?
        $_SESSION['cart'][$sid]['qty'] = $qty;
    } else{
        //新增
        //TODO: 檢查資料表有沒有這個商品
        $row = $pdo->query("SELECT * FROM products WHERE sid=$sid")->fetch();
        if(! empty($row)){
            $row['qty'] = $qty; //先把數量放進去
            $_SESSION['cart'][$sid] = $row;
        }
    }
    
} else{
    // delete
    unset($_SESSION['cart'][$sid]);
}

echo json_encode($_SESSION['cart']);
