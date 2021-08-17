<?php
//
$eid = $_GET["eid"];
//藥局名稱
$pName = $_GET["pName"];
//地址
$pAddress = $_GET["pAddress"];
//電話
$pPhone = $_GET["pPhone"];
//營業時間
$pTime = $_GET["pTime"];


include __DIR__ . './partials/init.php';

//編輯修改
$sql = "UPDATE `stores_list` SET `sName` = '$pName', `sLocal_phone` = '$pPhone', `s_address` = '$pAddress', `s_time` = '$pTime' WHERE `stores_list`.`sId` = $eid;";

//執行修改
$PDO->query($sql);

//回到首頁
header("Location:data-list.php");
?>

