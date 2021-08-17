<?php
session_start();

// session_destroy(); // 完全清除所有的 session
unset($_SESSION['user']); // 只移除某個 session 變數

header('Location: index_.php');