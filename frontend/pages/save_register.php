<?php
require_once __DIR__ . '/../../connectDB.php'; // Kết nối CSDL

$con = connectDB();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$email    = $_POST['email'] ?? '';
$address  = $_POST['address'] ?? '';
$role     = $_POST['role'] ?? 'user';


$sql = "INSERT INTO users (username, password, email, address, role)
        VALUES ('$username', '$password', '$email', '$address', '$role')";

if ($con->query($sql) === TRUE) {
    echo "<script>alert('Đăng ký thành công!'); window.location.href='/demoshop/frontend/pages/login.php';</script>";
} else {
    echo "Lỗi: " . $con->error;
}

$con->close();
?>
