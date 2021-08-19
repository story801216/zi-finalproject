<?php

$db_host = 'localhost'; // 主機名稱
$db_name = 'testproject';  // 主機資料庫的名稱
$db_user = 'story801216';//Mysql目前的使用者帳號
$db_pass = '123';//Mysql目前的使用者密碼

// 連接數據庫
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);


?>