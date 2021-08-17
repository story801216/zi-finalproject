<?php
// 修改會員資料

    include __DIR__. '/partials/init.php';
    $title = '修改會員資料';


    $sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

    $sql = "SELECT * FROM `address_book` WHERE sid=$sid";

    $r = $pdo->query($sql)->fetch(); // 可透過fetch()得到單筆資料的關聯式陣列，但如果輸入錯誤的sid值的話(沒有該筆資料)，就會回傳false

    if(empty($r)){   // 如果$r為空值的話就轉回列表頁(data-list.php)
        header('Location: data-list.php');
        exit;
    };
    // echo json_encode($r, JSON_UNESCAPED_UNICODE);exit; --> 會得到該筆的完整會員資料
?>
<?php include __DIR__. '/partials/html-head.php'; ?>
<?php include __DIR__. '/partials/navbar.php'; ?>
<style>
    form .form-group small {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">修改資料</h5> 

                    <form name="form1" onsubmit="checkForm(); return false;">
                        <input type="hidden" name="sid" value="<?= $r['sid'] ?>">  
                        <!-- ↑多增加一個要包在Header的值(sid)，這樣就可以透過Header告訴後端目前要更改的是哪一筆資料，但因為頁面上不需要顯示，所以用 type="hidden"隱藏起來 -->
                        
                        <div class="form-group">
                        <label for="account">帳號 *</label>
                            <input type="text" class="form-control" id="account" name="account"
                                   value="<?= htmlentities($r['account']) ?>">
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="password">密碼 *</label>
                            <input type="text" class="form-control" id="password" name="password"
                                   value="<?= htmlentities($r['password']) ?>">
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="name">姓名 *</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="<?= htmlentities($r['name']) ?>">
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="idnumber">身分證字號 *</label>
                            <input type="text" class="form-control" id="idnumber" name="idnumber"
                                   value="<?= htmlentities($r['idnumber']) ?>">
                            <small class="form-text "></small>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">email *</label>
                            <input type="text" class="form-control" id="email" name="email"
                                   value="<?= htmlentities($r['email']) ?>">
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="mobile">mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                   value="<?= htmlentities($r['mobile']) ?>">
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="birthday">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday"
                                   value="<?= htmlentities($r['birthday']) ?>">
                            <small class="form-text "></small>
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea class="form-control" id="address" name="address" cols="30" rows="3"
                                 ><?= htmlentities($r['address']) ?></textarea> <!-- textarea接PHP時，中間不要留空白 -->
                            <small class="form-text "></small>
                        </div>

                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>


                </div>
            </div>
        </div>
    </div>


</div>
<?php include __DIR__. '/partials/scripts.php'; ?>
<script>
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    const mobile_re = /^09\d{2}?\d{3}?\d{3}$/;

    

    const account = document.querySelector('#account');
    const password = document.querySelector('#password');
    const name = document.querySelector('#name');
    const idnumber = document.querySelector('#idnumber');
    const email = document.querySelector('#email');
    const mobile = document.querySelector('#mobile');

    function checkForm(){
        // 欄位的外觀要回復原來的狀態(從紅色的錯誤狀態回到初始化)
        name.nextElementSibling.innerHTML = '';
        name.style.border = '1px #CCCCCC solid';
        email.nextElementSibling.innerHTML = '';
        email.style.border = '1px #CCCCCC solid';

        let isPass = true;  // 預設:通過檢查
        if(account.value.length < 6){  // 檢查'account'字串是否有超過六個字以上
            isPass = false;         // 如果沒有的話就不通過
            account.nextElementSibling.innerHTML = '請填寫正確的帳號'; //不通過的話就show出請填寫'正確的帳號'的字樣
            account.style.border = '1px red solid';// 不通過就將border改為紅色
        }

        if(password.value.length < 6){  // 檢查'password'字串是否有超過六個字以上
            isPass = false;         // 如果沒有的話就不通過
            password.nextElementSibling.innerHTML = '請填寫正確的密碼'; //不通過的話就show出請填寫'正確的姓名'的字樣
            password.style.border = '1px red solid';// 不通過就將border改為紅色
        }

        

        if(name.value.length < 2){  // 檢查'name'字串是否有超過兩個字以上
            isPass = false;         // 如果沒有的話就不通過
            name.nextElementSibling.innerHTML = '請填寫正確的名字'; //不通過的話就show出請填寫'正確的姓名'的字樣
            name.style.border = '1px red solid';// 不通過就將border改為紅色
        }



        if(idnumber.value.length <= 9 ){  // 檢查'idnumber'字串是否有超過十個字以上
            isPass = false;         // 如果沒有的話就不通過
            idnumber.nextElementSibling.innerHTML = '請填寫正確的身分證字號'; //不通過的話就show出請填寫'正確的身分證字號'的字樣
            idnumber.style.border = '1px red solid';// 不通過就將border改為紅色
        }

        if(! email_re.test(email.value)){  //驗證E-mail格式是否正確
            isPass = false;
            email.nextElementSibling.innerHTML = '請填寫正確的 Email 格式';
            email.style.border = '1px red solid';
        }

        if(! mobile_re.test(mobile.value)){  //驗證mobile格式是否正確
            isPass = false;
            mobile.nextElementSibling.innerHTML = '請填寫正確手機號碼';
            mobile.style.border = '1px red solid';
        }



        if(isPass){                      //如果以上都通過了，才發ajax
            const fd = new FormData(document.form1);
            fetch('data-edit-api.php', {
                method: 'POST',
                body: fd
            })
                .then(r=>r.json())
                .then(obj=>{
                    console.log(obj);
                    if(obj.success){
                        alert('修改成功');
                        location.href = 'data-list.php';
                    } else {
                        alert(obj.error);
                    }
                })
                .catch(error=>{
                    console.log('error:', error);
                });
        }
    }
</script>
<?php include __DIR__. '/partials/html-foot.php'; ?>