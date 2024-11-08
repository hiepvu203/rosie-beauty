<?php
    session_start();
    $isLogin = isset($_SESSION['username']) ? true : false;

    $isAdmin = isset($_SESSION['role']) && intval($_SESSION['role']) == 1;

    // Hàm đăng xuất
    if (isset($_POST['logout'])) {
        session_unset(); 
        session_destroy();
        header("Location: Home.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= SITENAME; ?> </title>
    <link rel="stylesheet" href="app/assets/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">  
</head>
    <body>
        <div id="header">
            <div id="left-header">
                <a href="<?= URLROOT; ?>">
                    <img src="app/assets/img/Logo/logo.png">
                </a>
            </div>
            <ul id="center-header">
                <li><a href="<?= URLROOT; ?>">TRANG CHỦ</a></li>
                <li><a href="">GIỚI THIỆU</a></li>
                <li>
                    <a href="">
                        SẢN PHẨM
                        <i class="nav-arrow-down fa-solid fa-caret-down"></i>
                    </a>
                    <ul class="subnav">
                        <li><a href="#">Kem dưỡng da</a></li>
                        <li><a href="#">Sữa rửa mặt</a></li>
                        <li><a href="#">Dầu gội</a></li>
                        <li><a href="#">Sữa tắm</a></li>
                    </ul>
                </li>
                <li><a href="">LIÊN HỆ</a></li>
                <li><a href="">TIN TỨC</a></li>
                <li><a href="">GIỎ HÀNG</a></li>
                <li><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></li>
            </ul>
            <div id="right-header">
                <ul id="nav-right">   
                    <?php if ($isLogin): ?>
                        <li class="account-icon">
                            <a href="app/pages/accountDetail.php">
                                <!-- <i class="fa-regular fa-user"></i> -->
                                <img class="icon-user" src="app/assets/img/Logo/icon_user.png" alt="">
                            </a>
                            <ul class="subnav-two">
                                <li><a href="app/pages/accountDetail.php">Thông tin tài khoản</a></li>
                                <li><a href="app/pages/orderHistory.php">Lịch sử đơn hàng</a></li>
                                <li><a href="app/pages/changePassword.php">Đổi mật khẩu</a></li>
                                <li>
                                    <form method="post">
                                        <button class="btn-logout" type="submit" name="logout">Đăng Xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="app/pages/account.php">
                                <img class="icon-user" src="app/assets/img/Logo/icon_user.png" alt="">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if ($isAdmin): ?>
                    <link rel="stylesheet" href="app/assets/css/btn-admin.css">
                    <div class="btn-admin">
                        <a href="admin/index_admin.php" class="admin">Trang Admin</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
