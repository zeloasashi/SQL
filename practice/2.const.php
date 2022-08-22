<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>常數有區分大小寫</title>
</head>
<body>
    <?php
    /* 
        • 所謂常數是不可變更的值。PHP 的常數可以分成三類:⼀般常數 (例: 17)、系統常數（例:PHP_VERSION）及⾃訂常數。
        • ⼀般常數就是⼀些數值：0 、 -9 、 2.5 、 ‘abc’ 等。
        • 系統常數為 PHP 預設的常數，常⽤的有：PHP_VERSION（查看 PHP 版本）、=__FILE__（PHP 檔的實體路徑）、TRUE 和 FALSE（布林值的 true 和 false）。系統常數⼤部份可以由 get_defined_constants() 函式取得（取得的資料是陣列類型）。 */

        echo __DIR__; #現在這個PHP所在的資料夾位子
        echo '<br>';
        echo __FILE__; #現在這個PHP所在的資料夾位子+檔名
        echo '<br>';
        echo __LINE__;#這句是第幾行
    ?>
</body>
</html>