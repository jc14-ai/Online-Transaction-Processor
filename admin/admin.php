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
  <script>
    let isLogoutShowing = false;
    function showLogout() {
      if (isLogoutShowing) {
        document.getElementById("logout-button").style.display = 'none';
      } else if (!isLogoutShowing) {
        document.getElementById("logout-button").style.display = 'block';
      }
      isLogoutShowing = !isLogoutShowing;
    }

    function logout() {
      fetch("logout_admin.php?logout=1")
        .then(() => {
          window.location.href = "../site/php/index/body.php";
        });
    }

    document.getElementById("nav-button-dashboard").addEventListener("mouseover", () => {
      document.getElementById("icon-dashboard").src = "/src/window-white.png";
    });
    document.getElementById("nav-button-dashboard").addEventListener("mouseout", () => {
      document.getElementById("icon-dashboard").src = "/src/window-orange.png";
    });

    document.getElementById("nav-button-product").addEventListener("mouseover", () => {
      document.getElementById("icon-product").src = "/src/product-white.png";
    });
    document.getElementById("nav-button-product").addEventListener("mouseout", () => {
      document.getElementById("icon-product").src = "/src/product-orange.png";
    });

    document.getElementById("nav-button-order").addEventListener("mouseover", () => {
      document.getElementById("icon-order").src = "/src/order-white.png";
    });
    document.getElementById("nav-button-order").addEventListener("mouseout", () => {
      document.getElementById("icon-order").src = "/src/order-orange.png";
    });

    document.getElementById("nav-button-notif").addEventListener("mouseover", () => {
      document.getElementById("icon-notif").src = "/src/notif-white.png";
    });
    document.getElementById("nav-button-notif").addEventListener("mouseout", () => {
      document.getElementById("icon-notif").src = "/src/notif-orange.png";
    });
  </script>
  <!-- <script src="admin.js"></script> -->
</body>

</html>