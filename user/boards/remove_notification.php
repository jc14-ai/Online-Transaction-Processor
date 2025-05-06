<?php
session_start();
include("../../site/backend/dbcon.php");

if (isset($_GET['notification_id']) && isset($_GET['user_id'])) {
    $notification_id = $_GET['notification_id'];
    $user_id = $_GET['user_id'];

    $remove_query = "DELETE FROM notification WHERE user_id = $user_id AND notification_id = $notification_id;";
    $remove_query_run = mysqli_query($conn, $remove_query);

    $isSuccessful = true;
    echo json_encode(['successful' => $isSuccessful]);
}
?>