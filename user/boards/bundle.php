<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bundle</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="bundle-body">
    <!-- BUNDLE CONTAINER -->
    <div class="bundle-container" id="bundle-container">
      <?php
      $bundle_query = "SELECT * FROM bundles WHERE status = 'active';";
      $bundle_query_run = mysqli_query($conn, $bundle_query);

      $num = 1;
      while ($row = mysqli_fetch_assoc($bundle_query_run)) {
        $bundle_image = $row['image'];
        echo "<div class='bundle' id='bundle" . $num . "'>
        <div class='bundle-image-container'>
          <img class='bundle-image' src='/src/$bundle_image' />
        </div>
        <h2 class='bundle-name' id='bundle-name'>" . $row['bundle_name'] . "</h2>
        <h4 class='bundle-price' id='bundle-price'>P" . $row['bundle_price'] . "</h4>
        <button class='bundle-add-to-cart-button' onclick='openBundlePopUpContainer(" . $row['bundle_id'] . ",\"" . $row['bundle_name'] . "\"," . $row['bundle_price'] . ", \"$bundle_image\")'>
          <img class='add-to-cart-image-button' src='/src/shopping-cart-add.png' />
          Add to Cart
        </button>
      </div>";
      }
      ?>

      <!-- BUNDLE POP UP CONTAINER -->
      <div class="bundle-pop-up-container" id="bundle-pop-up-container">
        <div class="bundle-pop-up-image-container">
          <img class="bundle-pop-up-image" id="bundle-pop-up-image" src="/src/bundle.png" />
        </div>
        <h1 class="bundle-pop-up-name" id="bundle-pop-up-name">bundle 1</h1>
        <h2 class="bundle-pop-up-price" id="bundle-pop-up-price">P2500.00</h2>
        <div class="bundle-pop-up-counter-container">
          <button class="dec-bundle" onclick="decrementBundle()">-</button>
          <label class="bundle-count" id="bundle-count">1</label>
          <button class="inc-bundle" onclick="incrementBundle()">+</button>
        </div>
        <div class="bundle-pop-up-button-container">
          <button class="bundle-pop-up-back-button" onclick="closeBundlePopUpContainer()">Back</button>
          <button class="bundle-pop-up-add-to-cart-button" onclick="addBundleToCart()">
            <img class="bundle-pop-up-add-to-cart-image" src="/src/shopping-cart-add.png" />Add to Cart
          </button>
        </div>
      </div>

      <!-- ADDED TO CART POP UP CONTAINER -->
      <div class="bundle-added-to-cart-pop-up-container" id="bundle-added-to-cart-pop-up-container">
        <h3 class="bundle-added-to-cart-pop-up-text" id="bundle-added-to-cart-pop-up-text">3 bundle 1 added to cart!
        </h3>
        <button class="bundle-close-added-to-cart-button" id="bundle-close-added-to-cart-button"
          onclick="closeBundleAddedToCartContainer()">Close</button>
      </div>
    </div>
  </div>
  <script src="/user/user.js"></script>
</body>

</html>