<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Notification</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="notification-container">
    <div class="my-notification-container">
      <h1 class="my-notification-label">NOTIFICATIONS</h1>
      <div class="notification-table-wrapper">
        <table class="cart-table">
          <tbody>
            <?php
            $username = $_SESSION['user'];
            $user_id_query = "SELECT user_id FROM user WHERE username = '$username' LIMIT 1;";
            $user_id_query_run = mysqli_query($conn, $user_id_query);
            $user_id_row = mysqli_fetch_assoc($user_id_query_run);
            $user_id = $user_id_row["user_id"];

            $notification_query = "SELECT * FROM notification WHERE user_id = $user_id;";
            $notification_query_run = mysqli_query($conn, $notification_query);
            while ($notification_row = mysqli_fetch_assoc($notification_query_run)) {

              $notification_id = $notification_row["notification_id"];
              $message = $notification_row['message'];
              $date = $notification_row['order_date'];

              echo "
              <tr>
                <td>$message</td>
                <td>$date</td>
                <td><img class=\"trash-button\" src=\"/src/trash-xmark.png\" onclick=\"removeNotification($notification_id, $user_id)\" /></td>
            </tr>";
            }
            ?>
            <!-- <tr>
              <td>Your order is ready</td>
              <td>2025-12-12</td>
              <td><img class="trash-button" src="/src/trash-xmark.png" onclick="removeNotification(this)" /></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="/user/user.js"></script>
</body>

</html>