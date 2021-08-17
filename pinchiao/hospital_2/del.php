<?php
$id = $_GET["id"];

require_once "database.php";

//刪除的sql
$sql = "DELETE FROM `hospital` WHERE `hospital`.`sid` = $id";

//執行sql
$pdo->query($sql);

//回到首頁
header("Location:index.php");
