<?php
session_start();
header('Content-Type: application/json');
include_once(__DIR__ . '/../../connectDB.php');
$conn = connectDb();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (!$id) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
    exit;
}

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];

    // ✅ Sửa lỗi tại đây: KHÔNG dùng dấu nháy đơn
    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    $_SESSION['cart'] = $cart;
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Product removed from cart',
        'cart' => $_SESSION['cart']
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Cart is empty']);
}
