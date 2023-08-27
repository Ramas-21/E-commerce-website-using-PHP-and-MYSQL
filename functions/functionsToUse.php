<?php
include('./includes/connect.php');

function getProducts()
{

    global $connect;
    // condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $selectQuery = "SELECT * FROM `products` order by rand() LIMIT 0,9";
            $resultQuery = mysqli_query($connect, $selectQuery);

            while ($row = mysqli_fetch_assoc($resultQuery)) {
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $productDescription = $row['product_description'];
                $productImage1 = $row['product_image1'];
                $productImage2 = $row['product_image2'];
                $productImage3 = $row['product_image3'];
                $productPrice = $row['product_price'];
                $categoryId = $row['category_id'];
                $brandId = $row['brands_id'];

                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_section/product_images/$productImage1' class='card-img-top' alt='$productName'>
                        <div class='card-body'>
                            <h5 class='card-title'>$productName</h5>
                            <p class='card-text'>$productDescription</p>
                            <a href='index.php?add_to_cart=$productId' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$productId' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }
}

// getting all products
function get_all_products()
{
    global $connect;
    // condition to check isset or not
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $selectQuery = "SELECT * FROM `products` order by rand()";
            $resultQuery = mysqli_query($connect, $selectQuery);

            while ($row = mysqli_fetch_assoc($resultQuery)) {
                $productId = $row['product_id'];
                $productName = $row['product_name'];
                $productDescription = $row['product_description'];
                $productImage1 = $row['product_image1'];
                $productImage2 = $row['product_image2'];
                $productImage3 = $row['product_image3'];
                $productPrice = $row['product_price'];
                $categoryId = $row['category_id'];
                $brandId = $row['brands_id'];

                echo "
                <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin_section/product_images/$productImage1' class='card-img-top' alt='$productName'>
                        <div class='card-body'>
                            <h5 class='card-title'>$productName</h5>
                            <p class='card-text'>$productDescription</p>
                            <a href='index.php?add_to_cart=$productId' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$productId' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }
}

// getting unique categories
function getUniqueCategories()
{

    global $connect;
    // condition to check isset 
    if (isset($_GET['category'])) {
        $categoryId = $_GET['category'];
        $selectQuery = "SELECT * FROM `products` WHERE category_id=$categoryId";
        $resultQuery = mysqli_query($connect, $selectQuery);

        $number_of_rows = mysqli_num_rows($resultQuery);
        if ($number_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No stock for these category</h2>";
        }

        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $productId = $row['product_id'];
            $productName = $row['product_name'];
            $productDescription = $row['product_description'];
            $productImage1 = $row['product_image1'];
            $productImage2 = $row['product_image2'];
            $productImage3 = $row['product_image3'];
            $productPrice = $row['product_price'];
            $categoryId = $row['category_id'];
            $brandId = $row['brands_id'];

            echo "
            <div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_section/product_images/$productImage1' class='card-img-top' alt='$productName'>
                    <div class='card-body'>
                        <h5 class='card-title'>$productName</h5>
                        <p class='card-text'>$productDescription</p>
                        <a href='index.php?add_to_cart=$productId' class='btn btn-info'>Add to cart</a>
                        <a href='product_details.php?product_id=$productId' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
        }
    }
}

// getting unique brands
function getUniqueBrands()
{

    global $connect;
    // condition to check isset 
    if (isset($_GET['brand'])) {
        $brandId = $_GET['brand'];
        $selectQuery = "SELECT * FROM `products` WHERE brands_id=$brandId";
        $resultQuery = mysqli_query($connect, $selectQuery);

        $number_of_rows = mysqli_num_rows($resultQuery);
        if ($number_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>These brand is not available</h2>";
        }

        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $productId = $row['product_id'];
            $productName = $row['product_name'];
            $productDescription = $row['product_description'];
            $productImage1 = $row['product_image1'];
            $productImage2 = $row['product_image2'];
            $productImage3 = $row['product_image3'];
            $productPrice = $row['product_price'];
            $categoryId = $row['category_id'];
            $brandId = $row['brands_id'];

            echo "
            <div class='col-md-4 mb-2'>
                <div class='card'>
                    <img src='./admin_section/product_images/$productImage1' class='card-img-top' alt='$productName'>
                    <div class='card-body'>
                        <h5 class='card-title'>$productName</h5>
                        <p class='card-text'>$productDescription</p>
                        <a href='index.php?add_to_cart=$productId' class='btn btn-info'>Add to cart</a>
                        <a href='product_details.php?product_id=$productId' class='btn btn-secondary'>View More</a>
                    </div>
                </div>
            </div>";
        }
    }
}


