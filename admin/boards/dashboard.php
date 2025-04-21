<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="/admin/admin.css" />
</head>

<body bgcolor="#3e3232">
  <div class="dashboard-container">
    <div class="top-board-wrapper">
      <div class="admin-tab">ADMIN</div>
      <div class="name-board">
        <h1 class="admin-name">
          HELLO,
          <strong>
            <?php echo ' ' . strtoupper($_SESSION['user']) ?>
          </strong>
        </h1>
      </div>
      <div class="overview-board">
        <div class="overviewboard-container">
          <div class="title-tab">SALES OVERVIEW</div>
          <div class="sales-overview">
            <div class="sales-today-display">
              <h4 class="today-label">TODAY</h4>
              <h4 class="today-sales-label">500</h4>
            </div>
            <div class="sales-week-display">
              <h4 class="week-label">WEEK</h4>
              <h4 class="week-sales-label">2,500</h4>
            </div>
            <div class="sales-month-display">
              <h4 class="month-label">MONTH</h4>
              <h4 class="month-sales-label">15,000</h4>
            </div>
            <div class="sales-year-display">
              <h4 class="year-label">YEAR</h4>
              <h4 class="year-sales-label">120,000</h4>
            </div>
          </div>
        </div>
        <div class="overviewboard-container">
          <div class="title-tab"> ORDER ANALYTICS</div>
          <div class="order-analytics">
            <div class="orders-completed-display">
              <h4 class="orders-completed-label">ORDERS COMPLETED</h4>
              <h4 class="num-of-orders-completed-label">
                <?php
                $orders_complete_query = "SELECT COUNT(*) AS 'orders_completed' FROM orders WHERE order_status = 'completed' LIMIT 1;";
                $orders_complete_query_run = mysqli_query($conn, $orders_complete_query);
                $complete_orders = mysqli_fetch_assoc($orders_complete_query_run);

                echo $complete_orders['orders_completed'];
                ?>
              </h4>
            </div>
            <div class="orders-pending-display">
              <h4 class="orders-pending-label">ORDERS PENDING</h4>
              <h4 class="num-of-orders-pending-label">
                <?php
                $orders_pending_query = "SELECT COUNT(*) AS 'orders_pending' FROM orders WHERE order_status = 'pending' LIMIT 1;";
                $orders_pending_query_run = mysqli_query($conn, $orders_pending_query);
                $pending_orders = mysqli_fetch_assoc($orders_pending_query_run);

                echo $pending_orders['orders_pending'];
                ?>
              </h4>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>