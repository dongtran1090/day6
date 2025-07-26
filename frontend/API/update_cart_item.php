<?php
session_start();
header('Content-Type: application/json');
include_once(__DIR__ . '/../../connectDB.php');

// Kiểm tra giỏ hàng đã tồn tại chưa
if (!isset($_SESSION['cart'])) {
    echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
    exit;
}

// Nhận và kiểm tra dữ liệu đầu vào
$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

if ($id <= 0 || $quantity <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid product ID or quantity']);
    exit;
}

// Kiểm tra sản phẩm có trong giỏ hàng không
if (!isset($_SESSION['cart'][$id])) {
    echo json_encode(['status' => 'error', 'message' => 'Product not found in cart']);
    exit;
}

// Cập nhật số lượng và tổng tiền
$_SESSION['cart'][$id]['quantity'] = $quantity;
$_SESSION['cart'][$id]['total'] = $quantity * $_SESSION['cart'][$id]['price'];

// ✅ Dọn rác nếu có key sai (ví dụ "" hoặc key không hợp lệ)
foreach ($_SESSION['cart'] as $key => $item) {
    if (!is_numeric($key) || $key <= 0 || !isset($item['id'])) {
        unset($_SESSION['cart'][$key]);
    }
}

// Tính lại tổng số item
$totalItems = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalItems += $item['quantity'];
}

// Phản hồi
echo json_encode([
    'status' => 'success',
    'message' => 'Cart updated',
    'cart' => $_SESSION['cart'],
    'totalItems' => $totalItems
]);
