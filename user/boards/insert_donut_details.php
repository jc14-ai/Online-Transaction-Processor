<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['donut_name'])) {
    $user_name = $_SESSION['user'];
    $donut_name = $_GET['donut_name'];
    $donut_count = intval($_GET['donut_count']);

    $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
    $user_id_query_run = mysqli_query($conn, $user_id_query);

    $user_id = mysqli_fetch_assoc($user_id_query_run);

    $donut_select_query = "SELECT donut_id FROM donut WHERE donut_name = '$donut_name' LIMIT 1;";
    $donut_select_query_run = mysqli_query($conn, $donut_select_query);

    $donut = mysqli_fetch_assoc($donut_select_query_run);

    $is_existing_query = "SELECT COUNT(*) AS existing FROM cart WHERE donut_id = " . $donut['donut_id'] . " AND user_id = " . $user_id['user_id'] . " LIMIT 1;";
    $is_existing_query_run = mysqli_query($conn, $is_existing_query);

    $existing = mysqli_fetch_assoc($is_existing_query_run);

    if ($existing['existing'] == 1) {
        $update_existing_query = "UPDATE CART SET quantity = quantity + $donut_count WHERE donut_id = " . $donut['donut_id'] . " AND user_id = " . $user_id['user_id'] . ";";
        $update_existing_query_run = mysqli_query($conn, $update_existing_query);
    } else if ($existing['existing'] == 0) {
        $donut_insert_query = "INSERT INTO cart(user_id, donut_id, quantity) VALUES(" . $user_id['user_id'] . ", " . $donut['donut_id'] . ", " . " $donut_count);";
        $donut_insert_query_run = mysqli_query($conn, $donut_insert_query);
    }

    echo "$donut_count $donut_name donut added to cart!";
}
?>