<?php
  
  require_once './partials/db-connect.php';


// 如果沒有啟用 session, 就然它啟用
if(! isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="tw-zh">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>首頁</title>
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body>

<div class="col">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">藥局</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="data-list.php">診所</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-insert.php">醫院</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-insert.php">商品</a>
                    </li>
                </ul>
    
                <ul class="navbar-nav">
                    <?php if(isset($_SESSION['user'])): ?>
                        <li class="nav-item active">
                            <a class="nav-link" ><?= $_SESSION['user']['nickname'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">登出</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="login.php">登入</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">註冊</a>
                        </li>
                    <?php endif; ?>
                </ul>
    
            </div>
        </div>
    </nav>
</div>

<div class="col">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">藥局名稱</th>
            <th scope="col">地址</th>
            <th scope="col">電話</th>
            <th scope="col">營業時間</th>
            <th scope="col">刪除</th>
            <th scope="col">編輯</th>
          </tr>
        </thead>
        <tbody>
            <?php
            //取得資料
            $sql = "SELECT * FROM `stores_list`";
            $result = mysqli_query($conn, $sql)
            ?>
            <?php
            //--顯示資料--//
            // 測試一次
            // var_dump($result-> fetch_assoc());
            while($row = $result-> fetch_assoc()){
                //var_dump($row);  
           ?>
          <tr>
            <td> <?php echo $row["sName"]; ?> </td>
            <td> <?php echo $row["s_address"]; ?> </td>
            <td> <?php echo $row["sLocal_phone"]; ?> </td>
            <td> <?php echo $row["s_time"]; ?> </td>
            <td>
                <a href="delete.php?id=<?php echo $row['id']  ?>">
                <i class="fas fa-minus-circle"></i>
                </a>
            </td>
            <td>
                <a href="#">
                <i class="fas fa-edit"></i>
                </a>
            </td>
            
          </tr>
          <?php
            }
          ?>
         
        </tbody>
      </table>
      <div">
      <button type="button" class="btn btn-secondary btn-sm">新增藥局</button>
      </div>
</div>





<script src="js/jquery-3.6.0.js"></script>
<script src="bootstrap4/js/bootstrap.bundle.js"></script>
</body>

</html>