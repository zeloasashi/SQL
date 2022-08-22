<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach/as 使用位址</title>
</head>

<body>

    <table border="1">
        <?php for ($i=1; $i < 10; $i++): ?>
            <tr>
                <?php for($k=1; $k<10; $k++): ?>
                    <td>
                        <?= sprintf("%s * %s = %s", $i, $k, $i*$k) ?>
                    </td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
    <div><?= sprintf("%x", 255) ?></div> 
        <!--?=這個有點像是echo，是要把這個值印出來 
            因為是十六進位所以255丟進變數%X裡出現FF -->
</body>

</html>