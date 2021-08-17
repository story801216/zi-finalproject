<?php

//藥局名稱
$pName = $_GET["pName"];
//地址
$pAddress = $_GET["pAddress"];
//電話
$pPhone = $_GET["pPhone"];
//營業時間
$pTime = $_GET["pTime"];


//連接
include __DIR__ . './partials/init.php';

//新增的資料
$sql = "INSERT INTO `stores_list` (`sId`, `sName`, `sLocal_phone`, `s_address`, `s_time`, `created_at`) VALUES (NULL, '$pName', '$pPhone', '$pAddress', '$pTime', current_timestamp());";

//執行新增
$PDO->query($sql);

//回到首頁
header("Location:data-list.php");



?>

