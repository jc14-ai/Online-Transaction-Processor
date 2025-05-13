<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/admin/admin.css" />
  <title>Donut</title>
</head>

<body>
  <!-- Main Board -->
  <div class="notification-board">
    <h4 class="notification-label" style="font-size: 2em;">NOTIFICATION</h4>
    <div class="notification-table-wrapper">
      <table>
        <tbody>
          <?php
          $refresh_query = "SELECT user.username, orders.* FROM orders LEFT JOIN user ON orders.user_id = user.user_id WHERE orders.order_status = 'pending' ORDER BY order_date DESC;";
          $refresh_query_run = mysqli_query($conn, $refresh_query);

          while ($row = mysqli_fetch_assoc($refresh_query_run)) {
            echo "<tr>
                    <td>You have new order from <strong>" . strtoupper($row['username']) . "</strong> </td>
                    <td>" . $row['order_date'] . "</td>
                    <td>
                     <button class=\"view-button\" onclick=\"window.location.href='/admin/boards/orders.php'\">
                     VIEW
                     </button>
                    </td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="/admin/admin.js"></script>
</body>

</html>