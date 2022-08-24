
<?php 

// 對應18-3 做ajax post
    $a = isset($_POST['a']) ? intval($_POST['a']) : 0;
    // 判斷a有沒有值，沒有的話就帶入0，有的話就取整數(intval)
    $b = isset($_POST['b']) ? intval($_POST['b']) : 0;

    $output = [
        'postData' => $_POST,
        'result' => $a + $b,
    ];

    // header('Content-type: application/json'); // 設定HTTP檔頭回應的檔案類型 // 這句註解的話18-3的後面要加'json'

    echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>