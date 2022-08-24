<?php

// 參考網站 https://www.webtech.tw/info.php?tid=33
session_start(); // 網頁要做session就一定要先做這個動作，將session初始化，才能使用$_SESSION

if(! isset($_SESSION['my'])){
    $_SESSION['my'] = 1; // 設定，如果網頁沒有session會給1
} else{
    $_SESSION['my'] ++; //每次重整都+1
}

// session能放陣列，比cookie方便
$_SESSION['my_data'] = [
    'name' => 'shinder',
    'age' => 30,
    'data' => [1,3,9]
];

echo $_SESSION['my'];
// 透過瀏覽器的application可以把phpsessid刪掉作為登出
