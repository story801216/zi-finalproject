<?php include __DIR__ . './partials/init.php';?>
<?php include __DIR__ . './partials/html-head.php'; ?>
<?php include __DIR__ . './partials/navnar.php'; ?>
<style>

    .card1{
        margin: 50px 0;
    }
    form .form-group small{
        color: red;
        /* 把紅色藏起來 */
        display: none;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <div class="card card1">

                <div class="card-body">
                    <h5 class="card-title">新增門市</h5>
                    <form name="form1" onsubmit="sendForm(); return false; " action="./add-list.php">
                        <div class="form-group">
                            <label for="name">藥局名稱</label>
                            <input type="text" class="form-control" name="pName">
                            <small class="form-text">請輸入藥局名稱</small>
                           
                        </div>
                        <div class="form-group">
                            <label for="text">地址</label>
                            <input type="text" class="form-control" name="pAddress">
                            <small class="form-text">請輸入地址</small>
                        </div>
                        <div class="form-group">
                            <label for="phone">電話</label>
                            <input type="text" class="form-control" name="pPhone">
                            <small class="form-text">請輸入電話</small>
                        </div>
                        <div class="form-group">
                            <label for="time">營業時間</label>
                            <input type="text" class="form-control" name="pTime">
                            <small class="form-text">請輸入營業時間</small>
                        </div>

                        <button type="submit" class="btn btn-primary"> 完成 </button>
                    </form>
                </div>
            </div>

        </div>
    </div>


<?php include __DIR__ . './partials/scripts.php'; ?>
<script>
    //設定頁面的回應及提醒方式
    //先預設為通過，只要一個不通過，就是錯誤。
    //先建立一個變數為true,再看底下條件，其中一個條件成立那就把isPass = false (不通過)
    function sendForm(){
        let isPass = true;
        document.form1.pName.nextElementSibling.style.display = 'none';
        document.form1.pAddress.nextElementSibling.style.display = 'none';
        document.form1.pPhone.nextElementSibling.style.display = 'none';
        document.form1.pTime.nextElementSibling.style.display = 'none';

        if( ! document.form1.pName.value){
            document.form1.pName.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if( ! document.form1.pAddress.value){
            document.form1.pAddress.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if( ! document.form1.pPhone.value){
            document.form1.pPhone.nextElementSibling.style.display = 'block';
            isPass = false;
        }
        if( ! document.form1.pTime.value){
            document.form1.pTime.nextElementSibling.style.display = 'block';
            isPass = false;
        }

        if (isPass){
            //fd=form data
            const fd = new FormData(document.form1);

            fetche('add-list.php',{
                method:'POST',
                body:fd,
            })
            // .then(r=>.text())
            // .then(txt=>{
            //     console.log('result:',txt);
            // })
        }
    }
</script>



<?php include __DIR__ . './partials/html-foot.php'; ?>