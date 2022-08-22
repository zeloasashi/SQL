<?php
    // PHP的邏輯運算結果一定為布林值
    $a = 12;
    $b = 3;

    var_dump($a && $b); // 可以印出變數
    echo '<br>';
    var_dump($a || $b);
    echo '<br>';
    var_dump($a=6 && $b=7); //出錯，老師說很複雜 為啥是true
    echo '<br>';
    echo "$a, $b <br>"; //出錯，老師說很複雜 為啥是1, 7

    $a = 12;
    $b = 3;
    var_dump($a=6 and $b=7); //and和or的優先權比一個=還要低
    echo '<br>';
    echo "$a, $b <br>"; //因為是true所以可以將a和b重新設定成6, 7

    $a = 12;
    $b = 3;
    var_dump($a=0 and $b=7);
    echo '<br>';
    echo "$a, $b <br>"; //因為a=0是false，所以b的值不會重新設定，還是3