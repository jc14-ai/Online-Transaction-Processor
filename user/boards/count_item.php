<?php
session_start();
header('Content-Type: application/json');
include("../../site/backend/dbcon.php");

if (isset($_GET['user_id']) && isset($_GET['product_name']) && isset($_GET['unit_price']) && isset($_GET['quantity']) && isset($_GET['total_price']) && isset($_GET['operator'])) {
    $user_id = $_GET['user_id'];
    $product_name = $_GET['product_name'];
    $unit_price = $_GET['unit_price'];
    $quantity = $_GET['quantity'];
    $total_price = $_GET['total_price'];
    $operator = $_GET['operator'];

    $category = ["coffee", "donut", "bundles"];
    $global_product_id = null;
    $global_table = null;
    $global_quantity = 0;
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

    $sign = "";
    if ($operator == "minus") {
        $sign = "-";
    } else if ($operator == "add") {
        $sign = "+";
    }

    $coffee_size_id = null;
    if ($global_table == "coffee") {
        $coffee_size_query = "SELECT coffee_size_id FROM coffee_price WHERE coffee_price = $unit_price AND coffee_id = $global_product_id LIMIT 1;";
        $coffee_size_query_run = mysqli_query($conn, $coffee_size_query);
        $coffee_size_row = mysqli_fetch_assoc($coffee_size_query_run);
        $coffee_size_id = $coffee_size_row["coffee_size_id"];

        $update_query = "UPDATE cart SET quantity = quantity $sign 1 WHERE user_id = $user_id AND coffee_id = $global_product_id AND coffee_size_id = $coffee_size_id;";
        $update_query_run = mysqli_query($conn, $update_query);

        $display_query = "SELECT quantity FROM cart WHERE user_id = $user_id AND coffee_id = $global_product_id AND coffee_size_id = $coffee_size_id LIMIT 1";
        $display_query_run = mysqli_query($conn, $display_query);
        $display_row = mysqli_fetch_assoc($display_query_run);
        $global_quantity = $display_row["quantity"];
    } else if ($global_table == "donut") {
        $update_query = "UPDATE cart SET quantity = quantity $sign 1 WHERE user_id = $user_id AND donut_id = $global_product_id";
        $update_query_run = mysqli_query($conn, $update_query);

        $display_query = "SELECT quantity FROM cart WHERE user_id = $user_id AND donut_id = $global_product_id LIMIT 1";
        $display_query_run = mysqli_query($conn, $display_query);
        $display_row = mysqli_fetch_assoc($display_query_run);
        $global_quantity = $display_row["quantity"];
    } else if ($global_table == "bundles") {
        $update_query = "UPDATE cart SET quantity = quantity $sign 1 WHERE user_id = $user_id AND bundle_id = $global_product_id;";
        $update_query_run = mysqli_query($conn, $update_query);

        $display_query = "SELECT quantity FROM cart WHERE user_id = $user_id AND bundle_id = $global_product_id LIMIT 1";
        $display_query_run = mysqli_query($conn, $display_query);
        $display_row = mysqli_fetch_assoc($display_query_run);
        $global_quantity = $display_row["quantity"];
    }

    echo json_encode($global_quantity);
}
?>