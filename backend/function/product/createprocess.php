<?php
include '../../../../connectDB.php';
$con = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;   
    $stock_quantity = $_POST['stock_quantity'] ?? 0;
    $image = $_POST['image'] ?? '';

    $sql = "INSERT INTO products (name, description, price, stock_quantity, image_url) 
            VALUES ('$name', '$description', '$price', '$stock_quantity', '$image')";

    if ($con->query($sql) === TRUE) {
        header("Location: productview.php");
    } else {
        // Nếu lỗi, bạn có thể hiển thị lỗi chi tiết để dễ debug:
        echo "Error: " . $sql . "<br>" . $con->error;
        // Hoặc redirect về form: header("Location: createProduct.php");
    }

    $con->close();
} else {
    // Nếu ai đó truy cập file mà không gửi POST, chuyển hướng lại form
    header("Location: create.php");
    exit;
}
?>
