<?php
// 將修改過後的資料送來這邊，並新增到資料庫裡(直接使用data-insert-api.php來修改)20210811090106-16:25~33:51

include __DIR__. '/partials/init.php';

header('Content-Type: application/json');

$output = [
    'success' => false,
    'error' => '資料欄位不足',
    'code' => 0,
    'rowCount' => 0,
    'postData' => $_POST,
];




// 資料格式檢查
if(mb_strlen($_POST['name'])<2){
    $output['error'] = '姓名長度太短';
    $output['code'] = 410;
    echo json_encode($output);
    exit;
}

if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $output['error'] = 'email 格式錯誤';
    $output['code'] = 420;
    echo json_encode($output);
    exit;
}

// ↓20210811090106-22:40~ 28:29
// 以sid為條件(就是對應的該筆資料)，再透過下方的execute來去依序帶入更新後的值(SET裡 WHERE 前的最後一筆資料記得不要加「，」，不然就會語法錯誤，記得一定要下WHERE(條件:該筆資料)，如果沒有家WHERE就會把該資料表裡的所有資料都一併修改)
$sql = "UPDATE `address_book` SET 
                          `account`=?,
                          `password`=?,  
                          `name`=?,
                          `idnumber`=?,
                          `email`=?,
                          `mobile`=?,
                          `birthday`=?,
                          `address`=?
                          WHERE `sid`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['account'],
    $_POST['password'],
    $_POST['name'],
    $_POST['idnumber'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
    $_POST['sid'],
]);

// ↓20210811090106-28:31~ 29:31
$output['rowCount'] = $stmt->rowCount(); // 修改的筆數 
if($stmt->rowCount()==1){
    $output['success'] = true;
    $output['error'] = '';
} else {
    $output['error'] = '資料沒有修改';  // 如果資料都沒有修改(rowCount()等於0)就跳'資料沒有修改'的警示訊息
}

echo json_encode($output);
