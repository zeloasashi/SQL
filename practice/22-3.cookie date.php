<pre> 
<?php

echo time(). "\n"; // 取得timestamp //pre和. "\n"都是為了換行才存在的

// 輸出時間格式
// 現在時間 $today = date("Y-m-d H:i:s"); // 2001-03-10 17:16:18 (the MySQL DATETIME format)

echo date("Y-m-d H:i:s"). "\n";
echo date("Y-m-d H:i:s", time()+7*24*60*60). "\n"; // 現在時間，七天後的時間

//標準格式的時間字串，轉換為timestamp
echo strtotime('2022-08-24'). "\n";

?>
</pre>