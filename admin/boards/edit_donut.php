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
$old_donut_id = $_POST['old-donut-id'];
// $old_donut_size_id = $_POST['old-donut-size-id'];

if (isset($_POST['save-donut-button']) && isValid($donut_name, $donut_price, $donut_status)) {
    $donut_exist_query = "SELECT * FROM donut WHERE donut_name = '$donut_name' AND NOT donut_id = $old_donut_id;";
    $donut_exist_query_run = mysqli_query($conn, $donut_exist_query);

    if (mysqli_num_rows($donut_exist_query_run) > 0) {
        $_SESSION['validity'] = "Donut Already Exists.";
        header("location: /admin/boards/donut.php");
        exit;
    }

    $target_dir = "../../src/";
    $imageName = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
    } else {
        $imageName = basename($_POST['DonutImageSrc']);
    }
    $target_file = $target_dir . $imageName;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $donut_update_query = "UPDATE donut SET donut_name = '$donut_name', donut_price = $donut_price, status = '$donut_status', image = '$imageName' WHERE donut_id = $old_donut_id;";
    $donut_update_query_run = mysqli_query($conn, $donut_update_query);
    header("location: /admin/boards/donut.php");
    exit;
    // $donut_id_query = "SELECT donut_id FROM donut WHERE donut_name = '$donut_name'";
    // $donut_id_query_run = mysqli_query($conn, $donut_id_query);

    // if (mysqli_num_rows($donut_id_query_run) == 0) {
    //     $donut_insert_query = "UPDATE donut SET ";
    //     $donut_insert_query = "INSERT INTO donut(donut_name, donut_price, status) VALUES ('$donut_name', $donut_price, '$donut_status');";
    //     $donut_insert_query_run = mysqli_query($conn, $donut_insert_query);

    //     $donut_id_query = "SELECT donut_id FROM donut WHERE donut_name = '$donut_name'";
    //     $donut_id_query_run = mysqli_query($conn, $donut_id_query);
    // }

    // $donut_id = mysqli_fetch_assoc($donut_id_query_run);

    // $coffee_size_id_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
    // $coffee_size_id_query_run = mysqli_query($conn, $coffee_size_id_query);

    // $coffee_size_id = mysqli_fetch_assoc($coffee_size_id_query_run);

    // $query = "SELECT coffee_id, coffee_size_id FROM coffee_price WHERE coffee_id = " . $coffee_id['coffee_id'] . " AND coffee_size_id = " . $coffee_size_id['coffee_size_id'] . " AND NOT (coffee_id = $old_kofai_id AND coffee_size_id = $old_kofai_size_id);";
    // $query_run = mysqli_query($conn, $query);

    // if (mysqli_num_rows($query_run) > 0) {
    //     $_SESSION['validity'] = "Donut Already Exists.";
    //     header("location: /admin/boards/donut.php");
    //     exit;
    // }
    // // echo $coffee_id['coffee_id'];
    // // echo $kofai_price;
    // // echo $kofai_status;
    // // echo $coffee_size_id['coffee_size_id'];
    // // echo $old_kofai_id;
    // // echo $old_kofai_size_id;
    // // exit;
    // $update_query = "UPDATE coffee_price SET coffee_id = " . $coffee_id['coffee_id'] . ", coffee_size_id = " . $coffee_size_id['coffee_size_id'] . ", coffee_price = $kofai_price, status = '$kofai_status' WHERE coffee_id = $old_kofai_id AND coffee_size_id = $old_kofai_size_id;";
    // $update_query_run = mysqli_query($conn, $update_query);
    // header("location: /admin/boards/donut.php");
    // exit;
} else {
    $_SESSION['validity'] = "Invalid Input.";
    header("location: /admin/boards/donut.php");
    exit;
}

?>