function getBrands()
{
    global $connect;
    $selectBrands = "SELECT * FROM `brands`";
    $resultBrands = mysqli_query($connect, $selectBrands);

    while ($rowData = mysqli_fetch_assoc($resultBrands)) {
        $brandTitle = $rowData['brand_title'];
        $brandId = $rowData['brands_id'];
        echo "
        <li class='nav-item'>
            <a href='index.php?brand=$brandId' class='nav-link text-light'>$brandTitle</a>
        </li>";
    }
}

function getCategories()
{
    global $connect;
    $selectCategories = "SELECT * FROM `categories`";
    $resultCategory = mysqli_query($connect, $selectCategories);

    while ($rowData = mysqli_fetch_assoc($resultCategory)) {
        $categoryTitle = $rowData['category'];
        $categoryId = $rowData['category_id'];

        echo "
        <li class='nav-item'>
            <a href='index.php?category=$categoryId' class='nav-link text-light'>$categoryTitle</a>
        </li>";
    }
}

// searching products function 
function searchProducts()
{
    global $connect;
    if (isset($_GET['search_product_data'])) {
        $search_data = $_GET['search_data'];
        $searchQuery = "SELECT * FROM `products` WHERE product_keyword LIKE '%$search_data%'";
        $resultQuery = mysqli_query($connect, $searchQuery);

        $number_of_rows = mysqli_num_rows($resultQuery);
        if ($number_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No results that match.</h2>";
        }

        while ($row = mysqli_fetch_assoc($resultQuery)) {
            $productId = $row['product_id'];
            $productName = $row['product_name'];
            $productDescription = $row['product_description'];
            $productImage1 = $row['product_image1'];
            $productImage2 = $row['product_image2'];
            $productImage3 = $row['product_image3'];
            $productPrice = $row['product_price'];
            $categoryId = $row['category_id'];
            $brandId = $row['brands_id'];

            echo "
        <div class='col-md-4 mb-2'>
            <div class='card'>
                <img src='./admin_section/product_images/$productImage1' class='card-img-top' alt='$productName'>
                <div class='card-body'>
                    <h5 class='card-title'>$productName</h5>
                    <p class='card-text'>$productDescription</p>
                    <a href='index.php?add_to_cart=$productId' class='btn btn-info'>Add to cart</a>
                    <a href='product_details.php?product_id=$productId' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
        }
    }
}

// view more details function
function view_more_details()
{
    global $connect;
    // condition to check isset or not
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $productId = $_GET['product_id'];
                $selectQuery = "SELECT * FROM `products` WHERE product_id = $productId";
                $resultQuery = mysqli_query($connect, $selectQuery);

                while ($row = mysqli_fetch_assoc($resultQuery)) {
                    $productId = $row['product_id'];
                    $productName = $row['product_name'];
                    $productDescription = $row['product_description'];
                    $productImage1 = $row['product_image1'];
                    $productImage2 = $row['product_image2'];
                    $productImage3 = $row['product_image3'];
                    $productPrice = $row['product_price'];
                    $categoryId = $row['category_id'];
                    $brandId = $row['brands_id'];

                    echo "
                    <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_section/product_images/$productImage1' class='card-img-top' alt='$productName'>
                            <div class='card-body'>
                                <h5 class='card-title'>$productName</h5>
                                <p class='card-text'>$productDescription</p>
                                <a href='index.php?add_to_cart=$productId' class='btn btn-info'>Add to cart</a>
                                <a href='index.php' class='btn btn-secondary'>Home</a>
                            </div>
                        </div>
                    </div>

                    <div class='col-md-8'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h4 class='text-center text-info mb-5'>Related products</h4>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_section/product_images/$productImage2' class='card-img-top' alt='$productName'>
                                </div>
                                <div class='col-md-6'>
                                    <img src='./admin_section/product_images/$productImage3' class='card-img-top' alt='$productName'>
                                </div>
                            </div>
                    </div>";
                }
            }
        }
    }
}
function getIpAddress()
{
    // checking whether the ip is from the share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // whether ip si from the proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // whether ip is from the remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $connect;
        $ip = getIpAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip' AND product_id = $get_product_id";
        $resultQuery = mysqli_query($connect, $select_query);
        $number_of_rows = mysqli_num_rows($resultQuery);
        if ($number_of_rows > 0) {
            echo "<script>alert('These item already exists in your cart.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `cart_details` (product_id,ip_address,quantity) VALUES ($get_product_id,'$ip',0)";
            $resultQuery = mysqli_query($connect, $insert_query);
            echo "<script>alert('Successfully added to cart.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}
// function to get the number of items in the cart
function numberOfItemsInCart()
{
    if (isset($_GET['add_to_cart'])) {
        global $connect;
        $ip = getIpAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
        $resultQuery = mysqli_query($connect, $select_query);
        $count_cart_items = mysqli_num_rows($resultQuery);
    } else {
        global $connect;
        $ip = getIpAddress();
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
        $resultQuery = mysqli_query($connect, $select_query);
        $count_cart_items = mysqli_num_rows($resultQuery);
    }
    echo $count_cart_items;
}
