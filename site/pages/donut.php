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
  <link rel="stylesheet" href="/site/styles/donut-style.css" />
</head>

<body>
  <table>
    <tr>
      <br />
      <td>
        <div style="text-align: center">MENU</div>
      </td>
    </tr>
  </table>
  <div class="menu-header">
    <h1>DONUTS</h1>
    <div class="menu-type">
      <span id="soloBtn" onclick="showSolo()">SOLO</span>
      <span class="divider">|</span>
      <span id="bundleBtn" onclick="showBundle()">BUNDLE</span>
    </div>
  </div>
  <div class="donut-container" id="donut-container">
    <?php
    $donut_query = "SELECT * FROM donut WHERE status = 'active';";
    $donut_query_run = mysqli_query($conn, $donut_query);

    while ($donut_row = mysqli_fetch_assoc($donut_query_run)) {
      $donut_name = $donut_row['donut_name'];
      $donut_price = $donut_row['donut_price'];

      echo "
        <div class=\"donut\">
        <img src=\"/src/donut.png\" width=\"40%\" />
        <h2 class=\"donut-name-label\">$donut_name</h2>
        <p class=\"donut-price-label\">P$donut_price</p>
        <div style=\"text-align: center\">
          <button class=\"order-button\" onclick=\"showSignUp()\">
            <img src=\"/src/order-now.png\" />
          </button>
        </div>
      </div>";
    }
    ?>
  </div>
  <script src="/site/script.js"></script>
  <!-- <script src="/site/pages/donut.js"></script> -->
</body>

</html>