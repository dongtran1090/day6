<?php
session_start();
$cart = $_SESSION['cart'] ?? [];

// Hàm định dạng tiền tệ
function formatCurrency($number) {
    return number_format($number, 0, ',', '.') . ' VND';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    h2 {
      font-weight: bold;
    }
    .table img {
      border-radius: 8px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container mt-5 mb-5">
  <h2 class="mb-4">🛒 Your Shopping Cart (<?= count($cart) ?> items)</h2>

  <?php if (empty($cart)): ?>
    <div class="alert alert-info">Your cart is currently empty.</div>
    <a href="../../frontend/index.php" class="btn btn-primary mt-3">← Continue Shopping</a>
  <?php else: ?>
    <table class="table table-bordered table-hover text-center bg-white">
      <thead class="table-light">
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $grandTotal = 0;
        foreach ($cart as $item):
          $itemTotal = $item['price'] * $item['quantity'];
          $grandTotal += $itemTotal;
        ?>
        <tr>
          <td><img src="/demoshop/asset/uploads/<?= htmlspecialchars($item['image']) ?>" width="60" height="60"></td>
          <td><?= htmlspecialchars($item['name']) ?></td>
          <td><?= formatCurrency($item['price']) ?></td>
          <td>
            <form action="../../frontend/API/update_cart_item.php" method="POST" class="d-flex justify-content-center align-items-center">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <input type="number" name="quantity" value="<?= $item['quantity'] ?>" min="1" class="form-control form-control-sm w-50 text-center me-2">
              <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
            </form>
          </td>
          <td><?= formatCurrency($itemTotal) ?></td>
          <td>
            <form action="../../frontend/API/delete_cart_item.php" method="POST" style="display:inline-block;">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to remove this item?')">Remove</button>
            </form>
          </td>
        </tr>
        <?php endforeach; ?>
        <tr class="table-light fw-bold">
          <td colspan="4" class="text-end">Total:</td>
          <td colspan="2"><?= formatCurrency($grandTotal) ?></td>
        </tr>
      </tbody>
    </table>

    <div class="d-flex justify-content-between mt-4">
      <a href="../../frontend/index.php" class="btn btn-secondary">← Continue Shopping</a>
      <a href="checkout.php" class="btn btn-success">🧾 Proceed to Checkout</a>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
