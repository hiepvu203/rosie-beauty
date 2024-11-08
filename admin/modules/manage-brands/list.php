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
    // Chuẩn bị câu lệnh SELECT
    $stmt = $conn->prepare("SELECT * FROM brands");
    if ($stmt === false) {
        die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
    }

    // Thực thi câu lệnh
    $stmt->execute();

    // Lấy kết quả
    $result = $stmt->get_result();
?>
    <table border="1">
        <tr>
            <th>Tên thương hiệu</th>
            <th>Logo</th>
            <th>Thao tác</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><img src="<?php $row['logo_url'] = str_replace('../..', '../admin', $row['logo_url']); echo $row['logo_url']; ?>" width="100" height="100"></td>
            <td><a href="modules/manage-brands/handle.php?brand_id=<?php echo $row['brand_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a> | <a href="?action=manage-brands&query=update&brand_id=<?php echo $row['brand_id']; ?>">Sửa</a></td>
        </tr>
        <?php } ?>
    </table>
<?php
    $stmt->close();
    $conn->close();
?>