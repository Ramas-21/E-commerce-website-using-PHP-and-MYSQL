<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['category'];

    // Select data from the database
    $select_query = "SELECT * FROM `categories` WHERE category = '$category_title'";
    $result_select = mysqli_query($connect, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category already exists')</script>";
    } else {
        $insert_query = "INSERT INTO `categories` (category) VALUES('$category_title')";
        $result = mysqli_query($connect, $insert_query);
        if ($result) {
            echo "<script>alert('Category has been inserted successfully')</script>";
        }
    }
}
?>

<form action="#" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category" placeholder="Insert categories">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories">
    </div>
</form>