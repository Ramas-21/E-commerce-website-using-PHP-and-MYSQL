<?php
include('./includes/connect.php');

function getProducts(){

    global $connect;
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
                    <a href='#' class='btn btn-info'>Add to cart</a>
                    <a href='#' class='btn btn-secondary'>View More</a>
                </div>
            </div>
        </div>";
    }
}

function getBrands(){
    global $connect;
    $selectBrands = "SELECT * FROM `brands`";
    $resultBrands = mysqli_query($connect, $selectBrands);

    while($rowData = mysqli_fetch_assoc($resultBrands)){
        $brandTitle = $rowData['brand_title'];
        $brandId = $rowData['brands_id'];
        echo "
        <li class='nav-item'>
            <a href='index.php?brand=$brandId' class='nav-link text-light'>$brandTitle</a>
        </li>";
    }
}
?>