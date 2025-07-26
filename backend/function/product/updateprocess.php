<?php
include '../../../../connectDB.php';
$con = connectDB();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? 0;
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price= $_POST['price'] ?? 0;
    $stock_quantity = $_POST['stock_quantity'] ?? 0;
    $image = $_POST['image_url'] ?? '';

    $sql = "UPDATE products 
            SET name = '$name',
                description = '$description',
                price = '$price',
                stock_quantity = '$stock_quantity',
                image_url = '$image'
            WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        header("Location: productview.php");
    } else {
        echo "Lỗi khi cập nhật: " . $con->error;
        // hoặc chuyển hướng:
        // header("Location: update.php?id=$id");
    }

    $con->close();
} else {
    // Nếu không phải POST thì không xử lý
    header("Location: update.php");
    exit;
}
?>
