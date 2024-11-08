<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
<?php
    include_once "../config/database.php";

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();
    $result = $stmt->get_result();
?>
    <table border="1">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Danh mục</th>
            <th>Ảnh</th>
            <th>Ngày nhập</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                    $query = "SELECT * FROM categories WHERE category_id = '$row[category_id]'";
                    $row_alter_categories = mysqli_query($conn, $query);
                    $row_alter_categories = mysqli_fetch_array($row_alter_categories);
                    echo $row_alter_categories['name'];
                ?>
            </td>
            <td><img src="<?php $row['image_url'] = str_replace('../..', '../admin', $row['image_url']); echo $row['image_url']; ?>" width="100" height="100"></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><a href="../../">Chi tiết</a>|<a href="modules/manage-products/handle.php?product_id=<?php echo $row['product_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>|<a href="?action=manage-products&query=update&product_id=<?php echo $row['product_id']; ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
    $stmt->close();
    $conn->close();
?>