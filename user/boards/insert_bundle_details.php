<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['bundle_name'])) {
    $user_name = $_SESSION['user'];
    $bundle_name = $_GET['bundle_name'];
    $bundle_count = intval($_GET['bundle_count']);

    $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
    $user_id_query_run = mysqli_query($conn, $user_id_query);

    $user_id = mysqli_fetch_assoc($user_id_query_run);

    $bundle_select_query = "SELECT bundle_id FROM bundles WHERE bundle_name = '$bundle_name' LIMIT 1;";
    $bundle_select_query_run = mysqli_query($conn, $bundle_select_query);

    $bundle = mysqli_fetch_assoc($bundle_select_query_run);

    $is_existing_query = "SELECT COUNT(*) AS existing FROM cart WHERE bundle_id = " . $bundle['bundle_id'] . " AND user_id = " . $user_id['user_id'] . " LIMIT 1;";
    $is_existing_query_run = mysqli_query($conn, $is_existing_query);

    $existing = mysqli_fetch_assoc($is_existing_query_run);

    if ($existing['existing'] == 1) {
        $update_existing_query = "UPDATE CART SET quantity = quantity + $bundle_count WHERE bundle_id = " . $bundle['bundle_id'] . " AND user_id = " . $user_id['user_id'] . ";";
        $update_existing_query_run = mysqli_query($conn, $update_existing_query);
    } else if ($existing['existing'] == 0) {
        $bundle_insert_query = "INSERT INTO cart(user_id, bundle_id, quantity) VALUES(" . $user_id['user_id'] . ", " . $bundle['bundle_id'] . ", " . " $bundle_count);";
        $bundle_insert_query_run = mysqli_query($conn, $bundle_insert_query);
    }

    echo "$bundle_count $bundle_name bundle added to cart!";
}
?>