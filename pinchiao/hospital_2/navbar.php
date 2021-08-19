<?php
require_once "index.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">找醫院</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.html">新增資料</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="login.php">登入</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">註冊</a>
            </li>
        </ul>
    </div>
</nav>