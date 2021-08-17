<?php
    include __DIR__. '/partials/init.php';
    $title = '登入';

    if(isset($_SESSION['user'])){
        header('Location: index_.php'); // redirect, Location:跳轉到別的頁面
        exit;
    }

?>
<?php include __DIR__. '/partials/html-head.php'; ?>
<?php include __DIR__. '/partials/navbar.php'; ?>
    <style>
        form .form-group small {
            color: red;
            display: none;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">登入</h5>
                    <form name="form1" onsubmit="sendForm(); return false;">
                        <div class="form-group">
                            <label for="account">帳號</label>
                            <input type="text" class="form-control" id="account" name="account" placeholder="請輸入帳號">
                            <small class="form-text">請填寫帳號</small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="請輸入6位數密碼">
                            <small class="form-text">請填寫密碼</small>
                        </div>

                        <button type="submit" class="btn btn-primary">登入</button>
                    </form>
                </div>
            </div>

        </div>
    </div>



</div>
<?php include __DIR__. '/partials/scripts.php'; ?>
<script>
    function sendForm(){
        let isPass = true;    //先把條件設成true，代表預設是通過檢查的
        document.form1.account.nextElementSibling.style.display = 'none';
        document.form1.password.nextElementSibling.style.display = 'none';
        if(! document.form1.account.value){
            document.form1.account.nextElementSibling.style.display = 'block';
            isPass = false;               //只要其中一個項目不符合，就會變成false
        }
        if(! document.form1.password.value){
            document.form1.password.nextElementSibling.style.display = 'block';
            isPass = false;
        }

        if(isPass) {
            const fd = new FormData(document.form1);

            fetch('login-api.php', {
                method: 'POST',
                body: fd
            })
            .then(r=>r.json())
            .then(obj=>{
                console.log('result:', obj);
                if(obj.success){
                    location.href = 'index_.php'; // 如果登入成功就跳轉到別的頁面
                } else {
                    alert(obj.error);        //如果登入失敗就發出錯誤警告資訊
                }
            });
        }

    }
</script>
<?php include __DIR__. '/partials/html-foot.php'; ?>