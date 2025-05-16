<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $order_update_query = "UPDATE orders SET order_status = 'completed' WHERE order_id = $order_id;";
    $order_update_query_run = mysqli_query($conn, $order_update_query);

    $user_id_query = "SELECT * FROM orders WHERE order_id = $order_id;";
    $user_id_query_run = mysqli_query($conn, $user_id_query);
    $user_id_row = mysqli_fetch_assoc($user_id_query_run);

    $user_id = $user_id_row['user_id'];
    $message = "You order is now ready!";
    $date = date("Y-m-d");

    $notif_insert_query = "INSERT INTO notification(user_id, message, order_date) VALUES($user_id, '$message', '$date');";
    $notif_insert_query_run = mysqli_query($conn, $notif_insert_query);

    header('Content-Type: application/json');
    echo json_encode($order_id);
}
?>