<?php
    $stmt = $conn->prepare("SELECT * FROM brands");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<link rel="stylesheet" href="app/assets/css/brand_inc.css">

<div class="brand-section">
    <h2>Thương hiệu nổi bật</h2>
    <div class="brand-slider-container">
        <div class="brand-slider">
            <?php while ($brand = $result->fetch_assoc()) { ?>
                <div class="brand-item">
                    <img src="<?php echo str_replace('../..', 'admin', $brand['logo_url']); ?>" alt="<?php echo $brand['name']; ?>">
                </div>
            <?php } ?>
        </div>
    </div>
</div>
