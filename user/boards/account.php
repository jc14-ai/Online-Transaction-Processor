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
    <div class="account-profile-container">
      <h3 class="my-profile-label">MY PROFILE</h3>
      <h1 class="acc-greetings-label">HELLO, <?php echo ' ' . $_SESSION['user']; ?></h1>
    </div>

    <div class="acc-information-container">
      <div class="acc-info-container">
        <div class="acc-info">
          <h2 class="acc-label">Username</h2>
          <input class="acc-username" value="Gerald" disabled />
        </div>
        <div class="acc-info">
          <h2 class="acc-label">Email</h2>
          <input class="acc-email" value="Gerald@gmail.com" disabled />
        </div>
        <div class="acc-info">
          <h2 class="acc-label">Phone Number</h2>
          <input class="acc-number" value="09123456789" disabled />
        </div>
        <div class="acc-button-container">
          <input class="acc-cancel-button" type="button" value="Cancel" />
          <input class="acc-save-button" type="button" value="Save" />
        </div>
      </div>
      <div class="acc-select-image-container">
        <img class="account-image" src="/src/profile.png" />
        <h3 class="select-image-button">Select Image</h3>
      </div>
    </div>
  </div>

  <script src="/user/user.js"></script>
</body>

</html>