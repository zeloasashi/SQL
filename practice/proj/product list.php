<?php
require __DIR__ . '/parts/connect_db.php';
$pageName = 'list'; // 頁面名稱

$perPage = 4;  // 每頁最多有幾筆
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
// 使用者自己選擇分類資料，如果沒有資料就選擇所有商品(0)
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0;
$lowp = isset($_GET['lowp']) ? intval($_GET['lowp']) :0; //low price低價
$highp = isset($_GET['highp']) ? intval($_GET['highp']) :0; //high price高價



//為什麼取得商品分頁功能要加這個~~
$qsp = []; //query string parameters

// 取得分類資料
$cates = $pdo->query("SELECT * FROM categories WHERE parent_sid=0")
    ->fetchAll();

// -----------商品處理------------

// 起頭
$where = ' WHERE 1 ';
if($cate){
    $where .= " AND category_sid=$cate ";
    $qsp['cate'] = $cate;
}
if($lowp){
    $where .= " AND price>=$lowp ";
    $qsp['lowp'] = $lowp;
}
if($highp){
    $where .= " AND price<=$highp ";
    $qsp['highp'] = $highp;
}

// 取得資料的總筆數
$t_sql = "SELECT COUNT(1) FROM products $where";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

// 計算總頁數
$totalPages = ceil($totalRows / $perPage);

$rows = [];  // 預設值
// 有資料才執行
if ($totalRows > 0) {
    if ($page < 1) {
        header('Location: ?page=1');
        exit;
    }
    if ($page > $totalPages) {
        header('Location: ?page=' . $totalPages);
        exit;
    }
    // 取得該頁面的資料
    $sql = sprintf("SELECT * FROM `products` %s ORDER BY `sid` DESC LIMIT %s, %s", 
    $where,
    ($page - 1) * $perPage,
    $perPage
    );
    $rows = $pdo->query($sql)->fetchAll();
}

// echo json_encode([
//     'totalRows' => $totalRows,
//     'totalPages' => $totalPages,
//     'perPage' => $perPage,
//     'page' => $page,
//     'rows' => $rows,
// ]);
// exit;

?>
<?php include __DIR__ . '/parts/html_head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php $allBtnStyle = empty($cate) ? 'btn-primary' : 'btn-outline-primary' ?>
            <a type="button" class="btn <?= $allBtnStyle ?>" href="?<?php 
            $tmp = $qsp; //複製
            unset($tmp['cate']); //清空類別
            unset($tmp['lowp']); //清空低價
            unset($tmp['highp']); //清空高價
            echo http_build_query($tmp); ?>">
                全部
            </a>
            <?php foreach ($cates as $c) : 
                $btnStyle = $c['sid']==$cate ? 'btn-primary' : 'btn-outline-primary'
                ?>
                <a type="button" class="btn <?= $btnStyle ?>" href="?<?php $tmp['cate']=$c['sid'];
                echo http_build_query($tmp); ?>">
                    <?= $c['name'] ?>
                </a>
            <?php endforeach ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?php $btnStyle = (!$lowp && $highp==400) ? 'btn-primary' : 'btn-outline-primary' ?>

            <a type="button" class="btn <?= $btnStyle ?>" href="?<?php 
            $tmp = $qsp; //複製
            unset($tmp['lowp']); //先清除lowp，再設定highp
            $tmp['highp']=400;
            echo http_build_query($tmp); ?>
            ">價格低於400</a>

            <?php $btnStyle = ($lowp==400 && $highp==500) ? 'btn-primary' : 'btn-outline-primary' ?>
            <a type="button" class="btn btn-outline-primary" href="?<?php
            $tmp['lowp']=400;
            $tmp['highp']=500;
            echo http_build_query($tmp); ?>
            ">價格在400~500之間</a>

            <?php $btnStyle = ($lowp==500 && !$highp) ? 'btn-primary' : 'btn-outline-primary' ?>
            <a type="button" class="btn btn-outline-primary" href="?<?php 
            unset($tmp['highp']);
            $tmp['lowp']=500;
            echo http_build_query($tmp); ?>
            ">價格大於500</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $qsp['page']=$page - 1 ; echo http_build_query($qsp); ?>">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                        </a>
                    </li>
                    <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                            $qsp['page']=$i;
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?<?= http_build_query($qsp); ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>
                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?<?php $qsp['page']=$page + 1; echo http_build_query($qsp); ?>">
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row">
        <?php foreach ($rows as $r) : ?>
            <div class="col-lg-3">
                <div class="card">
                    <img src="./imgs/big/<?= $r['book_id'] ?>.png" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['bookname'] ?></h5>
                        <p class="card-text"><?= $r['author'] ?></p>
                        <p class="card-text"><?= $r['price'] ?></p>
                        <p>
                            <select class="form-select">
                                <?php for($i=1; $i<=10; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </p>
                        <p>
                            <button class="btn btn-warning" data_sid="<?= $r['sid']?>"
                            onclick="addToCart(event)"
                            >立即購買</button>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php'; ?>

<script>
    function addToCart(event){
        const btn = $(event.currentTarget);
        const qty = btn.closest('.card-body').find('select').val();
        const sid = btn.attr('data_sid');

        console.log({sid, qty});

        $.get(
            'handle_cart.php',
            {sid, qty},
            function(data){
                console.log(data);
                showCartCount(data);
            },
        'json');
    }
</script>

<?php include __DIR__ . '/parts/html_foot.php'; ?>