<?php

$p = '123456';

echo json_encode([
    'hash1' => password_hash($p, PASSWORD_DEFAULT),
    'hash2' => password_hash($p, PASSWORD_DEFAULT),
    'md5_1' => md5($p),
    'md5_2' => md5($p),
    'sha1_1' => sha1($p),
    'sha1_2' => sha1($p),
]);
