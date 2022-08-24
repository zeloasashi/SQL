<?php

// 這串是在https://phpspreadsheet.readthedocs.io/en/latest/ 的hello world
$n = isset($_GET['n']) ? $_GET['n'] : '林新德林新德林新德';

require './../vendor/autoload.php'; // 位置很重要!!沒有選對救出不來了

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
// 新增的話要先關掉EXCEL表
$sheet->setCellValue('A2', $n);
// 用設定變數的方式新增表格文字


$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');

echo 'OK'; //不打這句的話網頁會是空白的(表示是對的，但不安心)