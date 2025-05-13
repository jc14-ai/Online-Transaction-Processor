<?php
session_start();
include("../../site/backend/dbcon.php");

function isValid($donut_name, $donut_price, $donut_status)
{
    if (!preg_match('/^[a-zA-Z ]+$/', $donut_name) || !is_numeric($donut_price) || $donut_name === "" || $donut_price === "") {
        return false;
    }
    return true;
}

$donut_name = trim($_POST['donut_name']);
$donut_price = trim($_POST['donut_price']);
$donut_status = $_POST['donut_status'];
// $donut_size = $_POST['donut_size'];

if (isset($_POST['add-donut-button-floating']) && isValid($donut_name, $donut_price, $donut_status)) {

    $donut_name_exist_query = "SELECT donut_name FROM donut WHERE donut_name = '$donut_name';";
    $donut_name_exist_query_run = mysqli_query($conn, $donut_name_exist_query);

    if (mysqli_num_rows($donut_name_exist_query_run) === 0) {
        $donut_name_insert_query = "INSERT INTO donut(donut_name, donut_price, status) VALUES ('$donut_name', $donut_price, '$donut_status');";
        $donut_name_insert_query_run = mysqli_query($conn, $donut_name_insert_query);
        header("location: /admin/boards/donut.php");
        exit;
    }

    $_SESSION['validity'] = "Donut Already Exists.";
    header("location: /admin/boards/donut.php");
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
    header("location: /admin/boards/donut.php");
    exit;
}
?>