<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $order_insert_query = "INSERT INTO orders(user_id, order_date, order_status) VALUES($user_id, '" . date("Y-m-d") . "', 'pending');";
    $order_insert_query_run = mysqli_query($conn, $order_insert_query);

    $user_cart_query = "SELECT cart.*, orders.order_id FROM cart LEFT JOIN orders ON cart.user_id = orders.user_id WHERE cart.user_id = $user_id AND orders.order_status = 'pending';";
    $user_cart_query_run = mysqli_query($conn, $user_cart_query);

    while ($user_cart_row = mysqli_fetch_assoc($user_cart_query_run)) {
        $order_id = $user_cart_row['order_id'];
        $coffee_id = $user_cart_row['coffee_id'];
        $coffee_size_id = $user_cart_row['coffee_size_id'];
        $donut_id = $user_cart_row['donut_id'];
        $bundle_id = $user_cart_row['bundle_id'];
        $quantity = $user_cart_row['quantity'];

        $order_details_insert_query = "INSERT INTO order_details(
        order_id, coffee_id, coffee_size_id, donut_id, bundle_id, quantity) VALUES (
        " . ($order_id ?? 'NULL') . ",
        " . ($coffee_id ?? 'NULL') . ",
        " . ($coffee_size_id ?? 'NULL') . ",
        " . ($donut_id ?? 'NULL') . ",
        " . ($bundle_id ?? 'NULL') . ",
        " . ($quantity ?? 'NULL') . "
        );";
        $order_details_insert_query_run = mysqli_query($conn, $order_details_insert_query);
    }

    $delete_cart_query = "DELETE FROM cart WHERE user_id = $user_id;";
    $delete_cart_query_run = mysqli_query($conn, $delete_cart_query);

    header('Content-Type: application/json');
    echo json_encode($user_id);
}

?>