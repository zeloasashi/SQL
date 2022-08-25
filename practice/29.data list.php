<?php

require __DIR__. '/parts/connect_db.php';
$sql = "SELECT * FROM address_book";
$rows = $pdo->query($sql)->fetchAll();

?>
<?php include __DIR__ . '/parts/html_head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
    <div class="container">
        <table class="table table-striped table-borderde">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">姓名</th>
                    <th scope="col">信箱</th>
                    <th scope="col">手機</th>
                    <th scope="col">生日</th>
                    <th scope="col">地址</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $r): ?>
                    <tr>
                        <td><?= $r['sid'] ?></td>
                        <td><?= $r['name'] ?></td>
                        <td><?= $r['email'] ?></td>
                        <td><?= $r['mobile'] ?></td>
                        <td><?= $r['birthday'] ?></td>
                        <td><?= $r['address'] ?></td>
                        
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>

<?php include __DIR__ . '/parts/scripts.php'; ?>

<?php include __DIR__ . '/parts/html_foot.php'; ?>