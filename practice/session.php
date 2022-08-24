<?php
session_start(); // 網頁要做session就一定要先做這個動作，將session初始化，才能使用$_SESSION

//驗證資料有沒有錯誤?
echo json_encode($_SESSION);

