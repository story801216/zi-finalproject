<?php
include __DIR__. '/partials/init.php';

// empty():判斷括弧內的值是否為空字串、空陣列 or 0
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0; // 就算'sid'得值是非數值的話，也會透過intval的功能轉換成整數，非數值轉化成整數的時候得到的值通常會是0,(ps:在「sql」裡，空字串不代表就是空值-20210810101652-01:05~11:54)
if(! empty($sid)){    // 如果$sid不是空值的話，就執行下方刪除功能的程式碼
    $sql = "DELETE FROM `address_book` WHERE sid=$sid";
    $stmt = $pdo->query($sql);
};
// ↑這邊不用prepare的原因在於:雖然資料是從外面來，但是經過intval轉換成整數，所以不會有XSS攻擊的問題



// $_SERVER['HTTP_REFERER'] 從哪個頁面連過來的
// $_SERVER["HTTP_REFERER"]:得到目前連結的上一個連結的来源地址(2021 08 10 09 01 01 52:55)
// 不一定有資料:因為如果是從網址去執行此php功能的話，就不會有檔頭了
if(isset($_SERVER['HTTP_REFERER'])){ // 查看是否有檔頭(上一個連結的来源地址)傳過來，如果沒有就轉向回第一頁(data-list.php)
    header("Location: ". $_SERVER['HTTP_REFERER']);
} else {
    header('Location: data-list.php');   
};


