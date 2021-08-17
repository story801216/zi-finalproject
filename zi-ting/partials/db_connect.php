<?php 
// 這個PHP是用來建立與資料庫的連線
// 下方的變數名稱都可以自己取
$db_host = 'localhost';  // 要連過去的主機名稱
$db_name = 'testproject';  // 主機資料庫的名稱
$db_user = 'story801216';//Mysql目前的使用者帳號
$db_pass = '123';//Mysql目前的使用者密碼


$dsn = "mysql:host={$db_host};dbname={$db_name};charset=utf8";



$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // 發生錯誤的話會以EXCEPTION形式呈現
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // 拿資料的時候，每一筆都會以關聯式陣列呈現
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // 一連線就要執行的Sql指令，SET NAMES utf8:代表不管資料的進或出都要以UTF8的編碼去呈現
];

$pdo = new PDO($dsn, $db_user, $db_pass, $pdo_options);



