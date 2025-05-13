<?php
session_start();
include("dbcon.php");

if (isset($_POST['sign-in-button'])) {
    $username = $_POST['sign-in-username'];
    $email = $_POST['sign-in-email'];
    $password = $_POST['sign-in-password'];

    $check_username_query = "SELECT COUNT(*) AS usernames FROM user WHERE username = '$username';";
    $check_username_query_run = mysqli_query($conn, $check_username_query);
    $user_row = mysqli_fetch_assoc($check_username_query_run);
    if ($user_row['usernames'] == 0) {
        $_SESSION['sign-in-status'] = 'Login Failed.';
        header('Location: /site/php/index/body.php');
        exit;
    }

    $login_query = "SELECT username, email, password, verified FROM user WHERE username = '$username' AND email = '$email' AND password = '$password' LIMIT 1;";
    $login_query_run = mysqli_query($conn, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $row = mysqli_fetch_assoc($login_query_run);

        if ($row['verified'] === 'yes') {
            $role_query = "SELECT role from roles WHERE email = '$email' LIMIT 1;";
            $role_query_run = mysqli_query($conn, $role_query);

            if (mysqli_num_rows($role_query_run) > 0) {
                $role = mysqli_fetch_assoc($role_query_run);

                if ($role['role'] === 'user') {
                    //PUT THE CODE HERE IF ROLE IS USER
                    $_SESSION['user'] = $username;
                    header("location: /user/user.php");
                    exit(0);
                } else {
                    //PUT THE CODE HERE IF ROLE IS ADMIN
                    $_SESSION['user'] = $username;
                    header("location: /admin/admin.php");
                    exit(0);
                }
            }

        } else {
            //PUT THE CODE HERE IF USER IS NOT VERIFIED YET
            $_SESSION['sign-in-status'] = "Verify your email before logging in.";
            header("location: /site/php/index/body.php");
            exit(0);
        }
    } else {
        $_SESSION['sign-in-status'] = "Username or email doesnt exist.";
        header("location: /site/php/index/body.php");
        exit(0);
    }
}

?>