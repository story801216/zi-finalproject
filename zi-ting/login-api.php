<?php
//原本的login-api.php有備份了 -> login-api-bkup01.php
//所以請先看過login-api-bkup01.php此程式後再來看這個

//此章節在講解登入方式改用資料表裡的資料來登入的部分20210811144036-33:32~42:29


include __DIR__. '/partials/init.php';

// 輸出的格式
$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
];
//在這個php，會收到從login.php送來的 $_POST['account'，'password']

// 判斷有無帳號和密碼，如果沒有就執行下方程式碼，拜訪此login-api.php時，就會出現下方資訊
if(!isset($_POST['account']) or !isset($_POST['password'])){
    $output['error'] = '沒有帳號資料或沒有密碼';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit; // 直接離開 (中斷) 程式
};

// 1.拿到該筆資料
// 透過用戶從外界輸入的E-mail(email=?)，來去核對資料表的E-mail欄位，進而獲得該筆資料
$sql = "SELECT * FROM address_book WHERE account=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['account']]);
$m = $stmt->fetch();

// 2.查看有沒有這個帳號
if(empty($m)){
    $output['error'] = '帳號錯誤';
    $output['code'] = 401;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit; // 直接離開 (中斷) 程式
}

// 3.比對密碼
if(empty($m['password'])){
    $output['error'] = '密碼錯誤';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit; // 直接離開 (中斷) 程式
};
// password_verify() 函数用于驗證密码是否和被$hash加密過的密碼相符合

$output['success'] = true;
$output['code'] = 200;

$_SESSION['user'] = $m;

echo json_encode($output, JSON_UNESCAPED_UNICODE);
