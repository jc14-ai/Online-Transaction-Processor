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
  <title>Bundle</title>
</head>

<body>
  <!-- Floatin Alert -->
  <div class="alert-add-bundle" id="alert-add-bundle">
    <?php
    if (isset($_SESSION['validity'])) {
      echo "<h4>" . $_SESSION['validity'] . "</h4>";
      ?>
      <script>
        document.getElementById("alert-add-bundle").style.display = 'flex';
      </script>
      <?php
    }
    unset($_SESSION['validity']);
    ?>
    <button class="close-add-bundle-alert-button" onclick="closeBundleAddAlert()">GOT IT!</button>
  </div>

  <!-- Floating Add bundle -->
  <form class="add-bundle-container" id="add-bundle-container" action="add_bundle.php" method="POST">
    <h1>ADD bundle</h1>
    <input class="add-bundle-name-input" type="text" name="bundle_name" placeholder="Bundle name" />
    <input class="add-bundle-price-input" type="text" name="bundle_price" placeholder="Bundle price" />
    <input class="add-bundle-status-input" id="add-bundle-status-input" type="button" value="active"
      onclick="changeStatus(this, document.getElementById('hidden-add-Bundle-status-input'))" />
    <!-- <input class="add-bundle-size-input" id="add-bundle-size-input" type="button" value="16"
      onclick="changeSize(this,document.getElementById('hidden-add-bundle-size-input'))" /> -->
    <input class="hidden-add-bundle-status-input" id="hidden-add-bundle-status-input" type="hidden" name="bundle_status"
      value="active" />
    <!-- <input class="hidden-add-bundle-size-input" id="hidden-add-bundle-size-input" type="hidden" name="bundle_size"
      value="16" /> -->
    <!-- <input
        class="add-bundle-desc-input"
        type="text"
        placeholder="bundle description"
      /> -->
    <button class="add-bundle-button-floating" onclick="closeBundleAddContainer()" type="submit"
      name="add-bundle-button-floating">ADD</button>
    <button class="back-bundle-button" type="button" onclick="closeBundleAddContainer()">
      BACK
    </button>
  </form>

  <!-- Floating Details Bundle-->
  <form class="details-bundle-container" id="details-bundle-container" action="edit_bundle.php" method="POST">
    <h1>DETAILS</h1>

    <input class="details-bundle-name-input" id="details-bundle-name-input" type="text" name="bundle_name"
      placeholder="Bundle name" value="" disabled />

    <input class="details-bundle-price-input" id="details-bundle-price-input" type="text" name="bundle_price"
      placeholder="Bundle price" value="" disabled />

    <input class="details-bundle-status-input" id="details-bundle-status-input" type="button" value=""
      onclick="changeStatus(this,document.getElementById('hidden-details-bundle-status-input'))" disabled />

    <!-- <input class="details-bundle-size-input" id="details-bundle-size-input" type="button" value=""
      onclick="changeSize(this,document.getElementById('hidden-details-bundle-size-input'))" disabled /> -->

    <input class="hidden-details-bundle-status-input" id="hidden-details-bundle-status-input" type="hidden"
      name="bundle_status" value="" />

    <!-- <input class="hidden-details-bundle-size-input" id="hidden-details-bundle-size-input" type="hidden" name="bundle_size"
      value="" /> -->

    <!-- <input class="details-bundle-desc-input" type="text" disabled /> -->

    <input class="save-bundle-button" id="save-bundle-button" type="hidden" name="save-bundle-button"
      onclick="closeBundleDetailsContainer()" value="SAVE" />

    <input class="edit-bundle-button" id="edit-bundle-button" type="submit" onclick="editBundleDetails()"
      value="EDIT" />

    <input class="cancel-bundle-button" id="cancel-bundle-button" type="hidden" onclick="cancelBundleDetails()"
      value="CANCEL" />

    <input class="back-bundle-button" id="back-bundle-button" type="button" onclick="closeBundleDetailsContainer()"
      value="BACK" />

    <input type="hidden" name="old-bundle-id" id="old-bundle-id" value="" />
    <!-- <input type="hidden" name="old-bundle-size-id" id="old-bundle-size-id" value="" /> -->
  </form>

  <!-- Main Board -->
  <div class="bundle-board">
    <div class="bundle-header">
      <h4 style="font-size: 2em;">BUNDLE LIST</h4>
      <button onclick="openBundleAddContainer()" class="add-bundle-button">
        ADD BUNDLE
      </button>
    </div>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>PRODUCT NAME</th>
            <th>PRICE</th>
            <th>STATUS</th>
            <th>SEE DETAILS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $refresh_query = "SELECT * FROM bundles ORDER BY bundle_id;";
          $refresh_query_run = mysqli_query($conn, $refresh_query);

          while ($row = mysqli_fetch_assoc($refresh_query_run)) {
            echo "<tr>
                    <td>" . $row['bundle_name'] . "</td>
                    <td>P" . $row['bundle_price'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>
                     <button class='details-button' onclick='openBundleDetailsContainer(\"" . addslashes($row['bundle_name']) . "\", " . $row['bundle_price'] . ", \"" . addslashes($row['status']) . "\", " . $row['bundle_id'] . ")'>
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