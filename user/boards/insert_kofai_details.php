<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['kofai_name']) && isset($_GET['kofai_count']) && isset($_GET['kofai_size'])) {

    $user_name = $_SESSION['user'];
    $kofai_name = $_GET['kofai_name'];
    $kofai_count = intval($_GET['kofai_count']);
    $kofai_size = (int) $_GET['kofai_size'];

    $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1";
    $user_id_query_run = mysqli_query($conn, $user_id_query);
    $user_id_row = mysqli_fetch_array($user_id_query_run);

    $user_id = $user_id_row['user_id'];

    $kofai_id_query = "SELECT coffee_id FROM coffee WHERE coffee_name = '$kofai_name' LIMIT 1;";
    $kofai_id_query_run = mysqli_query($conn, $kofai_id_query);
    $coffee_row = mysqli_fetch_assoc($kofai_id_query_run);

    $kofai_id = $coffee_row['coffee_id'];

    $kofai_size_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
    $kofai_size_query_run = mysqli_query($conn, $kofai_size_query);
    $coffee_size_row = mysqli_fetch_assoc($kofai_size_query_run);

    $kofai_size_id = $coffee_size_row['coffee_size_id'];

    $is_existing_query = "SELECT COUNT(*) AS existing FROM cart WHERE coffee_id = $kofai_id and coffee_size_id = $kofai_size_id AND user_id = $user_id LIMIT 1";
    $is_existing_query_run = mysqli_query($conn, $is_existing_query);

    $existing = mysqli_fetch_assoc($is_existing_query_run);

    if ($existing['existing'] == 1) {
        $update_existing_query = "UPDATE CART SET quantity = quantity + $kofai_count WHERE coffee_id = $kofai_id AND coffee_size_id = $kofai_size_id AND user_id = $user_id";
        $update_existing_query_run = mysqli_query($conn, $update_existing_query);
    } else if ($existing['existing'] == 0) {
        $insert_kofai_query = "INSERT INTO cart(user_id, coffee_id, coffee_size_id, quantity) VALUES ($user_id , $kofai_id, $kofai_size_id, $kofai_count)";
        $insert_kofai_query_run = mysqli_query($conn, $insert_kofai_query);
    }

    $kofai_size = (string) $kofai_size . "oz";

    echo "$kofai_count $kofai_size of $kofai_name added to cart!";
}
?>