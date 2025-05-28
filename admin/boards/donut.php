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
  <!-- Floatin Alert -->
  <div class="alert-add-donut" id="alert-add-donut">
    <?php
    if (isset($_SESSION['validity'])) {
      echo "<h4>" . $_SESSION['validity'] . "</h4>";
      ?>
      <script>
        document.getElementById("alert-add-donut").style.display = 'flex';
      </script>
      <?php
    }
    unset($_SESSION['validity']);
    ?>
    <button class="close-add-donut-alert-button" onclick="closeDonutAddAlert()">GOT IT!</button>
  </div>

  <!-- Floating Add Donut -->
  <form class="add-donut-container" id="add-donut-container" action="add_donut.php" method="POST"
    enctype="multipart/form-data">
    <h1>ADD DONUT</h1>
    <div class="image-upload-container">
      <div class="preview-container" id="preview-container">
        <img class="image-preview" id="image-preview" src="/src/donut.png" />
      </div>
      <label class="upload-label">
        <span>Select Image</span>
        <input type="file" id="image-upload" name="image" accept="image/*" required hidden />
      </label>
    </div>
    <input class="add-donut-name-input" type="text" name="donut_name" placeholder="Donut name" />
    <input class="add-donut-price-input" type="text" name="donut_price" placeholder="Donut price" />
    <input class="add-donut-status-input" id="add-donut-status-input" type="button" value="active"
      onclick="changeStatus(this, document.getElementById('hidden-add-donut-status-input'))" />
    <input class="hidden-add-donut-status-input" id="hidden-add-donut-status-input" type="hidden" name="donut_status"
      value="active" />
    <button class="add-donut-button-floating" onclick="closeDonutAddContainer()" type="submit"
      name="add-donut-button-floating">ADD</button>
    <button class="back-donut-button" type="button" onclick="closeDonutAddContainer()">
      BACK
    </button>
  </form>

  <!-- Floating Details Donut-->
  <form class="details-donut-container" id="details-donut-container" action="edit_donut.php" method="POST"
    enctype="multipart/form-data">
    <h1>DETAILS</h1>
    <div class="image-upload-container">
      <div class="preview-container" id="preview-container">
        <img class="detail-image-preview" id="detail-donut-image-preview" />
        <input type="hidden" name="DonutImageSrc" id="DonutImageSrc">
      </div>
      <label class="detail-upload-label" id="detail-upload-label">
        <span>Select Image</span>
        <input type="file" id="detail-donut-image-upload" name="image" accept="image/*" hidden />
      </label>
    </div>

    <input class="details-donut-name-input" id="details-donut-name-input" type="text" name="donut_name"
      placeholder="Donut name" value="" disabled />

    <input class="details-donut-price-input" id="details-donut-price-input" type="text" name="donut_price"
      placeholder="Donut price" value="" disabled />

    <input class="details-donut-status-input" id="details-donut-status-input" type="button" value=""
      onclick="changeStatus(this,document.getElementById('hidden-details-donut-status-input'))" disabled />

    <!-- <input class="details-donut-size-input" id="details-donut-size-input" type="button" value=""
      onclick="changeSize(this,document.getElementById('hidden-details-donut-size-input'))" disabled /> -->

    <input class="hidden-details-donut-status-input" id="hidden-details-donut-status-input" type="hidden"
      name="donut_status" value="" />

    <!-- <input class="hidden-details-donut-size-input" id="hidden-details-donut-size-input" type="hidden" name="donut_size"
      value="" /> -->

    <!-- <input class="details-donut-desc-input" type="text" disabled /> -->

    <input class="save-donut-button" id="save-donut-button" type="hidden" name="save-donut-button"
      onclick="closeDonutDetailsContainer()" value="SAVE" />

    <input class="edit-donut-button" id="edit-donut-button" type="submit" onclick="editDonutDetails()" value="EDIT" />

    <input class="cancel-donut-button" id="cancel-donut-button" type="hidden" onclick="cancelDonutDetails()"
      value="CANCEL" />

    <input class="back-donut-button" id="back-donut-button" type="button" onclick="closeDonutDetailsContainer()"
      value="BACK" />

    <input type="hidden" name="old-donut-id" id="old-donut-id" value="" />
    <!-- <input type="hidden" name="old-donut-size-id" id="old-donut-size-id" value="" /> -->
  </form>

  <!-- Main Board -->
  <div class="donut-board">
    <div class="donut-header">
      <h4 style="font-size: 2em;">DONUT LIST</h4>
      <button onclick=" openDonutAddContainer()" class="add-donut-button">
        ADD DONUT
      </button>
    </div>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>DONUT</th>
            <th>PRODUCT NAME</th>
            <th>PRICE</th>
            <th>STATUS</th>
            <th>SEE DETAILS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $refresh_query = "SELECT * FROM donut ORDER BY donut_id;";
          $refresh_query_run = mysqli_query($conn, $refresh_query);

          while ($row = mysqli_fetch_assoc($refresh_query_run)) {
            echo "<tr>
                    <td> <img style=\"width: 90px; height: 90px;\" src=\"/src/" . $row['image'] . "\"/> </td>
                    <td>" . $row['donut_name'] . "</td>
                    <td>P" . $row['donut_price'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>
                     <button class='details-button' onclick='openDonutDetailsContainer(\"" . addslashes($row['donut_name']) . "\", " . $row['donut_price'] . ", \"" . addslashes($row['status']) . "\", " . $row['donut_id'] . ", \"" . $row['image'] . "\")'>
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
  <script>
    const detailsDonutImageUpload = document.getElementById("detail-donut-image-upload");
    const detailsDonutImageContainer = document.getElementById("detail-donut-image-preview");
    detailsDonutImageUpload.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          //fix this
          detailsDonutImageContainer.src = e.target.result;
          // console.log(file.name);
        };
        reader.readAsDataURL(file);
      }
    });

    document.getElementById('details-donut-container').addEventListener('submit', function () {
      const src = document.getElementById('detail-donut-image-preview').src;
      document.getElementById('DonutImageSrc').value = src;
    });
  </script>
</body>

</html>