<?php

session_start();

// session_destroy(); // 清除所有的 SESSION 資料

unset($_SESSION['user']); // 清除某個 session 變數

$comeFrom = 'login.php';
if(! empty($_SEVER['HTTP_referer'])){
    $comeFrom = $_SEVER['HTTP_REFERER'];
}

header('Location:' .$comeFrom);  // 頁面轉向 redirect 至登入頁面
