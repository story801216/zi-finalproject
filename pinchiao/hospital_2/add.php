<?php
$hsname = $_GET["hsname"];
$subject = $_GET["subject"];
$drname = $_GET["drname"];
$time = $_GET["time"];
$phone = $_GET["phone"];
$address = $_GET["address"];

//連接數據庫
require_once "database.php";


//插入語句
$sql = "INSERT INTO `hospital` (`院所名稱`, `看診科別`, `醫師姓名`, `看診時段`, `電話`, `地址`) VALUES ('$hsname', '$subject', '$drname', '$time', '$phone', '$address');";

//執行插入語句
$pdo->query($sql);

//回到首頁
header("Location:index.php");