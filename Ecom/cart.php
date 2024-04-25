<?php
include('Template/_dbconnect.php');
include('functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONNECTIFY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
       .card-img-top{
        width: 100%;
        height: 200px;
        object-fit: contain;
       } 
       .blog{
        width: 100%;
        height: 20px;
        object-fit: contain;
       }
       .cart_img{
        width: 50px;
        height: 50px;
        object-fit: contain;
        }
        .empty_cart{
        margin-left: auto;
        margin-right: auto;
        width: 30%;
        display: block; 
        }
    </style>
    <header id="header">
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-rale font-size-12 text-black-50 m-0">Connect to CONNECTIFY</p>
            <div class="font-rale font-size-14">
                <a href="#" class="px-3 border-right border-left text-dark">Welcome Guest</a>
                <a href="/Ecom/login.php" class="px-3 border-right border-left text-dark">Login/Sign Up</a>
                <a href="#" class="px-3 border-right text-dark">Wishlist (0)</a>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg" style="background-color: #66bfbf; color: #272343;">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: #272343" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs.php">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart<i class="fa-solid fa-cart-shopping"></i><sup><?php item_number();?></sup></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    cart();
    ?>
    <div class="bg-light">
        <h3 class="text-center my-3"><b>CONNECTIFY</b></h3>
        <p class="text-center">Connect and Connect</p>
    </div>
       <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
                
                <tbody>
                    <?php
                     $ip = getIPAddress();
                     $total_price=0;
                     $cart_query="Select * from `cart_details` where ip_address='$ip'";
                     $result=mysqli_query($conn, $cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";
                     while($row=mysqli_fetch_array($result)){
                         $product_id=$row['product_id'];
                         $select_products="Select * from `products` where product_id=$product_id";
                         $result_products=mysqli_query($conn,$select_products);
                         while($row_product_price=mysqli_fetch_array($result_products)){
                             $product_price=array($row_product_price['product_price']);
                             $price_table=$row_product_price['product_price'];
                             $product_title=$row_product_price['product_title'];
                             $product_image1=$row_product_price['product_image1'];
                             $product_values=array_sum($product_price);
                             $total_price+=$product_values;
                         
                    ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./admin/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-control w-50"></td>
                        <?php
                        $ip = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantity=$_POST['qty'];
                            $update_cart="Update `cart_details` set quantity=$quantity where ip_address='$ip'";
                            $result_products_quantity=mysqli_query($conn,$update_cart);
                            $total_price=$total_price*$quantity;
                        }
                        ?>
                        <td>Rs. <?php echo $price_table ?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                        <td>
                            <input type="submit" value="Update Cart" class="mb-2 px-2" style="background-color: #272343; color: #ffffff;" name="update_cart">
                            <!--<button class="mb-2 px-2" style="background-color: #272343; color: #ffffff;">Remove</button>-->
                            <input type="submit" value="Remove" class="mb-2 px-2" style="background-color: #272343; color: #ffffff;" name="remove">
                        </td>
                    </tr>
                    <?php
                    }
                }}
                else{
                    echo "<img src='./admin/empty_cart.png' class='empty_cart'></img><h2 class='text-center text-danger'><b>Cart is empty.</b></h2>";
                }
                    ?>
                </tbody>
            </table>
            <div class="d-flex mb-3">
                <?php
                $ip = getIPAddress();
                $cart_query="Select * from `cart_details` where ip_address='$ip'";
                $result=mysqli_query($conn, $cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                    echo "<h4 class='px-3'>Subtotal: <strong>Rs. $total_price/-</strong></h4>
                    <input type='submit' value='Continue Shopping' class='m-2 px-2' style='background-color: #272343; color: #ffffff;' name='continue_shopping'>
                <a href='#'><button class='p-2 m-2 bg-secondary text-light border-0'>Checkout</button></a>";
                } else {
                    echo "<input type='submit' value='Continue Shopping' class='p-2 m-2' style='background-color: #272343; color: #ffffff;' name='continue_shopping'>";
                }
                if (isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php', '_self')</script>";
                }
                ?>
            </div>
        </div>
       </div>
       </form>

       <?php
            function removeCartItem(){
                global $conn;
                if(isset($_POST['remove'])){
                    foreach($_POST['removeitem'] as $remove_id){
                        echo $remove_id;
                        $delete_query="Delete from `cart_details` where product_id=$remove_id";
                        $run_delete=mysqli_query($conn,$delete_query);
                        if($run_delete){
                            echo "<script>window.open('cart.php', '_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item=removeCartItem();



        ?>
    
    <div class="p-3 text-center" style="background-color: #66bfbf; color: #272343;">
        <p>All Rights Reserved 2024</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
