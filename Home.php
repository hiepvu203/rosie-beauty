<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* body {
            max-width: 100%;
        } */
    </style>
</head>
<body>
    <?php
        include_once 'config/constant.php'; 
        include_once 'config/database.php';
        include_once 'app/inc/slideshow.php';
        include_once 'app/inc/header.php'; 
    ?>
    <div class="center">
        <?php
            include_once 'app/inc/service.php';
            include_once 'app/inc/promotion.php';
            //include_once 'app/inc/product_temp.php';
            include_once 'app/inc/temp_2.php';
            include_once 'app/inc/products.php';
            include_once 'app/inc/banner_content.php';
            include_once 'app/inc/blogs.php';
            include_once 'app/inc/brands.php';
            include_once 'app/inc/footer.php';
        ?>
    </div>
</body>
</html>