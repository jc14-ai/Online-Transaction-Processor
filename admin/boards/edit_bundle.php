<?php
session_start();
include("../../site/backend/dbcon.php");

function isValid($bundle_name, $bundle_price, $bundle_status)
{
    if (!preg_match('/^[a-zA-Z ]+$/', $bundle_name) || !is_numeric($bundle_price) || $bundle_name === "" || $bundle_price === "") {
        return false;
    }
    return true;
}

$bundle_name = trim($_POST['bundle_name']);
$bundle_price = trim($_POST['bundle_price']);
$bundle_status = $_POST['bundle_status'];
// $bundle_size = $_POST['bundle_size'];
$old_bundle_id = $_POST['old-bundle-id'];
// $old_bundle_size_id = $_POST['old-bundle-size-id'];

if (isset($_POST['save-bundle-button']) && isValid($bundle_name, $bundle_price, $bundle_status)) {
    $bundle_exist_query = "SELECT * FROM bundles WHERE bundle_name = '$bundle_name' AND NOT bundle_id = $old_bundle_id;";
    $bundle_exist_query_run = mysqli_query($conn, $bundle_exist_query);

    if (mysqli_num_rows($bundle_exist_query_run) > 0) {
        $_SESSION['validity'] = "Bundle Already Exists.";
        header("location: /admin/boards/bundle.php");
        exit;
    }

    $target_dir = "../../src/";
    $imageName = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageName = basename($_FILES['image']['name']);
    } else {
        $imageName = basename($_POST['BundleImageSrc']);
    }
    $target_file = $target_dir . $imageName;

    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $bundle_update_query = "UPDATE bundles SET bundle_name = '$bundle_name', bundle_price = $bundle_price, status = '$bundle_status', image = '$imageName' WHERE bundle_id = $old_bundle_id;";
    $bundle_update_query_run = mysqli_query($conn, $bundle_update_query);
    header("location: /admin/boards/bundle.php");
    exit;
    // $bundle_id_query = "SELECT bundle_id FROM bundle WHERE bundle_name = '$bundle_name'";
    // $bundle_id_query_run = mysqli_query($conn, $bundle_id_query);

    // if (mysqli_num_rows($bundle_id_query_run) == 0) {
    //     $bundle_insert_query = "UPDATE bundle SET ";
    //     $bundle_insert_query = "INSERT INTO bundle(bundle_name, bundle_price, status) VALUES ('$bundle_name', $bundle_price, '$bundle_status');";
    //     $bundle_insert_query_run = mysqli_query($conn, $bundle_insert_query);

    //     $bundle_id_query = "SELECT bundle_id FROM bundle WHERE bundle_name = '$bundle_name'";
    //     $bundle_id_query_run = mysqli_query($conn, $bundle_id_query);
    // }

    // $bundle_id = mysqli_fetch_assoc($bundle_id_query_run);

    // $coffee_size_id_query = "SELECT coffee_size_id FROM coffee_size WHERE coffee_size = $kofai_size LIMIT 1;";
    // $coffee_size_id_query_run = mysqli_query($conn, $coffee_size_id_query);

    // $coffee_size_id = mysqli_fetch_assoc($coffee_size_id_query_run);

    // $query = "SELECT coffee_id, coffee_size_id FROM coffee_price WHERE coffee_id = " . $coffee_id['coffee_id'] . " AND coffee_size_id = " . $coffee_size_id['coffee_size_id'] . " AND NOT (coffee_id = $old_kofai_id AND coffee_size_id = $old_kofai_size_id);";
    // $query_run = mysqli_query($conn, $query);

    // if (mysqli_num_rows($query_run) > 0) {
    //     $_SESSION['validity'] = "bundle Already Exists.";
    //     header("location: /admin/boards/bundle.php");
    //     exit;
    // }
    // // echo $coffee_id['coffee_id'];
    // // echo $kofai_price;
    // // echo $kofai_status;
    // // echo $coffee_size_id['coffee_size_id'];
    // // echo $old_kofai_id;
    // // echo $old_kofai_size_id;
    // // exit;
    // $update_query = "UPDATE coffee_price SET coffee_id = " . $coffee_id['coffee_id'] . ", coffee_size_id = " . $coffee_size_id['coffee_size_id'] . ", coffee_price = $kofai_price, status = '$kofai_status' WHERE coffee_id = $old_kofai_id AND coffee_size_id = $old_kofai_size_id;";
    // $update_query_run = mysqli_query($conn, $update_query);
    // header("location: /admin/boards/bundle.php");
    // exit;
} else {
    $_SESSION['validity'] = "Invalid Input.";
    header("location: /admin/boards/bundle.php");
    exit;
}

?>