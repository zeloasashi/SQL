<?php 
require __DIR__ . '/parts/connect_db.php';
$pageName = 'insert'; //設定頁面名稱
?>

<?php include __DIR__ . '/parts/html_head.php'; ?>
<?php include __DIR__ . '/parts/navbar.php'; ?>

<!-- 記得去pats裡的navbar新增欄位 -->

<div class="container">
    <div class="row">
        <div class="col-lg-6">
        <div class="card">

<div class="card-body">
    <h5 class="card-title">註冊</h5>
    <form name="form1" onsubmit="checkForm(); return false;" novalidate> 
    <!-- 啥意思 -->
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">mobile</label>
            <input type="text" class="form-control" id="mobile" name="mobile">
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">birthday</label>
            <input type="date" class="form-control" id="birthday" name="birthday">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">address</label>
            <textarea class="form-control" id="address" name="address" 
            cols="50" rows="3"></textarea>
            <!-- textarea之間不要有任何空格或enter，不然會出現捲軸 -->
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>
</div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/parts/scripts.php'; ?>
<script>
    function checkForm(){
        // TODO: 檢查欄位資料是否符合
        let isPass = true; //預設表單的資料沒問題
        const name = document.form1.name.value;
        const email = document.form1.email.value;

        if(name.length < 2){
            alert('請填寫姓名!');
            isPass = false;
        }
        if(! email){
            alert('請填寫正確信箱');
        }
        if(isPass){
            //送出表單資料
            $.post(
                'data insert api.php',
                $(document.form1).serialize(),
                function(data){
                    console.log('data');
                }, 'json'
            );
        }
    }
</script>

<?php include __DIR__ . '/parts/html_foot.php'; ?>