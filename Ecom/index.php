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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: Rs. <?php total_cart_price(); ?>/-</a>
                    </li>
                </ul>
                <form class="d-flex" action="search_product.php" role="search" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="Search" class="btn" style="background-color: #272343; color: #ffffff;" name="search_data_product">
                </form>
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

    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php
                getProducts();
                getUniqueCategories();
                //$ip = getIPAddress();  
                //echo 'User Real IP Address - '.$ip;
                ?>
                

            </div>

        </div>
        <div class="col-md-2 bg-secondary p-0">
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: #272343; color: #ffffff;">
                    <a href="#" class="nav-link"><h4><b>Categories</b></h4></a>
                </li>
                <?php
                getCategories();
                ?>
            </ul>
            
        </div>
        
    </div>
    <div class="p-3 text-center" style="background-color: #66bfbf; color: #272343;">
        <p>All Rights Reserved 2024</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
