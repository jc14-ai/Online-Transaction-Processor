<?php
session_start();
include("../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com">
</head>

<body>
  <div class="admin-container">
    <div class="top-width">
      <!-- <img class="logo" src="logo.png"> -->
      <h1 class="dashboard-name"> ADMIN</h1>
      <div class="top-right-container">
        <!-- <button class="switch-mode" onclick="switchToUser()">Switch to user</button> -->
        <img class="profile" src="/src/avatar.png" onclick="showLogout()">
        <button class="logout-button" id="logout-button" onclick="logout()">Logout</button>
      </div>
    </div>
    <div class="flex-container">
      <div class="navbar">
        <div class="dashboard-item">
          <a href="/admin/boards/dashboard.php" target="main" class="nav-button" id="nav-button-dashboard">
            <img src="/src/window-orange.png" class="icon" id="icon-dashboard">
            Dashboard
          </a>
        </div>
        <div class="dashboard-item">
          <a href="#" class="nav-button product-link" id="nav-button-product">
            <img src="/src/product-orange.png" class="icon" alt="Product Icon" id="icon-product">
            Product
          </a>
          <ul class="dropdown-product" id="dropdownMenu">
            <li class="productnga">
              <a href="/admin/boards/kofai.php" target="main" class="nav-button">Kofai</a>
            </li>
            <li class="productnga">
              <a href="/admin/boards/donut.php" target="main" class="nav-button">Donut</a>
            </li>
            <li class="productnga">
              <a href="/admin/boards/bundle.php" target="main" class="nav-button">Bundle</a>
            </li>
          </ul>
        </div>
        <div class="dashboard-item">
          <a href="/admin/boards/orders.php" target="main" class="nav-button" id="nav-button-order">
            <img src="/src/order-orange.png" class="icon" alt="Orders Icon" id="icon-order">
            Orders
          </a>
        </div>
        <div class="dashboard-item">
          <a href="/admin/boards/notification.php" target="main" class="nav-button" id="nav-button-notif">
            <img src="/src/notif-orange.png" class="icon" alt="Notification Icon" id="icon-notif">
            Notification
          </a>
        </div>
      </div>
      <div class="main-panel">
        <iframe src="/admin/boards/dashboard.php" class="main" name="main"></iframe>
      </div>
    </div>
  </div>
  <script src="admin.js"></script>
</body>

</html>