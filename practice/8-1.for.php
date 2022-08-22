<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for迴圈</title>
    <style>
        table {
            border: 1px solid coral;
        }
    </style>
</head>

<body>

    <table>
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <tr>
                <td>
                    <?= $i ?>
                </td>
            </tr>
        <?php endfor ?>
    </table>

    <!-- 老師講義上寫的 -->
    <table border="1" width="400px" cellpadding="0" cellspacing="0">
        <tr>
            <?php
            for ($i = 0; $i < 10; $i++) {
                echo '<td>' . $i . '</td>';
            }
            ?>
        </tr>
    </table>
</body>

</html>