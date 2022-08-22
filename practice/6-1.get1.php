<?php
    // query string
    // 網址內容裡 ? 之後為 GET 參數，其格式稱為 URL-encoded。PHP 可以使⽤$_GET 預設變數取得其內容。
    echo $_GET['a'] + $_GET['b'];

    // 測試網⾴之後，在網址列輸⼊下式 ? 之後的內容。http://localhost/my_test/untitled1.php?a=12&b=24
    // 會得出12+24=36