<?php
session_start();
include("../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User</title>
  <link rel="stylesheet" href="user.css" />
</head>

<body>
  <div class="top-bar-container">
    <img class="user-profile" src="<?php
    $user_name = $_SESSION['user'];

    $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name';";
    $user_id_query_run = mysqli_query($conn, $user_id_query);
    $user_id_row = mysqli_fetch_assoc($user_id_query_run);
    $user_id = $user_id_row['user_id'];

    $image_query = "SELECT image FROM user WHERE user_id = $user_id;";
    $image_query_run = mysqli_query($conn, $image_query);
    $image_row = mysqli_fetch_assoc($image_query_run);
    $image = $image_row['image'];

    echo "/src/$image";
    ?>" />
  </div>

  <div class="user-container">
    <div class="side-container">
      <div class="customer-container">
        <div class="customer-icon">
          <img class="account-name" src="<?php
          $user_name = $_SESSION['user'];

          $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name';";
          $user_id_query_run = mysqli_query($conn, $user_id_query);
          $user_id_row = mysqli_fetch_assoc($user_id_query_run);
          $user_id = $user_id_row['user_id'];

          $image_query = "SELECT image FROM user WHERE user_id = $user_id;";
          $image_query_run = mysqli_query($conn, $image_query);
          $image_row = mysqli_fetch_assoc($image_query_run);
          $image = $image_row['image'];

          echo "/src/$image";
          ?>" />
        </div>

        <div class="customer-details">
          <div class="name"><?php echo ' ' . $_SESSION['user']; ?></div>
          <div class="edit"> <img src="/src/edit-icon.png" /> EDIT PROFILE </div>
        </div>
      </div>

      <div class="customer-profile">

        <div class="dashboard-label">
          <a href="/user/boards/account.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/account-default.png" width="45px" height="45px">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; My Account</a>
        </div>

        <div class="dashboard-label">
          <a href="/user/boards/purchases.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/purchases-default.png">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; Purchases</a>
        </div>

        <div class="dashboard-label">
          <a href="/user/boards/donut.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/donut-default.png">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; Donut</a>
        </div>

        <div class="dashboard-label">
          <a href="/user/boards/kofai.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/coffee-default.png">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; Kofai</a>
        </div>

        <div class="dashboard-label">
          <a href="/user/boards/bundle.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/bundle-default.png">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; Bundle</a>
        </div>

        <div class="dashboard-label">
          <a href="/user/boards/cart.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/cart-default.png">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; Cart</a>
        </div>

        <div class="dashboard-label">
          <a href="/user/boards/notification.php" target="main" style="text-decoration: none; color: #3e3232;">
            <span class="icon-wrapper">
              <img class="dashboard-icon" src="/src/notification-default.png">
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp; Notifcations</a>
        </div>
      </div>
    </div>

    <div class="main-container">
      <iframe class="main" name="main" src="/user/boards/purchases.php"></iframe>
    </div>

  </div>
  </div>
</body>

</html>