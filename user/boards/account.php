<?php
session_start();
include("../../site/backend/dbcon.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Account</title>
  <link rel="stylesheet" href="/user/user.css" />
</head>

<body>
  <div class="account-container">
    <div class="top-board-wrapper">
      <div class="my-profile-label">
        <h3>MY PROFILE</h3>
      </div>
      <div class="name-board">
        <h1 class="acc-greetings-label">HELLO,<?php echo ' ' . $_SESSION['user']; ?></h1>
      </div>

      <div class="acc-information-container">
        <div class="acc-info-container">
          <div class="acc-info">
            <h2 class="acc-label">Username</h2>
            <input class="acc-username" id="acc-username" value="<?php echo $_SESSION['user']; ?>" disabled />
          </div>
          <div class="acc-info">
            <h2 class="acc-label">Email</h2>
            <input class="acc-email" id="acc-email" value="<?php
            $username = $_SESSION['user'];

            $email_query = "SELECT email FROM user WHERE username = '$username' LIMIT 1;";
            $email_query_run = mysqli_query($conn, $email_query);
            $email_row = mysqli_fetch_assoc($email_query_run);
            $email = $email_row["email"];

            echo $email;
            ?>" disabled />
          </div>
          <div class="acc-info">
            <h2 class="acc-label">Phone Number</h2>
            <input class="acc-number" id="acc-number" value="<?php
            $username = $_SESSION['user'];

            $contact_query = "SELECT contact FROM user WHERE username = '$username' LIMIT 1;";
            $contact_query_run = mysqli_query($conn, $contact_query);
            $contact_row = mysqli_fetch_assoc($contact_query_run);
            $contact = $contact_row["contact"];

            echo $contact;
            ?>" disabled />
          </div>
          <div class="acc-button-container">
            <input class="acc-edit-button" id="acc-edit-button" type="button" value="Edit" onclick="editInfo(this)" />

            <input class="acc-cancel-button" id="acc-cancel-button" type="button" value="Cancel"
              onclick="cancelInfo(this)" />
            <input class="acc-save-button" id="acc-save-button" type="button" value="Save" onclick="saveInfo(this)" />
          </div>
        </div>
        <div class="acc-select-image-container">
          <img class="account-image" src="<?php
          $user_name = $_SESSION['user'];

          $user_id_query = "SELECT user_id FROM user WHERE username = '$user_name';";
          $user_id_query_run = mysqli_query($conn, $user_id_query);
          $user_id_row = mysqli_fetch_assoc($user_id_query_run);
          $user_id = $user_id_row['user_id'];

          $image_query = "SELECT image FROM user WHERE user_id = $user_id;";
          $image_query_run = mysqli_query($conn, $image_query);
          $image_row = mysqli_fetch_assoc($image_query_run);
          $image = $image_row['image'];

          echo "/src/$image";
          ?>" id="profileImage" />
          <h3 class="select-image-button" id="selectImageButton" onclick="selectImage()">Select Image</h3>
          <input type="file" id="imageInput" accept="image/*" style="display: none;" />
        </div>
      </div>
    </div>

    <script src="/user/user.js"></script>
</body>

</html>