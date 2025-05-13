<?php
session_start();
header('Content-Type: application/json');
include("../../site/backend/dbcon.php");

if (isset($_GET['user_id']) && isset($_GET['product_name']) && isset($_GET['unit_price'])) {
    $user_id = $_GET['user_id'];
    $product_name = $_GET['product_name'];
    $unit_price = $_GET['unit_price'];

    $category = ["coffee", "donut", "bundles"];
    $global_product_id = null;
    $global_table = null;
    for ($i = 0; $i < count($category); $i++) {
        $table = $category[$i];
        $product = $category[$i] . "_name";
        $product_id = $category[$i] . "_id";

        if ($table == "bundles") {
            $product = "bundle_name";
            $product_id = "bundle_id";
        }

        $category_query = "SELECT $product_id FROM $table WHERE $product = '$product_name' LIMIT 1;";
        $category_query_run = mysqli_query($conn, $category_query);
        $category_row = mysqli_fetch_assoc($category_query_run);

        if ($category_row != null) {
            $global_product_id = $category_row[$product_id];
            $global_table = $table;
            break;
        }
    }

    $coffee_size_id = null;
    if ($global_table == "coffee") {
        $coffee_size_query = "SELECT coffee_size_id FROM coffee_price WHERE coffee_price = $unit_price AND coffee_id = $global_product_id LIMIT 1;";
        $coffee_size_query_run = mysqli_query($conn, $coffee_size_query);
        $coffee_size_row = mysqli_fetch_assoc($coffee_size_query_run);
        $coffee_size_id = $coffee_size_row["coffee_size_id"];

        $delete_query = "DELETE FROM cart WHERE user_id = $user_id AND coffee_id = $global_product_id AND coffee_size_id = $coffee_size_id;";
        $delete_query_run = mysqli_query($conn, $delete_query);
    } else if ($global_table == "donut") {
        $delete_query = "DELETE FROM cart WHERE user_id = $user_id AND donut_id = $global_product_id;";
        $delete_query_run = mysqli_query($conn, $delete_query);
    } else if ($global_table == "bundles") {
        $delete_query = "DELETE FROM cart WHERE user_id = $user_id AND bundle_id = $global_product_id;";
        $delete_query_run = mysqli_query($conn, $delete_query);
    }

    echo json_encode(['product_id' => $global_product_id]);

}
?>