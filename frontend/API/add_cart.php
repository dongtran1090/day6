<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Nhận và lọc dữ liệu
$id = intval($_POST['id'] ?? 0);
$name = htmlspecialchars($_POST['name'] ?? '', ENT_QUOTES);
$price = floatval($_POST['price'] ?? 0);
$image = htmlspecialchars($_POST['image'] ?? '', ENT_QUOTES);
$quantity = intval($_POST['quantity'] ?? 1);

if (!$id) {
    echo json_encode(['status' => 'error', 'message' => 'Missing product ID']);
    exit;
}

if ($quantity < 1) {
    $quantity = 1;
}

// Nếu sản phẩm đã có -> tăng số lượng
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$id] = [
        'id' => $id,
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'quantity' => $quantity
    ];
}

// Tính tổng số item
$totalItems = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalItems += $item['quantity'];
}

echo json_encode([
    'status' => 'success',
    'message' => 'Product added to cart',
    'cart' => $_SESSION['cart'],
    'totalItems' => $totalItems
]);
