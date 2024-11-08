<?php
    session_start();
    $isAdmin = isset($_SESSION['role']) && intval($_SESSION['role']) == 1;
    if (!$isAdmin) {
        header("Location: ../");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" href="public/css/index_admin.css">
</head>
<body>
    <button><a href="../Home.php">Trở về trang chủ</a></button>
    <h3 class = "title-admin">WELCOME TO ADMIN</h3>

    <div class="wrapper">
        <?php
            include "../config/database.php";  
            // include "modules/header.php";
            include "modules/menu.php";
            include "modules/route.php";
            // include "modules/footer.php";
        ?>
    </div>
</body>
</html>