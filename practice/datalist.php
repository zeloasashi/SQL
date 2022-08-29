<?php

require __DIR__ . '/parts/connect_db.php';
$pageName = 'list';
$perPage = 20; //每頁最多4筆資料
$title = '資料列表';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;



// 取得資料庫的總筆數
$t_sql = "SELECT COUNT(1) FROM address_book";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 計算總頁數，用無條件進位ceil
$totalPages = ceil($totalRows / $perPage);

$rows = []; // 預設值

//有資料才執行
if ($totalRows > 0) {
    if ($page < 1) {
        header('Location: ?page=1');
        exit;
    }
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages); // 當輸入頁數大於總頁數時，會停在最後一頁
        exit;
    }
    //TODO: 取得該資料的頁面
    $sql = sprintf("SELECT * FROM `address_book` ORDER BY `sid` DESC LIMIT %s, %s", ($page - 1) * $perPage, $perPage); //0,4 4,4 8,4 索引值*拿幾筆資料 // %s是一個蘿蔔一個坑，數字填進去
    $rows = $pdo->query($sql)->fetchAll();
}
// echo json_encode([
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'perPage' => $perPage,
//     'page' => $page,
//     'rows' => $rows,
// ]);
// exit; //資料到這邊就暫時結束，不要套下面的迴圈

?>

<?php include __DIR__ . '/parts/html_head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page - 1 ?>">Pre</a>
                    </li>
                    <?php for ($i = $page - 3; $i <= $page+3 ; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                        ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endif; 
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">刪除</th>
                        <th scope="col">#</th>
                        <th scope="col">姓名</th>
                        <th scope="col">信箱</th>
                        <th scope="col">手機</th>
                        <th scope="col">生日</th>
                        <th scope="col">地址</th>
                        <th scope="col">編輯</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r) : ?>
                        <tr>
                            <td>
                                <a href="javascript: removeItem(<?= $r['sid'] ?>)" data-onclick="event.currentTarget.closet('tr').remove"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                            <td><?= $r['sid'] ?></td>
                            <td><?= $r['name'] ?></td>
                            <td><?= $r['email'] ?></td>
                            <td><?= $r['mobile'] ?></td>
                            <td><?= $r['birthday'] ?></td>
                            <td><?= htmlentities($r['address']) ?></td>
                            <td>
                                <a href="data edit.php?sid=<?= $r['sid'] ?>"><i class="fa-solid  fa-pen-to-square"></i></a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    function removeItem(sid){
        if(confirm(`是否要刪除編號為 ${sid} 的資料?`)){
            location.href = `data delete.php?sid=${sid}`;
        }
    }
</script>
<?php include __DIR__ . '/parts/html_foot.php'; ?>