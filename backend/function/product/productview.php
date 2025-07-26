<?php
<<<<<<< Updated upstream
include '../../../../connectDB.php';
=======
include_once(__DIR__ . '/../../../connectDB.php');

>>>>>>> Stashed changes
$con = connectDB();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <form method="GET" action="" class="me-3 w-50">
                <label for="products" class="form-label">Product</label>
                <input type="text" name="products" id="products" class="form-control" 
                    placeholder="Search by products"
                    value="<?php echo isset($_GET['products']) ? htmlspecialchars($_GET['products']) : ''; ?>">
                <input type="submit" value="Search" class="btn btn-primary mt-2">
            </form>

            <div>
                <h1 class="h3 mb-3">Product List</h1>
                <a href="create.php" class="btn btn-success">+ Create New</a>
            </div>
        </div>

        <table class="table table-bordered table-hover bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock Quantity</th>
                    <th>Image</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT id, name,description, price, stock_quantity, image_url FROM products";

                if (isset($_GET['products']) && trim($_GET['products']) !== '') {
                    $name = $con->real_escape_string(trim($_GET['products']));
                    $sql .= " WHERE name LIKE '%$name%'";
                }

                $result = $con->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['description']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['stock_quantity']}</td>
                           <td><img src='/demoshop/asset/{$row['image_url']}' alt='Image' style='width: 80px; height: auto;'></td>

                            <td>
                                <a href='update.php?id={$row['id']}' class='btn btn-sm btn-warning'>Update</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                        </tr>";
                    }
                    $result->free_result();
                } else {
                    echo "<tr>
                        <td colspan='6' class='text-center text-danger'>Không tìm thấy sản phẩm nào với từ khóa trên.</td>
                    </tr>";
                }

                $con->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
