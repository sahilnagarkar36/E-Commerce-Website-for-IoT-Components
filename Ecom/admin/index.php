<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <style>
        .navbar-brand {
            color: #272343;
        }
        .admin_image {
            width: 100px;
            padding: 10px;
            object-fit: contain;
        }
    </style>
    <div class="container-fluid p-0">
    <nav class="navbar" style="background-color: #66bfbf;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/products/2.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                <b>CONNECTIFY</b></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2"><b>Manage Details</b></h3>
    </div>
    <div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="px-5">
            <a href="#"><img src="../assets/admin.png" alt="admin logo" class="admin_image"></a>
            <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center">
            <button class="my-3" style="background-color: #272343; color: #ffffff;"><a href="insert_products.php" class="nav-link my-1">Insert Products</a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">View Products</a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="index.php?insert_category" class="nav-link my-1">Insert Categories</a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">View Categories</a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="index.php?insert_manufacturer" class="nav-link my-1">Insert Manufacturers</a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">View Manufacturers</a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">All Orders  </a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">Payments   </a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">Users
            </a></button>
            <button style="background-color: #272343; color: #ffffff;"><a href="" class="nav-link my-1">Logout
            </a></button>
            
        </div>
        </div>
    </div>
    <div class="container my-3">
        <?php
        if (isset($_GET['insert_category'])){
            include('insert_categories.php');
        } 
        if (isset($_GET['insert_manufacturer'])){
            include('insert_manufacturers.php');
        } 
        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">      
</script>
</body>
</html>