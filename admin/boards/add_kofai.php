<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_POST['add-kofai-button-floating'])) {
    $kofai_name = $_POST['kofai_name'];
    $kofai_price = $_POST['kofai_price'];
    $kofai_status = $_POST['kofai_status'];
    $kofai_size = $_POST['kofai_size'];

    $coffee_name_insert_query = "INSERT INTO coffee(coffee_name) VALUES ('$kofai_name');";
    $coffee_name_insert_query_run = mysqli_query($conn, $coffee_name_insert_query);
    $coffee_id_get_query = "SELECT coffee_id FROM coffee WHERE coffee_name = '$kofai_name'";
    $coffee_id_get_query_run = mysqli_query($conn, $coffee_id_get_query);

    if (mysqli_num_rows($coffee_id_get_query_run) > 0) {
        $coffee_id_row = mysqli_fetch_assoc($coffee_id_get_query_run);

        $coffee_size_insert_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
        $coffee_size_insert_query_run = mysqli_query($conn, $coffee_size_insert_query);

        if (mysqli_num_rows($coffee_size_insert_query_run) > 0) {
            $size_id_row = mysqli_fetch_assoc($coffee_size_insert_query_run);

            $insert_query = "INSERT INTO coffee_price VALUES (" . $coffee_id_row['coffee_id'] . "," . $size_id_row['coffee_size_id'] . ", $kofai_price, '$kofai_status');";
            $insert_query_run = mysqli_query($conn, $insert_query);

            if ($insert_query_run) {

            }
        } else {
            $_SESSION[''] = "";

        }
    } else {
        $_SESSION[''] = "";
    }
    header("location: /admin/boards/kofai.php");
    exit;
}
?>