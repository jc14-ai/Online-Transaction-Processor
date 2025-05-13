<?php
session_start();
include("../backend/dbcon.php");

if (isset($_GET['show'])) {
    $donut_query = "SELECT donut_name, donut_price FROM donut WHERE status = 'active';";
    $donut_query_run = mysqli_query($conn, $donut_query);

    $donuts = [];
    while ($donut_row = mysqli_fetch_assoc($donut_query_run)) {
        $donuts[] = $donut_row;
    }

    header('Content-Type: application/json');
    echo json_encode($donuts);
}
?>