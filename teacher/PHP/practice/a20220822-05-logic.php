<?php
// PHP 的邏輯運算, 結果一定為布林值
$a = 12;
$b = 3;

var_dump( $a && $b);
echo '<br>';
var_dump( $a || $b);
echo '<br>';
var_dump( $a=6 && $b=7);
echo '<br>';
echo "$a, $b <br>";
$a = 12;
$b = 3;
var_dump( $a=6 and $b=7); # and, or 的優先權比 = 要低
echo '<br>';
echo "$a, $b <br>";
$a = 12;
$b = 3;
var_dump( $a=0 and $b=7); # and, or 的優先權比 = 要低
echo '<br>';
echo "$a, $b <br>";





