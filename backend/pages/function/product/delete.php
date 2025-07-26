<?php
include '../../../../connectDB.php';
$con = connectDB();
    $id = $_GET['id'];

    $sql = "Delete FROM products WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        header("Location: productview.php");
    } else {
        header("Location: .php");
    }
    $con->close();
    