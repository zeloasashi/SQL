<pre>
<?php

// 索引式陣列
$ar1 = array(2, 4, 6, 8, 10, 12);
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

print_r($ar2);
print_r($ar4);
?>
</pre>