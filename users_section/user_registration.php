<?php
include('../includes/connect.php');
include('../functions/functionsToUse.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!------- Bootstrap css links ---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!------- font awesome link ------>
    <title>User registration</title>
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Register</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" id="userEmail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">image</label>
                        <input type="file" id="user_image" class="form-control" required name="user_image">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required name="user_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm your username" autocomplete="off" required name="confirm_password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required name="user_address">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required name="user_mobile">
                    </div>
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="user_login.php" class="text_danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['user_register'])) {
    $user_name = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_address = $_POST['user_address'];
    $user_mobile = $_POST['user_mobile'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIpAddress();

    // select query
    $select_query = "SELECT * FROM `users` WHERE username = '$user_name'";
    // insert query
    $insert_query = "INSERT INTO `users`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile) VALUES ('$user_name','$user_email','$user_password','$user_image','$user_ip','$user_address','$user_mobile')";
    $execute = mysqli_query($connect, $insert_query);
    move_uploaded_file($user_image_temp, "./user_images/$user_image");
    if($execute){
        echo "<script>alert('Data inserted successfully')</script>";
    }
    else {
        die(mysqli_error($connect));
    }
}
?>