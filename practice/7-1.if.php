<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>if else</title>
</head>
<body>
    <?php
        $age = isset($_GET['age']) ? intval($_GET['age']) : 0;
        if($age >= 18){
            echo "<h2>蝦</h2>";
        } else {
            echo "<h2>救命</h2>"; //打開網頁會印出else，在網址後面打?age=(大於18的數字)就會出現if
        }
    ?>
</body>
</html>


