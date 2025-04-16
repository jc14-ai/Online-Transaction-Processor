<?php
session_start();
include("dbcon.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_token_query = "SELECT verified,token FROM user WHERE token = '$token';";
    $verify_token_query_run = mysqli_query($conn, $verify_token_query);

    if (mysqli_num_rows($verify_token_query_run) > 0) {
        $row = mysqli_fetch_array($verify_token_query_run);
        if ($row['verified'] === 'no') {
            $clicked_token = $row['token'];
            $update_query = "UPDATE user SET verified = 'yes' WHERE token = '$clicked_token' LIMIT 1;";
            $update_query_run = mysqli_query($conn, $update_query);

            if ($update_query_run) {
                $_SESSION['sign-up-status'] = 'Your Account has been verified Successfully.';
            } else {
                $_SESSION['sign-up-status'] = "Verification Failed.";
            }
        } else {
            $_SESSION['sign-up-status'] = 'Your Account is already verified. Please login.';
        }
    } else {
        $_SESSION['sign-up-status'] = "Token not found.";
    }
    header('Location: /site/php/index/body.php');
    exit(0);
} else {
    $_SESSION['sign-up-status'] = 'Not Allowed.';
    header('Location: /site/php/index/body.php');
}
?>