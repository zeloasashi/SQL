<?php

session_start();

// session_destroy(); // 清除所有的 SESSION 資料

unset($_SESSION['user1']); // 清除某個 session 變數

header('Location: a20220824-10-login.php');  // 頁面轉向 redirect

exit;  // 結束程式, 底下的程式都不會執行
// die('oops!');  // 同 exit
