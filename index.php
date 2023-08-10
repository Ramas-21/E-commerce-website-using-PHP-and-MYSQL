<?php
include('includes/connect.php');
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
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
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
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


        <div class="row px-3">
            <div class="col-md-10">
                <!---------- products ----------->
                <div class="row">
                    <!----------- fetching products ------------->
                    <?php
                    $select_query = "SELECT * FROM `products`";
                    $result_query = mysqli_query($connect, $select_query);
                    // $row = mysqli_fetch_assoc($result_query);
                    // echo $row['product_name'];
                    while($row = mysqli_fetch_assoc($result_query)){
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_image2 = $row['product_image2'];
                        $product_image3 = $row['product_image3'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brands_id'];

                        /* After copy pasting the code for card in the echo statement 
                        replace the double quotes with single quotes
                        */
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_section/product_images/$product_image1' class='card-img-top' alt='$product_name'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_name</h5>
                                <p class='card-text'>$product_description</p>
                                <a href='#' class='btn btn-info'>Add to cart</a>
                                <a href='#' class='btn btn-secondary'>View More</a>
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                    <!----------------------
                    <div class="col-md-4 mb-2">
                        <div class="card">
                            <img src="./images/istockphoto-1132357230-1024x1024.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to cart</a>
                                <a href="#" class="btn btn-secondary">View More</a>
                            </div>
                        </div>
                    </div>
                    ------------------------------->
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
                    $select_brands = "SELECT * FROM `brands`";
                    $result_brands = mysqli_query($connect, $select_brands);
                    // $row_data = mysqli_fetch_assoc($result_brands);
                    // echo $row_data['brand_title'];
                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brands_id'];
                        echo " <li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    }
                    ?>
                </ul>

                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h6>Categories</h6>
                        </a>
                    </li>

                    <?php
                    $select_categories = "SELECT * FROM `categories`";
                    $result_categories = mysqli_query($connect, $select_categories);
                    // $row_data = mysqli_fetch_assoc($result_brands);
                    // echo $row_data['brand_title'];
                    while ($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $row_data['category'];
                        $category_id = $row_data['category_id'];
                        echo " <li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>










        <!---------------------- footer ------------------>
        <div class="bg-info p-3 text-center">
            <p>All rights reserved | Designed by Lawrence-2023</p>
        </div>
    </div>


    <!------- Bootstrap js link ------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>