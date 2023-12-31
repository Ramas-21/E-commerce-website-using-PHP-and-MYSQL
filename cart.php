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
                            <a class="nav-link" href="./users_section/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php numberOfItemsInCart(); ?></sup></a>
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
                <a href="./users_section/user_login.php" class="nav-link">Login</a>
                </li>
            </ul>
        </nav>


        <div class="bg-light">
            <h3 class="text-center">Home's Store</h3>
            <p class="text-center">Offering the best and quality products. Shop with us today.</p>
        </div>

        <div class="container">
            <div class="row">
                <form action="#" method="post">
                    <table class="table table-bordered text-center">
                        <!--------- PHP CODE TO DISPLAY DYNAMIC DATA ------>
                        <?php
                        global $connect;
                        $get_ip_add = getIpAddress();
                        $total_price = 0;
                        $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($connect, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_products = "select * from `products` where product_id = '$product_id'";
                                $result_products = mysqli_query($connect, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)) {
                                    $productPrice = array($row_product_price['product_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $productName = $row_product_price['product_name'];
                                    $productImage1 = $row_product_price['product_image1'];
                                    $product_values = array_sum($productPrice);
                                    $total_price += $product_values;
                                }
                            }
                        } else {
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                        <tr>
                            <td><?php echo $productName ?></td>
                            <td><img src="./admin_section/product_images/<?php echo $productImage1 ?>" alt="#" class="cart_img"></td>
                            <td><input type="text" name="quantity" class="form-input w-50"></td>
                            <?php
                            $get_ip_add = getIpAddress();
                            if (isset($_POST['update_cart'])) {
                                $quantities = $_POST['quantity'];
                                $update_cart = "update `cart_details` set quantity = $quantities where ip_address = '$get_ip_add'";
                                $result_products_quantity = mysqli_query($connect, $update_cart);
                                $total_price = $total_price * $quantities;
                            }
                            ?>
                            <td><?php echo $price_table ?>/-</td>
                            <td><input type="checkbox" name="removeItem[]" value="<?php echo $product_id ?>"></td>
                            <td>
                                <input type="submit" value="Update cart" class="bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                                <input type="submit" value="Remove cart" class="bg-info px-3 py-2 border-0 mx-3" name="remove_cart">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="d-flex mb-5">
                        <?php
                        $get_ip_add = getIpAddress();
                        $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($connect, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>$total_price/-</strong></h4>
                            <input type='submit' value='continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                            <button class='bg-secondary p-3 py-2 border-0'><a href='./users_section/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                        } else {
                            echo "<input type='submit' value='continue shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php'),'_self'</script>";
                        }
                        ?>
                    </div>
            </div>
        </div>
        </form>

        <!------------ function to remove items ---------->
        <?php
        function remove_cart_item()
        {
            global $connect;
            if (isset($_POST['remove_cart'])) {
                foreach ($_POST['removeItem'] as $remove_id) {
                    echo $remove_id;
                    $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
                    $run_delete = mysqli_query($connect, $delete_query);
                    if ($run_delete) {
                        echo "<script>window.open('cart.php',_self)</script>";
                    }
                }
            }
        }
        echo $remove_item = remove_cart_item();
        ?>
        <!---------------------- footer ------------------>
        <?php include('./includes/footer.php') ?>
    </div>


    <!------- Bootstrap js link ------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>