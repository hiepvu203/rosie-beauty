<link rel="stylesheet" href="app/assets/css/slidershow.css">

<?php
    function renderSlider($slides) {
        $output = '<div class="slider-container">';
        $output .= '<div class="slider">';

        foreach ($slides as $index => $slide){
            $output .= '<div class="slide">';
            $output .= '<img src="' . $slide['image'] . '">';
            $output .= '</div>';
        }

        $output .= '</div>';
        $output .= '<button class="prev-btn">&#10094;</button>';
        $output .= '<button class="next-btn">&#10095;</button>';
        $output .= '</div>';
        return $output;
    }

    $slides = [
        ['image' => 'app/assets/img/slidershow/slider_1.jpg'],
        ['image' => 'app/assets/img/slidershow/slider_2.jpg']
    ];

    echo renderSlider($slides);
?>

<script src="app/assets/js/slidershow.js"></script>