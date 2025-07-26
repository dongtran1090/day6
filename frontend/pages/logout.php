<!DOCTYPE html>
<html lang="en">
   <?php
session_start();

// Hủy toàn bộ session
session_unset();
session_destroy();

// Chuyển về trang đăng nhập hoặc trang chủ
header("Location: /demoshop/frontend/pages/login.php");
exit;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo shop</title>

    <?php
       include_once (__DIR__. '/../layouts/style.php'); ?>

</head>
<body>
    <?php
       include_once (__DIR__. '/../layouts/partials/header.php'); ?>
     <main></main>  

    <?php
       include_once (__DIR__. '/../layouts/partials/footer.php'); ?>

      <?php
       include_once (__DIR__. '/../layouts/scripts.php'); ?>
    
</body>
</html>