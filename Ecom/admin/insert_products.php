<?php
include('../Template/_dbconnect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_manufacturer=$_POST['product_manufacturer'];
    $product_price=$_POST['product_price'];
    $product_status='true';


    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $description=='' or $product_keywords=='' or $product_category=='' or $product_manufacturer=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('All fields are necessary.')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        $insert_products="Insert into `products` (product_title, product_description, product_keywords, category_id, manufacturer_id, product_image1, product_image2, product_image3, product_price, date, status) values ('$product_title', '$description', '$product_keywords', '$product_category', '$product_manufacturer', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";
        $result_query=mysqli_query($conn,$insert_products);
        if($result_query){
            echo "<script>alert('Products successfully inserted.')</script>"; 
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard-Insert Products</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">      
    </script>
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

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center"><b>Insert Product</b></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($conn, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_tile=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_tile</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_manufacturer" id="" class="form-select">
                    <option value="">Select Manufacturer</option>
                    <?php
                        $select_query="Select * from `manufacturers`";
                        $result_query=mysqli_query($conn, $select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $manufacturer_name=$row['manufacturer_name'];
                            $manufacturer_id=$row['manufacturer_id'];
                            echo "<option value='$manufacturer_id'>$manufacturer_name</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn mb-3 px-3" style="background-color: #272343; color: #ffffff;" value="Insert Product">
            </div>
        </form>
    </div>
    
</body>
</html>