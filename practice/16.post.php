<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>post表單 把資料送給自己</title>
</head>
<body>

<?php if(empty($_POST)): ?>
<!-- 判斷是不是post的值 -->
    <form name="form1" method="post">
        <input type="text" name="account" placeholder="ID">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <button>submit</button>
        <!-- 表單預設會帶入原本打過的帳密，因為預設method="get" -->

    </form>

    <?php else: ?>

        <pre>
            <?php print_r($_POST); ?>
        </pre>
    <?php endif; ?>
    
        <!-- 1.可依據GET和POST的屬性決定表單和頁面的呈現
            2.如果是POST/GET，重整後仍是PST/GET   -->
    