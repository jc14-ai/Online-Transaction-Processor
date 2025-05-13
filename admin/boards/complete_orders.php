<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    $order_update_query = "UPDATE orders SET order_status = 'completed' WHERE order_id = $order_id;";
    $order_update_query_run = mysqli_query($conn, $order_update_query);

    header('Content-Type: application/json');
    echo json_encode($order_id);
}
?>