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
        <h1 class="acc-greetings-label">HELLO, GERALD ANDERSON!</h1>
      </div>

      <div class="display-orders-container">
        <div class="completed-orders">
          <h1 class="completed-order-label">COMPLETED ORDERS</h1>
          <table class="orders-theader-table">
            <thead>
              <tr>
                <th>PRODUCT</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
              </tr>
            </thead>
          </table>

          <div class="table-wrapper">
            <table class="completed-orders-table">
              <tbody>
                <tr>
                  <td>DONUT1</td>
                  <td>3X</td>
                  <td>P75</td>
                </tr>
                <tr>
                  <td>KOFAI1</td>
                  <td>1X</td>
                  <td>P70</td>
                </tr>
                <tr>
                  <td>KOFAI1</td>
                  <td>1X</td>
                  <td>P80</td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>5X</td>
                  <td>P375</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <div class="pending-orders">
          <h1 class="pending-order-label">PENDING ORDERS</h1>

          <table class="orders-theader-table">
            <thead>
              <tr>
                <th>PRODUCT</th>
                <th>QUANTITY</th>
                <th>PRICE</th>
              </tr>
            </thead>
          </table>

          <div class="table-wrapper">
            <table class="pending-orders-table">
              <tbody>
                <tr>
                  <td>DONUT1</td>
                  <td>3X</td>
                  <td>P75</td>
                </tr>
                <tr>
                  <td>KOFAI1</td>
                  <td>1X</td>
                  <td>P70</td>
                </tr>
                <tr>
                  <td>KOFAI1</td>
                  <td>1X</td>
                  <td>P80</td>
                </tr>
                <tr>
                  <td>TOTAL</td>
                  <td>5X</td>
                  <td>P375</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
</body>

</html>