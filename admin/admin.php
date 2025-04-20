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
      <img class="logo" src="logo.png">
      <h1 class="dashboard-name"> ADMIN DASHBOARD</h1>
      <div class="top-right-container">
        <button class="switch-mode">Switch to user</button>
        <img class="profile" src="user icon.png">
      </div>
    </div>
    <div class="flex-container">
      <div class="navbar">
        <div class="dashboard-item">
          <a href="/admin/boards/dashboard.php" target="main" class="nav-button">
            <img src="/src/DASHBOARD-removebg-preview.png" class="icon">
            Dashboard
          </a>
        </div>
        <div class="dashboard-item">
          <a href="#" id="productToggle" class="nav-button product-link">
            <img src="/src/PRODUCT-removebg-preview.png" class="icon" alt="Product Icon">
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
          <a href="/admin/boards/orders.php" target="main" class="nav-button">
            <img src="/src/ORDER-removebg-preview.png" class="icon" alt="Orders Icon">
            Orders
          </a>
        </div>
        <div class="dashboard-item">
          <a href="/admin/boards/notification.php" target="main" class="nav-button">
            <img src="/src/NOTIF-removebg-preview.png" class="icon" alt="Notification Icon">
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