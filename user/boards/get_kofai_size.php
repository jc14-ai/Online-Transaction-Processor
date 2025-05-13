<?php
session_start();
header('Content-Type: application/json');
include("../../site/backend/dbcon.php");

if (isset($_GET['kofai_id'])) {
    $coffee_id = $_GET['kofai_id'];

    $get_size_query = "SELECT coffee_price.coffee_id, coffee_size.coffee_size, coffee_price.coffee_price, coffee_price.status FROM coffee_price LEFT JOIN coffee_size ON coffee_price.coffee_size_id = coffee_size.coffee_size_id WHERE coffee_id = $coffee_id ORDER BY coffee_price.coffee_size_id;";
    $get_size_query_run = mysqli_query($conn, $get_size_query);

    $size = [];
    while ($row = mysqli_fetch_assoc($get_size_query_run)) {
        $size[] = $row;
    }

    echo json_encode($size);
}
?>