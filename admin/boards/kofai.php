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
  <title>Kofai</title>
</head>

<body>
  <!-- Floating Add KOFAI -->
  <form class="add-kofai-container" id="add-kofai-container" action="add_kofai.php" method="POST">
    <h1>ADD KOFAI</h1>
    <input class="add-kofai-name-input" type="text" name="kofai_name" placeholder="Kofai name" />
    <input class="add-kofai-price-input" type="text" name="kofai_price" placeholder="Kofai price" />
    <input class="add-kofai-status-input" id="add-kofai-status-input" type="button" value="active"
      onclick="changeStatus()" />
    <input class="add-kofai-size-input" id="add-kofai-size-input" type="button" value="16" onclick="changeSize()" />
    <input class="hidden-add-kofai-status-input" id="hidden-add-kofai-status-input" type="hidden" name="kofai_status"
      value="active" />
    <input class="hidden-add-kofai-size-input" id="hidden-add-kofai-size-input" type="hidden" name="kofai_size"
      value="16" />
    <!-- <input
        class="add-kofai-desc-input"
        type="text"
        placeholder="Kofai description"
      /> -->
    <button class="add-kofai-button-floating" onclick="closeKofaiAddContainer()" type="submit"
      name="add-kofai-button-floating">ADD</button>
    <button class="back-kofai-button" type="button" onclick="closeKofaiAddContainer()">
      BACK
    </button>
  </form>

  <!-- Floating Details -->
  <div class="details-kofai-container" id="details-kofai-container">
    <h1>DETAILS</h1>
    <input class="details-kofai-name-input" id="details-kofai-name-input" type="text" placeholder="Kofai name" value=""
      disabled />
    <input class="details-kofai-price-input" id="details-kofai-price-input" type="text" placeholder="Kofai price"
      value="" disabled />
    <input class="details-kofai-status-input" id="details-kofai-status-input" type="button" value="active" disabled />
    <input class="details-kofai-size-input" id="details-kofai-size-input" type="button" value="16oz" disabled />
    <!-- <input class="details-kofai-desc-input" type="text" disabled /> -->
    <button class="edit-kofai-button">EDIT</button>
    <button class="back-kofai-button" onclick="closeKofaiDetailsContainer()">
      BACK
    </button>
  </div>

  <!-- Main Board -->
  <div class="kofai-board">
    <div class="kofai-header">
      <h4>PRODUCT LIST</h4>
      <button onclick="openKofaiAddContainer()" class="add-kofai-button">
        ADD KOFAI
      </button>
    </div>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>PRODUCT NAME</th>
            <th>PRICE</th>
            <th>SIZE</th>
            <th>STATUS</th>
            <th>SEE DETAILS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $refresh_query = "SELECT coffee.coffee_name, coffee_price.coffee_price, coffee_size.coffee_size, coffee_price.status FROM coffee_price LEFT JOIN coffee ON coffee.coffee_id = coffee_price.coffee_id LEFT JOIN coffee_size ON coffee_size.coffee_size_id = coffee_price.coffee_size_id;";
          $refresh_query_run = mysqli_query($conn, $refresh_query);

          while ($row = mysqli_fetch_assoc($refresh_query_run)) {
            echo "<tr>
                    <td>" . $row['coffee_name'] . "</td>
                    <td>P" . $row['coffee_price'] . "</td>
                    <td>" . $row['coffee_size'] . "oz</td>
                    <td>" . $row['status'] . "</td>
                    <td>
                     <button class='details-button' onclick='openKofaiDetailsContainer(" . "\"" . addslashes($row['coffee_name']) . "\", " . "\"" . addslashes($row['coffee_price']) . "\", " . "\"" . addslashes($row['status']) . "\", " . "\"" . addslashes($row['coffee_price']) . "\"" . ")'>
                        DETAILS
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