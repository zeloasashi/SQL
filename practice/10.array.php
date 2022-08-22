<pre> 
<!-- pre是能保留VSCODE上的空格，直接呈現在網頁上的檢查方式 -->
<?php

// 索引式陣列
$ar1 = array(2, 4, 6, 8, 10, 12); // 以前的陣列用法
$ar2 = [2, 4, 6, 8, 10, 12];

// 關聯式陣列
$ar3 = array(
    'name' => 'John',
    'age' => 25,
);

$ar4 = [
    'name' => 'John',
    'age' => 25,
];

var_dump($ar1);
var_dump($ar3);

print_r($ar2); // 印出row
print_r($ar4);

?>
</pre>