<?php
//id
$i = $_GET["i"];
$hsname = $_GET["hsname"];
$subject = $_GET["subject"];
$drname = $_GET["drname"];
$time = $_GET["time"];
$phone = $_GET["phone"];
$address = $_GET["address"];

require_once "database.php";
//更新語句
$sql = "UPDATE `hospital` SET `院所名稱` = '$hsname', `看診科別` = '$subject', `醫師姓名` = '$drname', `看診時段` = '$time', `電話` = '$phone', `地址` = '$address' WHERE `hospital`.`sid` = $i;";
//執行更新語句
$pdo->query($sql);
//回到首頁
header("Location:index.php");
?>