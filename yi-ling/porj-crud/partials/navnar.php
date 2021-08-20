<style>
    .cart-icon{
        padding-top: 6px;
    }
</style>
    
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../../../finalproject/zi-ting/index_.php">首頁</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../../../finalproject/zi-ting/data-list.php">會員資料列表</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../../finalproject/po-yu/products/data-list.php">商品</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../../finalproject/pinchiao/hospital_2/">找醫院</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../../finalproject/yi-ling/porj-crud/data-list.php">門市資訊</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../../../finalproject/po-yu/products/order-list.php">查看訂單</a>
                </li>
                    
                </ul>
    
                <ul class="navbar-nav">
            <?php if(isset($_SESSION['user'])): ?>
                    <li class="nav-item active">
                         <a class="nav-link" href="../../../finalproject/zi-ting/profile-edit.php" ><?= $_SESSION['user']['name']  ?></a> 
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="../../../finalproject/zi-ting/logout.php">登出</a>
                    </li>
                    <?php else: ?>
                        <li class="nav-item active">
                        <a class="nav-link" href="../../../finalproject/zi-ting/login.php">登入</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../../../finalproject/zi-ting/data-insert.php">註冊</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item active cart-icon">
                        <a class="nav-link" href="../../../finalproject/po-yu/products/cart-check.php" >
                            <i class="fas fa-shopping-cart"><?= isset($_SESSION['total']) ? $_SESSION['total']: ''; ?></i>
                        </a>
                </li>
            </ul>
    
            </div>
        </div>
    </nav>

