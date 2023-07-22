<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // Select data from the database
    $select_query = "SELECT * FROM `brands` WHERE brand_title = '$brand_title'";
    $result_select = mysqli_query($connect, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This brand already exists')</script>";
    } else {
        $insert_query = "INSERT INTO `brands` (brand_title) VALUES('$brand_title')";
        $result = mysqli_query($connect, $insert_query);
        if ($result) {
            echo "<script>alert('Brand has been inserted successfully')</script>";
        }
    }
}
?>
<form action="#" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands">
    </div>
</form>