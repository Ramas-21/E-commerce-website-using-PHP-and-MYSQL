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
    <title>User login</title>
</head>

<style>
    body {
        overflow-x: hidden;
    }
</style>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="#" method="post">
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="user_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required name="user_password">
                    </div>
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="user_registration.php" class="text_danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if(isset($_POST['user_login'])){
    $user_name = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `users` WHERE username = '$user_name'";
    $result = mysqli_query($connect, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIpAddress();

    // cart item 
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
    $select_cart = mysqli_query($connect,$select_query_cart);
    $count_row_cart= mysqli_num_rows($select_cart);

    if($row_count > 0){
        if(password_verify($user_password,$row_data['user_password'])){
            //echo "<script>alert('You have Logged in successful.')</script>";
            if($row_count == 1 and $count_row_cart == 0){
                echo "<script>alert('You have Logged in successful.')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                echo "<script>alert('You have Logged in successful.')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid credentials.')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid credentials.')</script>";
    }
}
?>