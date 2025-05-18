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

if (isset($_POST['add-kofai-button-floating']) && isValid($kofai_name, $kofai_price, $kofai_status, $kofai_size)) {

    $coffee_name_exist_query = "SELECT coffee_name FROM coffee WHERE coffee_name = '$kofai_name';";
    $coffee_name_exist_query_run = mysqli_query($conn, $coffee_name_exist_query);

    $target_dir = "../../src/";
    $imageName = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $imageName;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    if (mysqli_num_rows($coffee_name_exist_query_run) == 0) {
        $coffee_name_insert_query = "INSERT INTO coffee(coffee_name, image) VALUES ('$kofai_name', '$imageName');";
        $coffee_name_insert_query_run = mysqli_query($conn, $coffee_name_insert_query);
    }

    $coffee_id_get_query = "SELECT coffee_id FROM coffee WHERE coffee_name = '$kofai_name'";
    $coffee_id_get_query_run = mysqli_query($conn, $coffee_id_get_query);

    if (mysqli_num_rows($coffee_id_get_query_run) > 0) {
        $coffee_id_row = mysqli_fetch_assoc($coffee_id_get_query_run);

        $coffee_size_insert_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
        $coffee_size_insert_query_run = mysqli_query($conn, $coffee_size_insert_query);

        if (mysqli_num_rows($coffee_size_insert_query_run) > 0) {
            $size_id_row = mysqli_fetch_assoc($coffee_size_insert_query_run);

            $coffee_exist_query = "SELECT coffee_id, coffee_size_id FROM coffee_price WHERE coffee_id = " . $coffee_id_row['coffee_id'] . " AND coffee_size_id = " . $size_id_row['coffee_size_id'] . ";";
            $coffee_exist_query_run = mysqli_query($conn, $coffee_exist_query);

            if (mysqli_num_rows($coffee_exist_query_run) > 0) {
                $_SESSION['validity'] = "Kofai Already Exists.";
                header("location: /admin/boards/kofai.php");
                exit;
            } else {
                $insert_query = "INSERT INTO coffee_price VALUES (" . $coffee_id_row['coffee_id'] . "," . $size_id_row['coffee_size_id'] . ", $kofai_price, '$kofai_status');";
                $insert_query_run = mysqli_query($conn, $insert_query);
            }
        }
    }
    header("location: /admin/boards/kofai.php");
    exit;
} else {
    $_SESSION['validity'] = "Invalid Input.";
    header("location: /admin/boards/kofai.php");
    exit;
}
?>