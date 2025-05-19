<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Purchases</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="purchases-container">
    <div class="top-board-wrapper">
      <div class="my-profile-label">
        <h3>MY PROFILE</h3>
      </div>
      <div class="name-board">
        <h1 class="acc-greetings-label">HELLO,<?php echo ' ' . strtoupper(($_SESSION['user'])) . "!"; ?></h1>
      </div>

      <div class="display-orders-container">
        <div class="completed-orders">
          <h1 class="completed-order-label">COMPLETED ORDERS</h1>
          <div class="purchase-table-wrapper">
            <table class="purchase-table">
              <thead class="my-purchase-theader">
                <th class="purchase-head">PRODUCT</th>
                <th class="purchase-head">QUANTITY</th>
                <th class="purchase-head">PRICE</th>
                <th class="purchase-head">TOTAL</th>
              </thead>
              <tbody>
                <?php
                $user_name = $_SESSION['user'];
                $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
                $user_id_query_run = mysqli_query($conn, $user_id_query);
                $user_id_row = mysqli_fetch_assoc($user_id_query_run);
                $user_id = $user_id_row['user_id'];

                $order_id_query = "SELECT order_id FROM orders WHERE user_id = $user_id;";
                $order_id_query_run = mysqli_query($conn, $order_id_query);
                while ($my_order_id_row = mysqli_fetch_assoc($order_id_query_run)) {
                  $order_id = $my_order_id_row["order_id"];

                  $completed_orders_query = "SELECT * FROM (
                    SELECT order_details.order_id, coffee.coffee_name AS product_name, 
                    coffee_price.coffee_price AS unit_price, order_details.quantity AS quantity, 
                    coffee_price.coffee_price * order_details.quantity AS total_price
                    FROM order_details 
                    LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
                    LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id 
                    WHERE coffee_price.coffee_size_id = order_details.coffee_size_id 
                    AND coffee_price.coffee_id = order_details.coffee_id 
                    AND order_details.order_id = $order_id
                    UNION ALL
                    SELECT 
                    order_details.order_id, donut.donut_name AS product_name, 
                    donut.donut_price AS unit_price, order_details.quantity, 
                    donut.donut_price * order_details.quantity AS total_price 
                    FROM order_details 
                    LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
                    WHERE order_details.donut_id IS NOT NULL AND order_details.order_id = $order_id
                    UNION ALL
                    SELECT order_details.order_id, bundles.bundle_name AS product_name, 
                    bundles.bundle_price AS unit_price, 
                    order_details.quantity, 
                    bundles.bundle_price * order_details.quantity AS total_price 
                    FROM order_details 
                    LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id 
                    WHERE order_details.bundle_id IS NOT NULL 
                    AND order_details.order_id = $order_id) AS my_order 
                    LEFT JOIN orders ON my_order.order_id = orders.order_id 
                    WHERE orders.order_id = $order_id AND orders.order_status = 'completed';";
                  $completed_orders_query_run = mysqli_query($conn, $completed_orders_query);
                  while ($completed_orders_row = mysqli_fetch_assoc($completed_orders_query_run)) {

                    $product_name = $completed_orders_row['product_name'];
                    $quantity = $completed_orders_row['quantity'];
                    $price = $completed_orders_row['unit_price'];
                    $total_price = $completed_orders_row['total_price'];

                    echo "<tr>
                            <td>$product_name</td>
                            <td>$quantity</td>
                            <td>P$price</td>
                            <td>P$total_price</td>
                          </tr>";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="pending-orders">
          <h1 class="pending-order-label">PENDING ORDERS</h1>
          <div class="purchase-table-wrapper">
            <table class="purchase-table">
              <thead class="my-purchase-theader">
                <th class="purchase-head">PRODUCT</th>
                <th class="purchase-head">QUANTITY</th>
                <th class="purchase-head">PRICE</th>
                <th class="purchase-head">TOTAL</th>
              </thead>
              <tbody>
                <?php
                $user_name = $_SESSION['user'];
                $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
                $user_id_query_run = mysqli_query($conn, $user_id_query);
                $user_id_row = mysqli_fetch_assoc($user_id_query_run);
                $user_id = $user_id_row['user_id'];

                $order_id_query = "SELECT order_id FROM orders WHERE user_id = $user_id;";
                $order_id_query_run = mysqli_query($conn, $order_id_query);
                while ($my_order_id_row = mysqli_fetch_assoc($order_id_query_run)) {
                  $order_id = $my_order_id_row["order_id"];

                  $completed_orders_query = "SELECT * FROM (
                    SELECT order_details.order_id, coffee.coffee_name AS product_name, 
                    coffee_price.coffee_price AS unit_price, order_details.quantity AS quantity, 
                    coffee_price.coffee_price * order_details.quantity AS total_price
                    FROM order_details 
                    LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
                    LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id 
                    WHERE coffee_price.coffee_size_id = order_details.coffee_size_id 
                    AND coffee_price.coffee_id = order_details.coffee_id 
                    AND order_details.order_id = $order_id
                    UNION ALL
                    SELECT 
                    order_details.order_id, donut.donut_name AS product_name, 
                    donut.donut_price AS unit_price, order_details.quantity, 
                    donut.donut_price * order_details.quantity AS total_price 
                    FROM order_details 
                    LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
                    WHERE order_details.donut_id IS NOT NULL AND order_details.order_id = $order_id
                    UNION ALL
                    SELECT order_details.order_id, bundles.bundle_name AS product_name, 
                    bundles.bundle_price AS unit_price, 
                    order_details.quantity, 
                    bundles.bundle_price * order_details.quantity AS total_price 
                    FROM order_details 
                    LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id 
                    WHERE order_details.bundle_id IS NOT NULL 
                    AND order_details.order_id = $order_id) AS my_order 
                    LEFT JOIN orders ON my_order.order_id = orders.order_id 
                    WHERE orders.order_id = $order_id AND orders.order_status = 'pending';";
                  $completed_orders_query_run = mysqli_query($conn, $completed_orders_query);
                  while ($completed_orders_row = mysqli_fetch_assoc($completed_orders_query_run)) {
                    $product_name = $completed_orders_row['product_name'];
                    $quantity = $completed_orders_row['quantity'];
                    $price = $completed_orders_row['unit_price'];
                    $total_price = $completed_orders_row['total_price'];

                    echo "<tr>
                            <td>$product_name</td>
                            <td>$quantity</td>
                            <td>P$price</td>
                            <td>P$total_price</td>
                          </tr>";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</body>

</html>