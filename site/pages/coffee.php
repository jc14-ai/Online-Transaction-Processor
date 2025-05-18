<?php
session_start();
include("../backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="/site/styles/coffee-style.css" />
</head>

<body bgcolor="#e2dfd0">
  <table style="background-color: #3e3232;">
    <tr>
      <td>
        <div style="text-align: center; background-color: #3e3232;"></div>
      </td>
    </tr>
  </table>
  <div class="menu-header">
    <h1>COFFEE</h1>
  </div>
  <div class="donut-container">
    <?php
    $coffee_query = "
      SELECT coffee.coffee_name, coffee.image FROM coffee_price 
      LEFT JOIN coffee ON coffee_price.coffee_id = coffee.coffee_id 
      WHERE coffee_price.status = 'active' 
      GROUP BY coffee_price.coffee_id;";

    $coffee_query_run = mysqli_query($conn, $coffee_query);

    while ($coffee_row = mysqli_fetch_assoc($coffee_query_run)) {
      $coffee_name = $coffee_row['coffee_name'];
      $coffee_image = $coffee_row['image'];

      echo "
        <div class=\"donut\">
        <img src=\"/src/$coffee_image\" width=\"40%\" />
        <h2>$coffee_name</h2>
        <div style=\"text-align: center\">
          <button class=\"order-button\" onclick=\"showSignUp()\">
            <img src=\"/src/order-now.png\" />
          </button>
        </div>
      </div>";
    }
    ?>
  </div>
</body>

</html>