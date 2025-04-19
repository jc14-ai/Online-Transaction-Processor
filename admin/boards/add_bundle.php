<?php
session_start();
include("../../site/backend/dbcon.php");

function isValid($bundle_name, $bundle_price, $bundle_status)
{
    if (!preg_match('/^[a-zA-Z ]+$/', $bundle_name) || !is_numeric($bundle_price) || $bundle_name === "" || $bundle_price === "") {
        return false;
    }
    return true;
}

$bundle_name = trim($_POST['bundle_name']);
$bundle_price = trim($_POST['bundle_price']);
$bundle_status = $_POST['bundle_status'];
// $bundle_size = $_POST['bundle_size'];

if (isset($_POST['add-bundle-button-floating']) && isValid($bundle_name, $bundle_price, $bundle_status)) {

    $bundle_name_exist_query = "SELECT bundle_name FROM bundles WHERE bundle_name = '$bundle_name';";
    $bundle_name_exist_query_run = mysqli_query($conn, $bundle_name_exist_query);

    if (mysqli_num_rows($bundle_name_exist_query_run) === 0) {
        $bundle_name_insert_query = "INSERT INTO bundles(bundle_name, bundle_price, status) VALUES ('$bundle_name', $bundle_price, '$bundle_status');";
        $bundle_name_insert_query_run = mysqli_query($conn, $bundle_name_insert_query);
        header("location: /admin/boards/bundle.php");
        exit;
    }

    $_SESSION['validity'] = "Bundle Already Exists.";
    header("location: /admin/boards/bundle.php");
    exit;


    // $coffee_id_get_query = "SELECT coffee_id FROM coffee WHERE coffee_name = '$kofai_name'";
    // $coffee_id_get_query_run = mysqli_query($conn, $coffee_id_get_query);

    // if (mysqli_num_rows($coffee_id_get_query_run) > 0) {
    //     $coffee_id_row = mysqli_fetch_assoc($coffee_id_get_query_run);

    //     $coffee_size_insert_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
    //     $coffee_size_insert_query_run = mysqli_query($conn, $coffee_size_insert_query);

    //     if (mysqli_num_rows($coffee_size_insert_query_run) > 0) {
    //         $size_id_row = mysqli_fetch_assoc($coffee_size_insert_query_run);

    //         $coffee_exist_query = "SELECT coffee_id, coffee_size_id FROM coffee_price WHERE coffee_id = " . $coffee_id_row['coffee_id'] . " AND coffee_size_id = " . $size_id_row['coffee_size_id'] . ";";
    //         $coffee_exist_query_run = mysqli_query($conn, $coffee_exist_query);

    //         if (mysqli_num_rows($coffee_exist_query_run) > 0) {
    //             $_SESSION['validity'] = "Kofai Already Exists.";
    //             header("location: /admin/boards/kofai.php");
    //             exit;
    //         } else {
    //             $insert_query = "INSERT INTO coffee_price VALUES (" . $coffee_id_row['coffee_id'] . "," . $size_id_row['coffee_size_id'] . ", $kofai_price, '$kofai_status');";
    //             $insert_query_run = mysqli_query($conn, $insert_query);
    //         }
    //     }
    // }
    // header("location: /admin/boards/kofai.php");
    //exit;
} else {
    $_SESSION['validity'] = "Invalid Input.";
    header("location: /admin/boards/bundle.php");
    exit;
}
?>