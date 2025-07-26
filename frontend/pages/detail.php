<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>

    <?php include_once(__DIR__ . '/../layouts/style.php'); ?>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }

        .preview {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .preview-pic {
            max-height: 300px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .preview-pic img {
            width: 40%;
            height: auto;
            object-fit: scale-down;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .card {
            background: #f8f9fa;
            padding: 2em;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: uppercase;
            font-weight: bold;
        }

        .checked {
            color: #ff9f1a;
        }

        .add-to-cart,
        .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: uppercase;
            font-weight: bold;
            color: #fff;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #b36800;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>

<?php
    include_once(__DIR__ . '/../../connectDB.php');
    $con = connectDB();
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($con, $sql);
    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<main class="container mt-5">
    <?php if ($product): ?>
        <div class="card">
            <div class="row">
                <div class="col-md-6 preview">
                    <div class="preview-pic">
                        <img src="/demoshop/asset/<?= $product['image_url'] ?>" alt="<?= $product['name'] ?>">
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active">
                            <a data-bs-toggle="tab" href="#pic-1">
                                <img src="/demoshop/asset/<?= $product['image_url'] ?>">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 details">
                    <h3 class="product-title"><?= htmlspecialchars($product['name']) ?></h3>
                    <div class="rating mb-2">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">999 ratings</span>
                    </div>
                    <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                    <h4 class="price">Price: <span><?= number_format($product['price'], 0, '.', ',') ?> VND</span></h4>
                    <p>Stock: <?= $product['stock_quantity'] ?></p>

                    <form method="post" action="/demoshop/frontend/API/add_cart.php">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <div class="form-group mb-3">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" class="form-control w-50" min="1" value="1">
                        </div>
                        <form action="/../API/add_cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="add-to-cart btn btn-primary">Add to Cart</button>
                        </form>
                    </form>
                </div>
            </div>
        </div>

        <!-- Product Detailed Description -->
        <div class="card mt-4">
            <div class="container-fluid">
                <h3>Product Details</h3>
                <div class="row">
                    <div class="col">
                        <p><?= htmlspecialchars($product['description']) ?></p>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>
        <div class="alert alert-warning">Product not found.</div>
    <?php endif; ?>
</main>

<?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
<?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
</body>
</html>
