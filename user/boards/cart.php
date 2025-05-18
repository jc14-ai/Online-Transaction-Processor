<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cart</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="cart-container" id="cart-container">
    <div class="my-cart-container">
      <h1 class="my-cart-label">MY CART</h1>
      <div class="cart-table-wrapper">
        <table class="cart-table">
          <thead class="my-cart-theader">
            <tr>
              <th class="cart-head">Product</th>
              <th class="cart-head">Unit Price</th>
              <th class="cart-head">Quantity</th>
              <th class="cart-head">Total Price</th>
              <th class="cart-head">Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $user_name = $_SESSION['user'];
            $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
            $user_id_query_run = mysqli_query($conn, $user_id_query);
            $user_id_row = mysqli_fetch_assoc($user_id_query_run);
            $user_id = $user_id_row['user_id'];

            $my_cart_query = "SELECT coffee.coffee_name AS product_name, 
            coffee_price.coffee_price AS unit_price, cart.quantity AS quantity, 
            coffee_price.coffee_price * quantity AS total_price FROM cart 
            LEFT JOIN coffee ON coffee.coffee_id = cart.coffee_id 
            LEFT JOIN coffee_price ON coffee_price.coffee_id = cart.coffee_id 
            WHERE coffee_price.coffee_size_id = cart.coffee_size_id 
            AND coffee_price.coffee_id = cart.coffee_id 
            AND cart.user_id = $user_id 
            UNION ALL 
            SELECT donut.donut_name, donut.donut_price, cart.quantity, 
            donut.donut_price * cart.quantity AS total_price FROM cart 
            LEFT JOIN donut ON donut.donut_id = cart.donut_id 
            WHERE cart.donut_id IS NOT NULL AND cart.user_id = $user_id 
            UNION ALL 
            SELECT bundles.bundle_name, bundles.bundle_price, cart.quantity, 
            bundles.bundle_price * quantity FROM cart 
            LEFT JOIN bundles ON bundles.bundle_id = cart.bundle_id 
            WHERE cart.bundle_id IS NOT NULL AND cart.user_id = $user_id;";
            $my_cart_query_run = mysqli_query($conn, $my_cart_query);

            while ($my_cart_row = mysqli_fetch_assoc($my_cart_query_run)) {
              $product_name = $my_cart_row['product_name'];
              $unit_price = $my_cart_row['unit_price'];
              $quantity = $my_cart_row['quantity'];
              $total_price = $my_cart_row['total_price'];

              echo "<tr>
              <td>$product_name</td>
              <td>P$unit_price</td>
              <td class=\"quantity-container\">
                <div class=\"quantity-button-container\">
                  <button class=\"decrement-button\" onclick=\"countItem(this, $user_id, '$product_name', $unit_price, $quantity, $total_price)\">-</button>
                  <label class=\"number-label\">$quantity</label>
                  <button class=\"increment-button\" onclick=\"countItem(this, $user_id, '$product_name', $unit_price, $quantity, $total_price)\">+</button>
                </div>
              </td>
              <td class=\"total-price\">P$total_price</td>
              <td>
                <img class=\"trash-image\" src=\"/src/trash-xmark.png\" onclick=\"removeOnCart($user_id, '$product_name', $unit_price)\"/>
              </td>
            </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <form class="checkout-container" id="checkout-container" method="POST" action="/user/payment.php">
      <div class="total-container">

        <div class="total-orders">
          <?php
          $user_name = $_SESSION['user'];
          $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
          $user_id_query_run = mysqli_query($conn, $user_id_query);
          $user_id_row = mysqli_fetch_assoc($user_id_query_run);
          $user_id = $user_id_row['user_id'];

          $count_query = "SELECT COUNT(*) AS count FROM cart WHERE user_id = $user_id;";
          $count_query_run = mysqli_query($conn, $count_query);
          $count_row = mysqli_fetch_assoc($count_query_run);
          $count = $count_row["count"];

          echo "Total($count Order/s)";
          ?>
        </div>
        <div class="total-orders-amount" id="total-orders-amount"><?php
        $user_name = $_SESSION['user'];
        $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name' LIMIT 1;";
        $user_id_query_run = mysqli_query($conn, $user_id_query);
        $user_id_row = mysqli_fetch_assoc($user_id_query_run);
        $user_id = $user_id_row['user_id'];

        $total_query = "SELECT SUM(total_price) AS total FROM (
          SELECT 
          coffee.coffee_name AS product_name, 
          coffee_price.coffee_price AS unit_price, 
          cart.quantity AS quantity, 
          coffee_price.coffee_price * cart.quantity AS total_price 
          FROM cart 
          LEFT JOIN coffee ON coffee.coffee_id = cart.coffee_id 
          LEFT JOIN coffee_price ON coffee_price.coffee_id = cart.coffee_id 
          WHERE coffee_price.coffee_size_id = cart.coffee_size_id 
          AND coffee_price.coffee_id = cart.coffee_id 
          AND cart.user_id = $user_id
          UNION ALL
          SELECT 
          donut.donut_name AS product_name, 
          donut.donut_price AS unit_price, 
          cart.quantity, 
          donut.donut_price * cart.quantity AS total_price 
          FROM cart 
          LEFT JOIN donut ON donut.donut_id = cart.donut_id 
          WHERE cart.donut_id IS NOT NULL 
          AND cart.user_id = $user_id
          UNION ALL
          SELECT 
          bundles.bundle_name AS product_name, 
          bundles.bundle_price AS unit_price, 
          cart.quantity, 
          bundles.bundle_price * cart.quantity AS total_price 
          FROM cart 
          LEFT JOIN bundles ON bundles.bundle_id = cart.bundle_id 
          WHERE cart.bundle_id IS NOT NULL 
          AND cart.user_id = $user_id) AS combined_totals;";

        $total_query_run = mysqli_query($conn, $total_query);
        $total_query_row = mysqli_fetch_assoc($total_query_run);
        $total = $total_query_row["total"];

        if ($total === null) {
          echo "";
        } else if ($total !== null) {
          echo "P$total";
        }
        ?></div>
        <input type="hidden" name="amount" value="
        <?php
        echo str_replace('.', '', $total);
        ?>" />
      </div>
      <input type="button" class="checkout-button" onclick="checkout('<?php echo $user_id; ?>', <?php echo $total; ?>)"
        value="CHECKOUT" />
  </div>

  <div class="main-checkout-container" id="main-checkout-container">
    <!-- NEED TO PUT THE PAYMAYA FRONTEND HERE -->
  </div>
  <script src="/user/user.js"></script>
</body>

</html>