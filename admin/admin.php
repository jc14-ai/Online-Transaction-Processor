<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("location: /site/php/index/body.php");
  exit;
}
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
      <h1 class="dashboard-name">DASHBOARD</h1>
      <div class="top-right-container">
        <button class="switch-mode">switch to user</button>
        <img class="profile" src="/src/profile.png" />
      </div>
    </div>
    <div class="flex-container">
      <div class="navbar">
        <a href="/admin/boards/dashboard.html" target="main">Dashboard</a>
        <a href="/admin/boards/kofai.html" target="main">Kofai</a>
        <a href="/admin/boards/donut.html" target="main">Donut</a>
        <a href="/admin/boards/bundle.html" target="main">Bundle</a>
        <a href="/admin/boards/orders.html" target="main">Orders</a>
        <a href="/admin/boards/notification.html" target="main">Notification</a>
      </div>
      <div class="main-panel">
        <iframe class="main" name="main"></iframe>
      </div>
    </div>
  </div>
  <script src="admin.js"></script>
</body>

</html>