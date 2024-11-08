<?php
    $stmt = $conn->prepare("SELECT * FROM blogs ORDER BY created_at DESC LIMIT 4");
    $stmt->execute();
    $result = $stmt->get_result();
?>

<link rel="stylesheet" href="app/assets/css/blogs.css">
<div class="blog-section">
    <h2>Góc làm đẹp - Sự kiện</h2>
    <div class="blog-posts">
        <?php
            while ($row = $result->fetch_assoc()) {
        ?>
        <div class="blog-post">
            <img src="<?php $row['img_url'] = str_replace('../..', 'admin', $row['img_url']); echo $row['img_url']; ?>" alt="Blog Image" class="blog-image">
            <div class="blog-details">
                <span class="blog-date"><?php echo date("d/m/Y", strtotime($row['created_at'])); ?></span>
                <h3 class="blog-title"><?php echo $row['title']; ?></h3>
                <p class="blog-content"><?php echo mb_strimwidth($row['content'], 0, 100, "..."); ?></p>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <a href="#" class="view-more">Xem tất cả</a>
</div>