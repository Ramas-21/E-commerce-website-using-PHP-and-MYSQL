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
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="user_username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" id="userEmail" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="userEmail">
                    </div>
                    <div class="form-outline">
                        <label for="user_image" class="form-label">image</label>
                        <input type="file" id="user_image" class="form-control" required name="user_image">
                    </div>
                    <div class="form-outline">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required name="user_password">
                    </div>
                    <div class="form-outline">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" class="form-control" placeholder="Confirm your username" autocomplete="off" required name="confirm_password">
                    </div>
                    <div class="form-outline">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required name="user_address">
                    </div>
                    <div class="form-outline">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact" autocomplete="off" required name="user_contact">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>