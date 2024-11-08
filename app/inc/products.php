<?php
    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<link rel="stylesheet" href="app/assets/css/products_inc.css">

<div class="products-container">
    <h1 class="section-title">Tất cả sản phẩm</h1>
    <div class="categories">
        <a href="#">Mỹ phẩm</a>
        <a href="#">Dưỡng da</a>
        <a href="#">Dụng cụ</a>
    </div>
    <div class="products-grid">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product-card">
            <img src="<?php $row['image_url'] = str_replace('../..', 'admin', $row['image_url']); echo $row['image_url']; ?>">
                <p class="product-name"><?php echo $row['name']; ?></p>
                <!-- <p class="product-price"><?php echo number_format($row['price'], 0, ',', '.') . "₫"; ?></p> -->
            </div>
        <?php } ?>
    </div>
</div>