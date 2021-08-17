<?php
// 定義資料庫資訊
$db_host = 'localhost';  // 主機名稱
$db_name = 'testproject';  // 主機資料庫的名稱
$db_user = 'story801216';//Mysql目前的使用者帳號
$db_pass = '123';//Mysql目前的使用者密碼

//設定連線資訊 data source name
$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";

// PDO 連線設定
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
];

//開啟資料庫連線物件
$PDO = new PDO($dsn, $db_user, $db_pass, $pdo_options);





// 連接 MySQL 資料庫伺服器(Mysqli)
//$conn = new PDO('mysql:host= 主機 ;dbname= 資料庫名稱 ;charset=utf8', '帳號', '密碼');


//Mysqli連線方式
//$conn = mysqli_connect($db_host, $db_user, $db_pass,$db_name);
// if (empty($conn)) {
//     print mysqli_error($conn);
//     die("資料庫連接失敗！");
//     exit;
// }

// // 設定連線編碼
// mysqli_query($conn, "SET NAMES 'UTF-8'");



