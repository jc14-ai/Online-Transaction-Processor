<?php
session_start();
include("../backend/dbcon.php");

if (isset($_GET['show'])) {
    $bundle_query = "SELECT bundle_name, bundle_price, image FROM bundles WHERE status = 'active';";
    $bundle_query_run = mysqli_query($conn, $bundle_query);

    $bundles = [];
    while ($bundle_row = mysqli_fetch_assoc($bundle_query_run)) {
        $bundles[] = $bundle_row;
    }

    header('Content-Type: application/json');
    echo json_encode($bundles);
}
?>