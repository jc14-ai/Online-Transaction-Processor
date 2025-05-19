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
            <?php echo ' ' . strtoupper($_SESSION['user']) . "!" ?>
          </strong>
        </h1>
      </div>
      <div class="overview-board">
        <div class="overviewboard-container">
          <div class="title-tab">SALES OVERVIEW</div>
          <div class="sales-overview">
            <div class="sales-today-display">
              <h4 class="today-label">TODAY</h4>
              <h4 class="today-sales-label"><?php
              $sales_today_query = "SELECT 
              SUM(t.total_price) AS total_sales_today
              FROM (SELECT 
              coffee.coffee_name AS product_name, 
              coffee_price.coffee_price AS unit_price, 
              order_details.quantity AS quantity, 
              coffee_price.coffee_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
              LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id 
              WHERE 
              coffee_price.coffee_size_id = order_details.coffee_size_id 
              AND coffee_price.coffee_id = order_details.coffee_id 
              AND orders.order_status = 'completed'
              AND orders.order_date = CURDATE()
              UNION ALL
              SELECT 
              donut.donut_name AS product_name, 
              donut.donut_price AS unit_price, 
              order_details.quantity, 
              donut.donut_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
              WHERE 
              order_details.donut_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND orders.order_date = CURDATE()
              UNION ALL
              SELECT 
              bundles.bundle_name AS product_name, 
              bundles.bundle_price AS unit_price, 
              order_details.quantity, 
              bundles.bundle_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id WHERE 
              order_details.bundle_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND orders.order_date = CURDATE()) AS t;";

              $sales_today_query_run = mysqli_query($conn, $sales_today_query);

              $sales_today_row = mysqli_fetch_assoc($sales_today_query_run);
              $sales_today = $sales_today_row['total_sales_today'];

              echo $sales_today;
              ?></h4>
            </div>
            <div class="sales-week-display">
              <h4 class="week-label">WEEK</h4>
              <h4 class="week-sales-label"><?php
              $sales_week_query = "SELECT 
              SUM(t.total_price) AS total_sales_week
              FROM (SELECT 
              coffee.coffee_name AS product_name, 
              coffee_price.coffee_price AS unit_price, 
              order_details.quantity AS quantity, 
              coffee_price.coffee_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
              LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id 
              WHERE 
              coffee_price.coffee_size_id = order_details.coffee_size_id 
              AND coffee_price.coffee_id = order_details.coffee_id 
              AND orders.order_status = 'completed'
              AND orders.order_date BETWEEN CURDATE() - INTERVAL 6 DAY AND CURDATE()
              UNION ALL
              SELECT 
              donut.donut_name AS product_name, 
              donut.donut_price AS unit_price, 
              order_details.quantity, 
              donut.donut_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
              WHERE 
              order_details.donut_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND orders.order_date BETWEEN CURDATE() - INTERVAL 6 DAY AND CURDATE()
              UNION ALL
              SELECT 
              bundles.bundle_name AS product_name, 
              bundles.bundle_price AS unit_price, 
              order_details.quantity, 
              bundles.bundle_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id WHERE 
              order_details.bundle_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND orders.order_date BETWEEN CURDATE() - INTERVAL 6 DAY AND CURDATE()) AS t;";

              $sales_week_query_run = mysqli_query($conn, $sales_week_query);

              $sales_week_row = mysqli_fetch_assoc($sales_week_query_run);
              $sales_week = $sales_week_row['total_sales_week'];

              echo $sales_week;
              ?></h4>
            </div>
            <div class="sales-month-display">
              <h4 class="month-label">MONTH</h4>
              <h4 class="month-sales-label"><?php
              $sales_month_query = "SELECT 
              SUM(t.total_price) AS total_sales_month
              FROM (SELECT 
              coffee.coffee_name AS product_name, 
              coffee_price.coffee_price AS unit_price, 
              order_details.quantity AS quantity, 
              coffee_price.coffee_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
              LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id 
              WHERE 
              coffee_price.coffee_size_id = order_details.coffee_size_id 
              AND coffee_price.coffee_id = order_details.coffee_id 
              AND orders.order_status = 'completed'
              AND YEAR(orders.order_date) = YEAR(CURDATE()) 
              AND MONTH(orders.order_date) = MONTH(CURDATE())
              UNION ALL
              SELECT 
              donut.donut_name AS product_name, 
              donut.donut_price AS unit_price, 
              order_details.quantity, 
              donut.donut_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
              WHERE 
              order_details.donut_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND YEAR(orders.order_date) = YEAR(CURDATE()) 
              AND MONTH(orders.order_date) = MONTH(CURDATE())
              UNION ALL
              SELECT 
              bundles.bundle_name AS product_name, 
              bundles.bundle_price AS unit_price, 
              order_details.quantity, 
              bundles.bundle_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id WHERE 
              order_details.bundle_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND YEAR(orders.order_date) = YEAR(CURDATE()) 
              AND MONTH(orders.order_date) = MONTH(CURDATE())) AS t;";

              $sales_month_query_run = mysqli_query($conn, $sales_month_query);

              $sales_month_row = mysqli_fetch_assoc($sales_month_query_run);
              $sales_month = $sales_month_row['total_sales_month'];

              echo $sales_month;
              ?></h4>
            </div>
            <div class="sales-year-display">
              <h4 class="year-label">YEAR</h4>
              <h4 class="year-sales-label"><?php
              $sales_year_query = "SELECT 
              SUM(t.total_price) AS total_sales_year
              FROM (SELECT 
              coffee.coffee_name AS product_name, 
              coffee_price.coffee_price AS unit_price, 
              order_details.quantity AS quantity, 
              coffee_price.coffee_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
              LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id 
              WHERE 
              coffee_price.coffee_size_id = order_details.coffee_size_id 
              AND coffee_price.coffee_id = order_details.coffee_id 
              AND orders.order_status = 'completed'
              AND YEAR(orders.order_date) = YEAR(CURDATE()) 
              UNION ALL
              SELECT 
              donut.donut_name AS product_name, 
              donut.donut_price AS unit_price, 
              order_details.quantity, 
              donut.donut_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
              WHERE 
              order_details.donut_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND YEAR(orders.order_date) = YEAR(CURDATE()) 
              UNION ALL
              SELECT 
              bundles.bundle_name AS product_name, 
              bundles.bundle_price AS unit_price, 
              order_details.quantity, 
              bundles.bundle_price * order_details.quantity AS total_price 
              FROM 
              order_details 
              LEFT JOIN orders ON orders.order_id = order_details.order_id
              LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id WHERE 
              order_details.bundle_id IS NOT NULL 
              AND orders.order_status = 'completed'
              AND YEAR(orders.order_date) = YEAR(CURDATE())) AS t;";

              $sales_year_query_run = mysqli_query($conn, $sales_year_query);

              $sales_year_row = mysqli_fetch_assoc($sales_year_query_run);
              $sales_year = $sales_year_row['total_sales_year'];

              echo $sales_year;
              ?></h4>
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