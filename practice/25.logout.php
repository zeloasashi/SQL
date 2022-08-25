<?php

    session_start();

    // sesseion_destroy(); 清除所有session的資料
    unset($_SESSION['user1']); // 清除某個session變數，將user1資料清除
    header('location: 24.login.php'); // 頁面轉向 redirect回登入頁面

    exit; // 結束程式，底下的程式都讀不會執行
    // die('oops!'); //同exit