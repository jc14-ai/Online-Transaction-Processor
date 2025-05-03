<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['user_id']) && isset($_GET['product_name']) && isset($_GET['unit_price']) && isset($_GET['quantity']) && isset($_GET['total_price'])) {
    $user_id = $_GET['user_id'];
    $product_name = $_GET['product_name'];
    $unit_price = $_GET['unit_price'];
    $quantity = $_GET['quantity'];
    $total_price = $_GET['total_price'];



    $update_query = "UPDATE cart SET quantity = quantity - 1 WHERE user_id = $user_id AND coffee_id = ? AND coffee_size_id = ? LIMIT 1;";
}
?>