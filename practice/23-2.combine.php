<?php 
require __DIR__ . '/parts/connect_db.php';
$pageName = 'home'; //設定頁面名稱
?>

<?php include __DIR__. '/parts/html_head.php'; ?>
<?php include __DIR__. '/parts/navbar.php'; ?>
<div class="container">
    <h2>林新德</h2>
    <!-- 將html分成四個php -->
    <!-- include 包含檔案進來 →出錯時會警告，但繼續執行
        require 包含檔案進來 →出錯時會直接出現錯誤訊系，且不繼續執行 -->
</div>
<?php include __DIR__. '/parts/scripts.php'; ?>
<?php include __DIR__. '/parts/html_foot.php'; ?>

