<?php
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $result = $stmt->get_result();
?>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.4.0/esm/ionicons.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body,input,button,textarea,select {
        outline: none;
        font-size: 12px;
        line-height: 1.5;
        font-family: "Poppins", sans-serif;
    }

    button {
        cursor: pointer;
    }
/* 
    body {
        padding: 20px;
    } */

    .image-slider {
        padding-bottom: 50px;
    }

    .image {
        width: 200px;
        height: 200px;
        margin-bottom: 10px;
    }

    .image-item {
        /* margin: 0 10px; */
        margin-left: 40px;
    }

    .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 10px;
    }

    .image-title {
        font-size: 18px;
        font-weight: bold;
    }

    .slick-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border: none;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        line-height: 1;
        z-index: 5;
        transition: all 0.2s linear;
    }

    .slick-arrow:hover {
        background-color: #2cccff;
        color: white;
    }

    .slick-prev {
        left: 0;
    }

    .slick-next {
        right: 0;
    }

    .slick-dots {
        position: absolute;
        list-style: none;
        left: 50%;
        transform: translate(-50%, 0);
        display: flex !important;
        align-items: center;
        justify-content: center;
        gap: 0 20px;
    }

    .slick-dots button {
        font-size: 0;
        width: 15px;
        height: 15px;
        border-radius: 100rem;
        background-color: #eee;
        border: none;
        outline: none;
        transition: all 0.2s linear;
    }

    .slick-dots .slick-active button {
        background-color: #2cccff;
    }
</style>

<div class="image-slider">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="image-item">
            <div class="image">
                <img src="<?php $row['image_url'] = str_replace('../..', 'admin', $row['image_url']); echo $row['image_url']; ?>">
            </div>
        <h3 class="image-title"><?php echo $row['name']; ?></h3>
    </div>
    <?php } ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.image-slider').slick({
            slidesToShow: 5,
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