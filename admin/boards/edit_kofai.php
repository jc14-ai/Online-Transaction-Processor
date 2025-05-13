<?php
session_start();
include("../../site/backend/dbcon.php");

function isValid($kofai_name, $kofai_price, $kofai_status, $kofai_size)
{
    if (!preg_match('/^[a-zA-Z ]+$/', $kofai_name) || !is_numeric($kofai_price) || $kofai_name === "" || $kofai_price === "") {
        return false;
    }
    return true;
}

$kofai_name = trim($_POST['kofai_name']);
$kofai_price = trim($_POST['kofai_price']);
$kofai_status = $_POST['kofai_status'];
$kofai_size = $_POST['kofai_size'];
$old_kofai_id = $_POST['old-coffee-id'];
$old_kofai_size_id = $_POST['old-coffee-size-id'];
// echo $kofai_name;
// echo $kofai_price;
// echo $kofai_status;
// echo $kofai_size;
// echo $old_kofai_id;
// echo $old_kofai_size_id;
// exit;

if (isset($_POST['save-kofai-button']) && isValid($kofai_name, $kofai_price, $kofai_status, $kofai_size)) {
    $coffee_id_query = "SELECT coffee_id FROM coffee WHERE coffee_name = '$kofai_name'";
    $coffee_id_query_run = mysqli_query($conn, $coffee_id_query);

    if (mysqli_num_rows($coffee_id_query_run) == 0) {
        $coffee_insert_query = "INSERT INTO coffee(coffee_name) VALUES ('$kofai_name');";
        $coffee_insert_query_run = mysqli_query($conn, $coffee_insert_query);

        $coffee_id_query = "SELECT coffee_id FROM coffee WHERE coffee_name = '$kofai_name'";
        $coffee_id_query_run = mysqli_query($conn, $coffee_id_query);
    }

    $coffee_id = mysqli_fetch_assoc($coffee_id_query_run);

    $coffee_size_id_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
    $coffee_size_id_query_run = mysqli_query($conn, $coffee_size_id_query);

    $coffee_size_id = mysqli_fetch_assoc($coffee_size_id_query_run);

    $query = "SELECT coffee_id, coffee_size_id FROM coffee_price WHERE coffee_id = " . $coffee_id['coffee_id'] . " AND coffee_size_id = " . $coffee_size_id['coffee_size_id'] . " AND NOT (coffee_id = $old_kofai_id AND coffee_size_id = $old_kofai_size_id);";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $_SESSION['validity'] = "Kofai Already Exists.";
        header("location: /admin/boards/kofai.php");
        exit;
    }
    // echo $coffee_id['coffee_id'];
    // echo $kofai_price;
    // echo $kofai_status;
    // echo $coffee_size_id['coffee_size_id'];
    // echo $old_kofai_id;
    // echo $old_kofai_size_id;
    // exit;
    $update_query = "UPDATE coffee_price SET coffee_id = " . $coffee_id['coffee_id'] . ", coffee_size_id = " . $coffee_size_id['coffee_size_id'] . ", coffee_price = $kofai_price, status = '$kofai_status' WHERE coffee_id = $old_kofai_id AND coffee_size_id = $old_kofai_size_id;";
    $update_query_run = mysqli_query($conn, $update_query);
    header("location: /admin/boards/kofai.php");
    exit;
} else {
    $_SESSION['validity'] = "Invalid Input.";
    header("location: /admin/boards/kofai.php");
    exit;
}

?>