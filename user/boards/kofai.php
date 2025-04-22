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
    <div class="kofai-container" id="kofai-container">
      <div class="kofai" id="kofai1">
        <div class="kofai-image-container">
          <img class="kofai-image" src="/src/coffee.png" />
        </div>
        <h2 class="kofai-name" id="kofai-name">Kofai 1</h2>
        <h4 class="kofai-price" id="kofai-price">P70.00</h4>
        <button class="kofai-add-to-cart-button">
          <img class="add-to-cart-image-button" src="/src/shopping-cart-add.png" />
          Add to Cart
        </button>
      </div>
      <div class="kofai" id="kofai1">
        <div class="kofai-image-container">
          <img class="kofai-image" src="/src/coffee.png" />
        </div>
        <h2 class="kofai-name" id="kofai-name">Kofai 1</h2>
        <h4 class="kofai-price" id="kofai-price">P70.00</h4>
        <button class="kofai-add-to-cart-button">
          <img class="add-to-cart-image-button" src="/src/shopping-cart-add.png" />
          Add to Cart
        </button>
      </div>
      <div class="kofai" id="kofai1">
        <div class="kofai-image-container">
          <img class="kofai-image" src="/src/coffee.png" />
        </div>
        <h2 class="kofai-name" id="kofai-name">Kofai 1</h2>
        <h4 class="kofai-price" id="kofai-price">P70.00</h4>
        <button class="kofai-add-to-cart-button">
          <img class="add-to-cart-image-button" src="/src/shopping-cart-add.png" />
          Add to Cart
        </button>
      </div>
    </div>
  </div>
</body>

</html>