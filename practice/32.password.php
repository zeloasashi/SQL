<?php

$p = '123456';

// 將用戶密碼改為編碼(不要將明碼存進資料庫)
// password_hash 改成編碼的功能
// password_verify 比對密碼和編碼是否相符的功能
echo json_encode([
    'hash1' => password_hash($p, PASSWORD_DEFAULT),
    'hash2' => password_hash($p, PASSWORD_DEFAULT),
    'md5_1' => md5($p),
    'md5_2' => md5($p),
    'sha1_1' => sha1($p),
    'sha1_2' => sha1($p),
]);

//hash功能比較好，因為他是隨機的