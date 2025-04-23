<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kofai</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="kofai-body">
    <!-- kofai CONTAINER -->
    <div class="kofai-container" id="kofai-container">
      <?php
      $kofai_query = "SELECT * FROM coffee;";
      $kofai_query_run = mysqli_query($conn, $kofai_query);

      $num = 1;
      while ($row = mysqli_fetch_assoc($kofai_query_run)) {
        echo "<div class='kofai' id='kofai$num'>
        <div class='kofai-image-container'>
          <img class='kofai-image' src='/src/coffee.png' />
        </div>
        <h2 class='kofai-name' id='kofai-name'>" . $row['coffee_name'] . "</h2>
        <button class='kofai-add-to-cart-button' onclick='openKofaiPopUpContainer(" . $row['coffee_id'] . ",\"" . $row['coffee_name'] . "\")'>
          <img class='add-to-cart-image-button' src='/src/shopping-cart-add.png' />
          Add to Cart
        </button>
      </div>";
        $num++;
      }
      ?>

      <!-- KOFAI POP UP CONTAINER -->
      <div class="kofai-pop-up-container" id="kofai-pop-up-container">
        <div class="kofai-pop-up-image-container">
          <img class="kofai-pop-up-image" src="/src/coffee.png" />
        </div>
        <h1 class="kofai-pop-up-name" id="kofai-pop-up-name">kofai 1</h1>
        <h2 class="kofai-pop-up-price" id="kofai-pop-up-price">P70.00</h2>
        <div class="kofai-pop-up-counter-container">
          <button class="dec-kofai" onclick="decrementKofai()">-</button>
          <label class="kofai-count" id="kofai-count">1</label>
          <button class="inc-kofai" onclick="incrementKofai()">+</button>
        </div>
        <button class="kofai-size-picker-button" id="kofai-size-picker-button" onclick="changeSize()">16oz</button>
        <div class="kofai-pop-up-button-container">
          <button class="kofai-pop-up-back-button" onclick="closeKofaiPopUpContainer()">Back</button>
          <button class="kofai-pop-up-add-to-cart-button" onclick="addKofaiToCart()">
            <img class="kofai-pop-up-add-to-cart-image" src="/src/shopping-cart-add.png" />Add to Cart
          </button>
        </div>
      </div>

      <!-- ADDED TO CART POP UP CONTAINER -->
      <div class="kofai-added-to-cart-pop-up-container" id="kofai-added-to-cart-pop-up-container">
        <h3 class="kofai-added-to-cart-pop-up-text" id="kofai-added-to-cart-pop-up-text">3 kofai added to cart!</h3>
        <button class="kofai-close-added-to-cart-button" id="kofai-close-added-to-cart-button"
          onclick="closeKofaiAddedToCartContainer()">Close</button>
      </div>
    </div>
  </div>
  <script src="/user/user.js"></script>
</body>

</html>