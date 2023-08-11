<?php
include('./includes/connect.php');
function getProducts()
{
    global $connect;
    $select_query = "SELECT * FROM `products` order by rand() LIMIT 0,9";
    $result_query = mysqli_query($connect, $select_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brands_id'];

        echo "
        <div class='col-md-4 mb-2'>
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
}
