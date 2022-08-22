<?php
    // 1的寫法會出現錯誤訊息，所以用這個比較好
    // query string
    // isset() 判斷是不是有設定
    // intval() 把字串轉換為整數
    $a = isset($_GET['a']) ? intval($_GET['a']) : 50;
    $b = isset($_GET['b']) ? intval($_GET['b']) : 100;

    echo $a + $b;