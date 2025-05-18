<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $product_query = "SELECT * FROM donut WHERE donut_id = $product_id LIMIT 1;";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_row = mysqli_fetch_assoc($product_query_run);
    $product_image = $product_row['image'];

    header('Content-Type: application/json');
    echo json_encode([
        'image' => $product_image,
    ]);
}
?>