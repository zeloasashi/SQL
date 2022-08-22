
    <?php
        $a = 'Shinder'; # 自訂變數 
        echo '12' + 3; # +和*會將字串轉換，自動進行運算 
        echo '<br>';
        echo '12' * 3; # +和*會將字串轉換，自動進行運算
        echo '<br>';
        # echo 'xyz' + 3; #這樣當然是算不了，發生錯誤
        echo '<br>'; 
        echo "Hello $a <br>"; #雙引號時，會視$a為變數，將自訂變數帶入
        echo 'Hello $a <br>'; #單引號時，會視$a為字串
        echo "Hello $a123 <br>"; #$a123為變數，但前面沒有設，所以會出現錯誤訊息
        echo "Hello {$a}123 <br>"; #會出現和下面一樣的訊息
        echo "Hello ${a}123 <br>"; #會出現和上面一樣的訊息
    ?>