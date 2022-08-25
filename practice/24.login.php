<?php 
    // 所有複雜的邏輯判斷都寫在html前面
    session_start();
    if(!empty($_POST) and $_POST['account']=='shinder' and $_POST['password']=='123')
    // 如果登入了，且帳號密碼是這個，就出現歡迎畫面
    {
        $_SESSION['user1'] =[
            'account' => 'shinder',
            'nickname' => '小新',
        ];
    }
?>

<?php include __DIR__ . '/parts/html_head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <?php if(empty($_SESSION['user1'])): ?>
                <!-- 如果還沒登入就出現卡片登入畫面 -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">登入</h5>

                    <form method="post">
                        <!-- 因為是傳給自己的資料庫所以不用打action -->
                        <div class="mb-3">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="account" name="account">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>

                <?php else: ?>
                    <h2><?= $_SESSION['user1']['nickname']. '您好' ?></h2>
                    <p><a href="25.logout.php">登出</a></p>
                <?php endif ?>

        </div>
    </div>
</div>
    <?php include __DIR__ . '/parts/scripts.php'; ?>
    <?php include __DIR__ . '/parts/html_foot.php'; ?>