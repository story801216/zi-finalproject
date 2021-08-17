<?php
$id = $_GET["id"];

require_once "database.php";

// 根據id查到當前資料是誰
$sql = "SELECT * FROM `hospital` WHERE `sid` = $id";
//查詢
$result = $pdo->query($sql);

//得到商品的具體信息
$res = $result->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<title>編輯醫院資料</title>

</head>
<body>
    <!-- <form action="go.php" method="get">
        <input hidden name="i" value="<?php echo $res['sid'];?>" type="text">
        <input name="hsname" value="<?php echo $res['院所名稱'];?>" type="text" placeholder="院所名稱">
        <input name="subject" value="<?php echo $res['看診科別'];?>" type="text" placeholder="看診科別">
        <input name="drname" value="<?php echo $res['醫師姓名'];?>" type="text" placeholder="醫師姓名">
        <input name="time" value="<?php echo $res['看診時段'];?>" type="text" placeholder="看診時段">
        <input name="phone" value="<?php echo $res['電話'];?>" type="number" placeholder="電話">
        <input name="address" value="<?php echo $res['地址'];?>" type="text" placeholder="地址">
        <input type="submit" value="修改">
    </form> -->



    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">修改資料</h5>
    
                        <form action="go.php" method="get">
                            <div class="form-group">
                                <input hidden name="i" value="<?php echo $res['sid'];?>" type="text">
                            </div>
                            <div class="form-group">
                                <label for="hsname">院所名稱</label>
                                <input name="hsname" value="<?php echo $res['院所名稱'];?>" type="text" class="form-control" >
                                <small class="form-text "></small>
                            </div>
                            <div class="form-group">
                                <label for="subject">看診科別</label>
                                <input name="subject" value="<?php echo $res['看診科別'];?>" type="text" class="form-control" >
                                <small class="form-text "></small>
                            </div>
                            <div class="form-group">
                                <label for="drname">醫師姓名</label>
                                <input name="drname" value="<?php echo $res['醫師姓名'];?>" type="text" class="form-control" >
                                <small class="form-text "></small>
                            </div>
                            <div class="form-group">
                                <label for="time">看診時段</label>
                                <input name="time" value="<?php echo $res['看診時段'];?>" type="text" class="form-control" >
                                <small class="form-text "></small>
                            </div>
                            <div class="form-group">
                                <label for="phone">電話</label>
                                <input name="phone" value="<?php echo $res['電話'];?>" type="text" class="form-control" >
                                <small class="form-text "></small>
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <input name="address" value="<?php echo $res['地址'];?>" type="text" class="form-control" >
                                <small class="form-text "></small>
                            </div>

                            <button type="submit" class="btn btn-primary">修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>