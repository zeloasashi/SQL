<?php

$a = isset($_POST['a']) ? intval($_POST['a']) : 0;
$b = isset($_POST['b']) ? intval($_POST['b']) : 0;

$output = [
    'postData' => $_POST,
    'result' => $a + $b,
];

// header('Content-Type: application/json'); // 設定 HTTP 檔頭, 回應的檔案類型

echo json_encode($output, JSON_UNESCAPED_UNICODE);
