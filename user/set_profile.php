<?php
session_start();
include("../site/backend/dbcon.php");

if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['number']) && isset($_GET['image'])) {
    $old_username = $_SESSION['user'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $number = $_GET['number'];
    $image = $_GET['image'];

    $user_id_query = "SELECT user_id FROM user WHERE username = '$old_username';";
    $user_id_query_run = mysqli_query($conn, $user_id_query);
    $user_id_row = mysqli_fetch_assoc($user_id_query_run);
    $user_id = $user_id_row["user_id"];

    $update_query = "UPDATE user SET username = '$username', email = '$email', contact = '$number', image = '$image' WHERE user_id = $user_id";
    $update_query_run = mysqli_query($conn, $update_query);

    $_SESSION['user'] = $username;

    echo "";
}
?>