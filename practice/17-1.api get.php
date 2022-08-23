<!-- 做運算加法的表單 -->

<?php 
    $a = isset($_GET['a']) ? intval($_GET['a']) : 0;
    // 判斷a有沒有值，沒有的話就帶入0，有的話就取整數(intval)
    $b = isset($_GET['b']) ? intval($_GET['b']) : 0;

    echo $a + $b;

?>