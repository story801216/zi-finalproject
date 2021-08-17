<?php
// 此章節展示的是把data-delete.php改成api的形式去呈現20210810101652-21:15~30:00

include __DIR__. '/partials/init.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$output = [
    'success' => false,
    'error' => '沒有給 sid',
    'sid' => $sid,
];

if(! empty($sid)){ // 如果$sid不是空值就執行if裡面的程式碼，如果是空值的話就執行else裡面的程式碼
    $sql = "DELETE FROM `address_book` WHERE sid=$sid";
    $stmt = $pdo->query($sql);

    if($stmt->rowCount()==1){  // 如果$stmt有抓到一筆資料的話，執行裡面的程式碼
        $output['success'] = true; // 如果有刪除成功，就把$output['success']改為true
        $output['error'] = ''; // 並把$output['error']本來的字串改為空字串
    } else {
        $output['error'] = '沒有刪除成功（可能沒有該筆資料）';
    }
};

echo json_encode($output, JSON_UNESCAPED_UNICODE); // 將最後得到的$output用JSON形式顯示出來

// 在此可以藉由在網址上直接輸入http://localhost/mfee19-php&mysql/proj/data-delete-api.php?sid=35 ，來去刪除該筆資料，刪除後並重新整理後可以得到$output['error'] = '沒有刪除成功（可能沒有該筆資料）的錯誤訊息 20210810101652-28:00~31:36