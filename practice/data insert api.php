<?php 
require __DIR__. '/parts/connect_db.php';

$output = [
    'success' => false, //是否新增成功
    'error' => '', //空字串為錯誤訊息
    'code' => 0,
    'postData' => $_POST,
];

if(empty($_POST['name']) or empty($_POST['email'])) {
    $output['error'] = '請填寫必填資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// TODO: 姓名和信箱為必填資訊

//如果時間字串無法轉換成timestamp表示格式錯誤，在phpmyadmin編輯通訊錄設定讓生日可以設定為空值
if(strtotime($_POST['birthday'])===false){
    $birthday = null;
} else {
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));
}

//避免 SQL injection (SQL隱碼攻擊)發生

$sql = "INSERT INTO `address_book`(
    `name`,
    `email`,
    `mobile`,
    `birthday`,
    `address`,
    `created_at`
    ) VALUES (
        ?,
        ?,
        ?,
        ?,
        ?,
        NOW()
    )";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'], 
    $_POST['email'],
    $_POST['mobile'],
    $birthday,
    $_POST['address'],
]);

if($stmt->rowCount()){
    $output['success'] = true;
} else{
    $output['error'] = '資料沒有新增';
}
// 如果資料成功輸入則為true，不然出現錯誤訊息
echo json_encode($output);