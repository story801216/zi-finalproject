<?php
include __DIR__. '/partials/init.php';

header('Content-Type: application/json');

$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
    'rowCount' => 0,
    'postData' => $_POST,
];


// 後端的資料格式檢查

// 檢查帳號長度
if(mb_strlen($_POST['account'])<6){
    $output['error'] = '帳號長度太短';
    $output['code'] = 401;
    echo json_encode($output);
    exit;
};

// 檢查密碼長度
if(mb_strlen($_POST['password'])<6){
    $output['error'] = '密碼長度太短';
    $output['code'] = 402;
    echo json_encode($output);
    exit;
};
// 如果姓名少於兩個字符的話就執行if裡面的程式碼

if(mb_strlen($_POST['name'])<2){
    $output['error'] = '姓名長度太短';
    $output['code'] = 403;
    echo json_encode($output);
    exit;
};

// 檢查身分證字號長度
if(mb_strlen($_POST['idnumber'])<10){
    $output['error'] = '請填寫正確的身分證字號';
    $output['code'] = 404;
    echo json_encode($output);
    exit;
};



// 後端的E-mail資料格式檢查
// FILTER_VALIDATE_EMAIL過濾器:把值作為e-mail 地址來驗證
// 如果$_POST['email'不是E-mail的格式的話，就執行if裡面的程式碼
if(! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $output['error'] = 'email 格式錯誤';
    $output['code'] = 405;
    echo json_encode($output);
    exit;
};

// 檢查手機號碼長度
if(mb_strlen($_POST['mobile'])<10){
    $output['error'] = '請填寫正確的手機號碼';
    $output['code'] = 406;
    echo json_encode($output);
    exit;
};





// ↓透過這樣的方式就可以把「'」做跳脫，而不影響原本的sql語法
$sql = "INSERT INTO `address_book`(
               `account`, `password`, `name`, `idnumber`, `email`, `mobile`, `birthday`, `address`, `created_at`
               ) VALUES (
                    ?, ?, ?,?, ?, ?,?, ?, NOW()   /* 這邊與sprintf寫法雷同 */
               )";

/* PDO::prepare:好處是可以先寫好 SQL 碼，並且在稍後自動帶入我們要的資料，比起直接利用 query 可以減少許多安全性的問題  */
$stmt = $pdo->prepare($sql); 

/* execute:執行一條待處理的語句 */
/* 依照上方「?」的順序依序將變數帶入進去 */  
// 「->」瘦箭頭的代表意義就如同js的「點語法」例如 stmt.execute(中文解說:execute為stmt這個物件的「方法」)
// 而php裡的「.」是拿來當作字串連結的功能，例如 uniqid(). '@test.com'
$stmt->execute([
    $_POST['account'],
    $_POST['password'],
    $_POST['name'],
    $_POST['idnumber'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
]);

$output['rowCount'] = $stmt->rowCount(); // 新增的筆數
if($stmt->rowCount()==1){
    $output['success'] = true;
};

echo json_encode($output);


