<?php


setcookie('my_cookie', 'Shin', time()+30); // 設定

echo $_COOKIE['my_cookie']; // 讀取