<?php
if(! isset($title)){
    $title = '小新的網站';
} else {
    $title = $title. ' | 小新的網站';
}

?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <title><?= $title ?></title>
</head>

<body>