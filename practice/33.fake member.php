<?php
require __DIR__. '/parts/connect_db.php';

$pass = '123456';
$email = 'shin@gmail.com';
$nickname = '小心';

$sql = sprintf("INSERT INTO `members`(
    `id`, `email`, `password`,
    `mobile`, `address`, `birthday`,
    `hash`, `activated`, `nickname`,
    `create_at`
    ) VALUES (
        NULL,
        '$email',
        '%s',

        '09123456798',
        '台中',
        '1990-8-29',

        'abc',
        '1',
        '$nickname',
        NOW()

    )", password_hash($pass, PASSWORD_DEFAULT));

    $stmt = $pdo->query($sql);

    echo $stmt->rowCount() ? 'OK' : 'BAD';
