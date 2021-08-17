<?php
$id = $_GET["id"];

require __DIR__. './partials/init.php';


//刪除檔案
$sql = "DELETE FROM `stores_list` WHERE `stores_list`.`sId` = $id";

//執行
$PDO->query($sql);

//回到首頁
header("Location:data-list.php");


