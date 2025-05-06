<?php
session_start();
include("../site/backend/dbcon.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_username = $_SESSION['user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $user_id_query = "SELECT user_id FROM user WHERE username = '$old_username'";
    $user_id_query_run = mysqli_query($conn, $user_id_query);
    $user_id_row = mysqli_fetch_assoc($user_id_query_run);
    $user_id = $user_id_row["user_id"];

    $imageName = "";
    if (isset($_FILES['image'])) {
        $imageName = basename($_FILES["image"]["name"]);
        $targetDir = "../src/";
        $targetFile = $targetDir . $imageName;

        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
    }

    $update_query = "UPDATE user SET username = '$username', email = '$email', contact = '$number'";
    if ($imageName) {
        $update_query .= ", image = '$imageName'";
    }
    $update_query .= " WHERE user_id = $user_id";

    mysqli_query($conn, $update_query);

    $_SESSION['user'] = $username;
}
?>