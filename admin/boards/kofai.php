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
  <!-- Floatin Alert -->
  <div class="alert-add-kofai" id="alert-add-kofai">
    <?php
    if (isset($_SESSION['validity'])) {
      echo "<h4>" . $_SESSION['validity'] . "</h4>";
      ?>
      <script>
        document.getElementById("alert-add-kofai").style.display = 'flex';
      </script>
      <?php
    }
    unset($_SESSION['validity']);
    ?>
    <button class="close-add-kofai-alert-button" onclick="closeKofaiAddAlert()">GOT IT!</button>
  </div>

  <!-- Floating Add Kofai -->
  <form class="add-kofai-container" id="add-kofai-container" action="add_kofai.php" method="POST"
    enctype="multipart/form-data">
    <h1>ADD KOFAI</h1>
    <div class="image-upload-container">
      <div class="preview-container" id="preview-container">
        <img class="image-preview" id="image-preview" src="/src/coffee.png" />
      </div>
      <label class="upload-label">
        <span>Select Image</span>
        <input type="file" id="image-upload" name="image" accept="image/*" required hidden />
      </label>
    </div>
    <input class="add-kofai-name-input" type="text" name="kofai_name" placeholder="Kofai name" />
    <input class="add-kofai-price-input" type="text" name="kofai_price" placeholder="Kofai price" />
    <input class="add-kofai-status-input" id="add-kofai-status-input" type="button" value="active"
      onclick="changeStatus(this, document.getElementById('hidden-add-kofai-status-input'))" />
    <input class="add-kofai-size-input" id="add-kofai-size-input" type="button" value="16"
      onclick="changeSize(this,document.getElementById('hidden-add-kofai-size-input'))" />
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

  <!-- Floating Details Kofai-->
  <form class="details-kofai-container" id="details-kofai-container" action="edit_kofai.php" method="POST"
    enctype="multipart/form-data">
    <h1>DETAILS</h1>
    <div class="image-upload-container">
      <div class="preview-container" id="preview-container">
        <img class="detail-image-preview" id="detail-kofai-image-preview" />
        <input type="hidden" name="KofaiImageSrc" id="KofaiImageSrc">
      </div>
      <label class="detail-upload-label" id="detail-upload-label">
        <span>Select Image</span>
        <input type="file" id="detail-kofai-image-upload" name="image" accept="image/*" hidden />
      </label>
    </div>
    <input class="details-kofai-name-input" id="details-kofai-name-input" type="text" name="kofai_name"
      placeholder="Kofai name" value="" disabled />

    <input class="details-kofai-price-input" id="details-kofai-price-input" type="text" name="kofai_price"
      placeholder="Kofai price" value="" disabled />

    <input class="details-kofai-status-input" id="details-kofai-status-input" type="button" value=""
      onclick="changeStatus(this,document.getElementById('hidden-details-kofai-status-input'))" disabled />

    <input class="details-kofai-size-input" id="details-kofai-size-input" type="button" value=""
      onclick="changeSize(this,document.getElementById('hidden-details-kofai-size-input'))" disabled />

    <input class="hidden-details-kofai-status-input" id="hidden-details-kofai-status-input" type="hidden"
      name="kofai_status" value="" />

    <input class="hidden-details-kofai-size-input" id="hidden-details-kofai-size-input" type="hidden" name="kofai_size"
      value="" />

    <!-- <input class="details-kofai-desc-input" type="text" disabled /> -->

    <input class="save-kofai-button" id="save-kofai-button" type="hidden" name="save-kofai-button"
      onclick="closeKofaiDetailsContainer()" value="SAVE" />

    <input class="edit-kofai-button" id="edit-kofai-button" type="submit" onclick="editKofaiDetails()" value="EDIT" />

    <input class="cancel-kofai-button" id="cancel-kofai-button" type="hidden" onclick="cancelKofaiDetails()"
      value="CANCEL" />

    <input class="back-kofai-button" id="back-kofai-button" type="button" onclick="closeKofaiDetailsContainer()"
      value="BACK" />

    <input type="hidden" name="old-coffee-id" id="old-coffee-id" value="" />
    <input type="hidden" name="old-coffee-size-id" id="old-coffee-size-id" value="" />
  </form>

  <!-- Main Board -->
  <div class="kofai-board">
    <div class="kofai-header">
      <h4 style="font-size: 2em;">KOFAI LIST</h4>
      <button onclick="openKofaiAddContainer()" class="add-kofai-button">
        ADD KOFAI
      </button>
    </div>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>KOFAI</th>
            <th>PRODUCT NAME</th>
            <th>PRICE</th>
            <th>SIZE</th>
            <th>STATUS</th>
            <th>SEE DETAILS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $refresh_query = "SELECT coffee.image, coffee.coffee_name, coffee_price.coffee_price, coffee_size.coffee_size, coffee_price.status, coffee_price.coffee_id, coffee_price.coffee_size_id FROM coffee_price LEFT JOIN coffee ON coffee.coffee_id = coffee_price.coffee_id LEFT JOIN coffee_size ON coffee_size.coffee_size_id = coffee_price.coffee_size_id ORDER BY coffee_price.coffee_id;";
          $refresh_query_run = mysqli_query($conn, $refresh_query);

          while ($row = mysqli_fetch_assoc($refresh_query_run)) {
            echo "<tr>
                    <td> <img style=\"width: 90px; height: 90px;\" src=\"/src/" . $row['image'] . "\"/> </td>
                    <td>" . $row['coffee_name'] . "</td>
                    <td>P" . $row['coffee_price'] . "</td>
                    <td>" . $row['coffee_size'] . "oz</td>
                    <td>" . $row['status'] . "</td>
                    <td>
                     <button class='details-button' onclick='openKofaiDetailsContainer(\"" . addslashes($row['coffee_name']) . "\",\"" . addslashes($row['coffee_price']) . "\",\"" . addslashes($row['status']) . "\",\"" . addslashes($row['coffee_size']) . "\"," . $row['coffee_id'] . "," . $row['coffee_size_id'] . ", \"" . $row['image'] . "\")'>
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
    const detailsKofaiImageUpload = document.getElementById("detail-kofai-image-upload");
    const detailsKofaiImageContainer = document.getElementById("detail-kofai-image-preview");
    detailsKofaiImageUpload.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          //fix this
          detailsKofaiImageContainer.src = e.target.result;
          // console.log(file.name);
        };
        reader.readAsDataURL(file);
      }
    });

    document.getElementById('details-kofai-container').addEventListener('submit', function () {
      const src = document.getElementById('detail-kofai-image-preview').src;
      document.getElementById('KofaiImageSrc').value = src;
    });
  </script>
</body>

</html>