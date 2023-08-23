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
    <title>E-commerce website</title>
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
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100/-</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="search_products.php" method="get">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_product_data">
                    </form>
                </div>
            </div>
        </nav>



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


        <div class="row px-1">
            <div class="col-md-10">
                <!---------- products ----------->
                <div class="row">
                    <div class="col-md-4">
                        <!------- image ----->
                        <div class='card'>
                            <img src='./images/istockphoto-1132357230-1024x1024.jpg' class='card-img-top' alt='$productName'>
                            <div class='card-body'>
                                <h5 class='card-title'>$productName</h5>
                                <p class='card-text'>$productDescription</p>
                                <a href='#' class='btn btn-info'>Add to cart</a>
                                <a href='product_details.php?product_id=$productId' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <!-------- related images -------->
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center text-info mb-5">Related products</h4>
                            </div>
                            <div class="col-md-6">
                                <img src='./images/istockphoto-1132357230-1024x1024.jpg' class='card-img-top' alt='$productName'>
                            </div>
                            <div class="col-md-6">
                                <img src='./images/istockphoto-1132357230-1024x1024.jpg' class='card-img-top' alt='$productName'>
                            </div>
                        </div>
                    </div>
                    <!----------- fetching products ------------->
                    <?php
                    view_more_details();
                    getUniqueCategories();
                    getUniqueBrands();
                    ?>
                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!---------sidenav--------------->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h6>Delivery Brands</h6>
                        </a>
                    </li>

                    <?php
                    getBrands();
                    ?>
                </ul>

                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h6>Categories</h6>
                        </a>
                    </li>

                    <?php
                    getCategories();
                    ?>
                </ul>
            </div>
        </div>










        <!---------------------- footer ------------------>
        <?php include('./includes/footer.php') ?>
    </div>


    <!------- Bootstrap js link ------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>