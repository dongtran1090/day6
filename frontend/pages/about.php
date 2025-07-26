<!DOCTYPE html>
<html lang="en">
    <?php
       session_start();
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