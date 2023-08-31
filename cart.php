<?php
include('includes/connect.php');
include('./functions/functionsToUse.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!------- Bootstrap css links ---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!------- font awesome link ------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--------- navbar -------->
    <div class="container-fluid p-0">
        <!------first child---->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/istockphoto-1437990859-1024x1024.jpg" alt="#" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php numberOfItemsInCart();?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        cart();
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Welcome Guest</a>
                </li>
                <li class="nav-item"></li>
                <a href="#" class="nav-link">Login</a>
                </li>
            </ul>
        </nav>


        <div class="bg-light">
            <h3 class="text-center">Home's Store</h3>
            <p class="text-center">Offering the best and quality products. Shop with us today.</p>
        </div>

        <div class="container">
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Shoe</td>
                            <td><img src="./images/istockphoto-1132357230-1024x1024.jpg" alt="#"></td>
                            <td><input type="text"></td>
                            <td><input type="checkbox"></td>
                            <td>
                                <p>Update</p>
                                <p>Remove</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex">
                    <h4 class="px-3">Subtotal:<strong class="text-info">5000/-</strong></h4>
                    <a href="index.php"><button class="bg-info px-3 border-0">Continue shopping</button></a>
                </div>
            </div>
        </div>
        <!---------------------- footer ------------------>
        <?php include('./includes/footer.php') ?>
    </div>


    <!------- Bootstrap js link ------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>