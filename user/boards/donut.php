<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donut</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="donut-body">
    <!-- DONUT CONTAINER -->
    <div class="donut-container" id="donut-container">
      <?php
      $donut_query = "SELECT * FROM donut WHERE status = 'active';";
      $donut_query_run = mysqli_query($conn, $donut_query);

      $num = 1;
      while ($row = mysqli_fetch_assoc($donut_query_run)) {
        echo "<div class='donut' id='donut" . $num . "'>
        <div class='donut-image-container'>
          <img class='donut-image' src='/src/donut.png' />
        </div>
        <h2 class='donut-name' id='donut-name'>" . $row['donut_name'] . "</h2>
        <h4 class='donut-price' id='donut-price'>P" . $row['donut_price'] . "</h4>
        <button class='donut-add-to-cart-button' onclick='openDonutPopUpContainer(" . $row['donut_id'] . ",\"" . $row['donut_name'] . "\"," . $row['donut_price'] . ")'>
          <img class='add-to-cart-image-button' src='/src/shopping-cart-add.png' />
          Add to Cart
        </button>
      </div>";
      }
      ?>

      <!-- DONUT POP UP CONTAINER -->
      <div class="donut-pop-up-container" id="donut-pop-up-container">
        <div class="donut-pop-up-image-container">
          <img class="donut-pop-up-image" src="/src/donut.png" />
        </div>
        <h1 class="donut-pop-up-name" id="donut-pop-up-name">Donut 1</h1>
        <h2 class="donut-pop-up-price" id="donut-pop-up-price">P25.00</h2>
        <div class="donut-pop-up-counter-container">
          <button class="dec-donut" onclick="decrementDonut()">-</button>
          <label class="donut-count" id="donut-count">1</label>
          <button class="inc-donut" onclick="incrementDonut()">+</button>
        </div>
        <div class="donut-pop-up-button-container">
          <button class="donut-pop-up-back-button" onclick="closeDonutPopUpContainer()">Back</button>
          <button class="donut-pop-up-add-to-cart-button" onclick="addDonutToCart()">
            <img class="donut-pop-up-add-to-cart-image" src="/src/shopping-cart-add.png" />Add to Cart
          </button>
        </div>
      </div>

      <!-- ADDED TO CART POP UP CONTAINER -->
      <div class="donut-added-to-cart-pop-up-container" id="donut-added-to-cart-pop-up-container">
        <h3 class="donut-added-to-cart-pop-up-text" id="donut-added-to-cart-pop-up-text">3 Donut 1 added to cart!</h3>
        <button class="donut-close-added-to-cart-button" id="donut-close-added-to-cart-button"
          onclick="closeDonutAddedToCartContainer()">Close</button>
      </div>
    </div>
  </div>
  <script src="/user/user.js"></script>
</body>

</html>