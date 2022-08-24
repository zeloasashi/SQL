<?php

// 設定cookie(名稱, 值, 期限(單位為秒))
// cookie過期就讀不到，瀏覽器會自動清除

setcookie('my_cookie', 'shinder', time()+10); //time()為現在時間，+10為+10秒

// 讀取COOKIE，第一次設定時，執行會讀不到東西，因為...?
echo $_COOKIE['my_cookie'];
