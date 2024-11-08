<?php
    $stmt = $conn->prepare("SELECT * FROM products LIMIT 5");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
<link rel="stylesheet" href="app/assets/css/promotion_inc.css">


<div class="promotion-container">
    <div class="promotion-title">
        <img src="app/assets/img/background-title/promotion_module_background.png" alt="KHUYẾN MẠI">
        <a href="">KHUYẾN MÃI</a>
    </div>  
    <div class="promotion-content">
        <div class="image-slider-promotion">
            <?php while ($product = $result->fetch_assoc()) { ?>
                <div class="image-item">      
                <div class="image">
                        <img src="<?php $product['image_url'] = str_replace('../..', 'admin', $product['image_url']); echo $product['image_url']; ?>">
                    </div>
                    <p><?php echo $product['name']; ?></p>
                    <!-- <p class="old-price"><?php echo number_format($product['old_price'], 0, ',', '.'); ?>đ</p>
                    <p class="new-price"><?php echo number_format($product['sale_price'], 0, ',', '.'); ?>đ</p> -->
                </div>  
            <?php } ?>
        </div>

        <!-- Image Banner -->
        <div class="image-banner">
            <img src="app/assets/img/promotion/banner_promotion.jpg" alt="Promotion Banner">
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.image-slider-promotion').slick({
            slidesToShow: 3,
            infinite: false,
            arrows: true,
            draggable: false,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            dots: true,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                    slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 480,
                    settings: {
                    slidesToShow: 1,
                    arrows: false,
                    infinite: false,
                    },
                },
            ],
            autoplay: true,
            autoplaySpeed: 2000
        });
    });
</script>