<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $age = isset($_GET['age']) ? intval($_GET['age']) : 0;

    if($age >= 18){
    ?>
        <h2>歡迎光臨</h2>
        <img src="../imgs/61d1c0e2aa741500193b2d18.webp" alt="">
    <?php
    } else {
    ?>
        <h2>以後再來</h2>
        <img src="../imgs/file-20220131-15-1ndq1m6.avif" alt="">
    <?php
    }
    ?>
</body>
</html>