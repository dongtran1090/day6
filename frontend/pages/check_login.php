<?php
session_start();
require_once __DIR__ . '/../../connectDB.php';

$con = connectDB();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Truy vấn kiểm tra tài khoản
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = $con->query($sql);

if ($result && $result->num_rows > 0) {
    // Đăng nhập thành công
    $_SESSION['user'] = $email;
    header("Location: /demoshop/frontend/"); // Về trang chủ
    exit;
} else {
    // Sai thông tin -> quay lại hoặc thông báo
    echo "<script>alert('Email hoặc mật khẩu không đúng!'); window.history.back();</script>";
}
?>
