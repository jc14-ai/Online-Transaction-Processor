<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orders</title>
  <link rel="stylesheet" href="/admin/admin.css" />
</head>

<body>
  <!-- ORDER -->
  <div class="order-board">
    <div class="order-header">
      <h4>ORDERS</h4>
    </div>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>CUSTOMER NAME</th>
            <th>CONTACT</th>
            <th>ORDER</th>
            <th>STATUS</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $refresh_query = "SELECT orders.order_id, user.user_id, user.username, user.contact, orders.order_status, orders.order_date FROM orders LEFT JOIN user ON orders.user_id = user.user_id WHERE orders.order_status = 'pending' ORDER BY order_date DESC;";
          $refresh_query_run = mysqli_query($conn, $refresh_query);
          while ($row = mysqli_fetch_assoc($refresh_query_run)) {
            echo "<tr>
                    <td>" . $row['username'] . "</td>
                    <td>" . $row['contact'] . "</td>
                    <td><button class='view-order-button' onclick='viewOrder(" . "\"" . $row['username'] . "\"," . $row['order_id'] . ")' >VIEW ORDER</button></td>
                    <td>" . $row['order_status'] . "</td>
                    <td><button class='action-button' onclick='' >DONE</button></td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- VIEW ORDER -->
  <div class="view-order-container" id="view-order-container">
    <h1 class="view-customer-name" id="view-customer-name"></h1>
    <div class="table-wrapper">
      <table class="view-order-table">
        <thead>
          <tr>
            <th>PRODUCT</th>
            <th>PRICE</th>
            <th>QUANTITY</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // $refresh_query = "SELECT user.user_id, user.username, user.contact, orders.order_status FROM orders LEFT JOIN user ON orders.user_id = user.user_id WHERE orders.order_status = 'pending';";
          // $refresh_query_run = mysqli_query($conn, $refresh_query);
          
          // $append_query = "SELECT * FROM (SELECT bundles.bundle_name AS product, bundles.bundle_price AS price, order_details.quantity, order_details.order_id FROM order_details 
          // LEFT JOIN bundles ON bundles.bundle_id = order_details.bundle_id 
          // WHERE order_details.bundle_id IS NOT NULL 
          // UNION ALL 
          // SELECT donut.donut_name, donut.donut_price, order_details.quantity, order_details.order_id FROM order_details 
          // LEFT JOIN donut ON donut.donut_id = order_details.donut_id 
          // WHERE order_details.donut_id IS NOT NULL 
          // UNION ALL SELECT coffee.coffee_name, coffee_price.coffee_price, order_details.quantity, order_details.order_id FROM order_details 
          // LEFT JOIN coffee ON coffee.coffee_id = order_details.coffee_id 
          // LEFT JOIN coffee_price ON coffee_price.coffee_id = order_details.coffee_id AND coffee_price.coffee_size_id = order_details.coffee_size_id 
          // WHERE order_details.coffee_id IS NOT NULL) AS all_products WHERE order_id = $order_id ;";
          
          // $append_query_run = mysqli_query($conn, $append_query);
          // while ($sub_row = mysqli_fetch_assoc($append_query_run)) {
          //   echo "<tr>
          //           <td>" . $sub_row['product'] . "</td>
          //           <td>" . $sub_row['price'] . "</td>
          //           <td>" . $sub_row['quantity'] . "</td>
          //         </tr>";
          // }
          // ?>
        </tbody>
      </table>
    </div>
    <div class="got-it-button-container">
      <button class="got-it-button" onclick="closeViewOrder()">GOT IT</button>
    </div>
  </div>

  <script src="/admin/admin.js"></script>
</body>

</html>