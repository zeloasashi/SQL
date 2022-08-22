<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>不用{}而是:的寫法</title>
</head>
<body>
    <?php
        $age = isset($_GET['age']) ? intval($_GET['age']) : 0;
        if($age >= 18):
        ?>
            <h2>蝦</h2>;
            <img src="../img/800x.jpg" alt="">
    <?php
        else:
    ?>
            <h2>救命</h2>"; 
            <img src="../img/1642928288188.jpg" alt="">
    <?php
        endif;
    ?>
</body>
</html>


