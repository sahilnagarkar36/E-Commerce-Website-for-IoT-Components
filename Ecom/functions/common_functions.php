<?php
include('./Template/_dbconnect.php');

function getProducts(){
    global $conn;
    if(!isset($_GET['category'])){
        if(!isset($_GET['manufacturers'])){
    $select_query="Select * from `products` order by rand() LIMIT 0, 9";
                $result_query=mysqli_query($conn, $select_query);
                //$row=mysqli_fetch_assoc($result_query);
                //echo $row['product_title'];
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $manufacturer_id=$row['manufacturer_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: Rs. $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color: #272343; color: #ffffff;'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary my-2'>View More</a>
                            </div>
                    </div>
                </div>";
                }
}
}
}

function getUniqueCategories(){
    global $conn;
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="Select * from `products` where category_id=$category_id";
                $result_query=mysqli_query($conn, $select_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No stock available for this category.</h2>";
                }
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $manufacturer_id=$row['manufacturer_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: Rs. $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color: #272343; color: #ffffff;'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary my-2'>View More</a>
                            </div>
                    </div>
                </div>";
}
}
}


function getCategories(){
    global $conn;
    $select_categories="Select * from `categories`";
                $result_categories=mysqli_query($conn, $select_categories);
                while($row_data=mysqli_fetch_assoc($result_categories)){
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo "<li class='nav-item' style='color: #ffffff;'>
                    <a href='index.php?category=$category_id' class='nav-link'>$category_title</a>
                </li>";
                }
}

        function searchProduct(){
            global $conn;
            if(isset($_GET['search_data_product'])){
                $search_data_value=$_GET['search_data'];
                $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
                $result_query=mysqli_query($conn, $search_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0){
                    echo "<h2 class='text-center text-danger'>No products related to your search.</h2>";
                }
                //$row=mysqli_fetch_assoc($result_query);
                //echo $row['product_title'];
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $manufacturer_id=$row['manufacturer_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: Rs. $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color: #272343; color: #ffffff;'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary my-2'>View More</a>
                            </div>
                    </div>
                </div>";
}
}
}

function getAllProducts(){
    global $conn;
    if(!isset($_GET['category'])){
        if(!isset($_GET['manufacturers'])){
    $select_query="Select * from `products` order by rand()";
                $result_query=mysqli_query($conn, $select_query);
                //$row=mysqli_fetch_assoc($result_query);
                //echo $row['product_title'];
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $manufacturer_id=$row['manufacturer_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: Rs. $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color: #272343; color: #ffffff;'>Add to Cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary my-2'>View More</a>
                            </div>
                    </div>
                </div>";
}
}
}
}

function viewDetails(){
    global $conn;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['manufacturers'])){
            $product_id=$_GET['product_id'];
    $select_query="Select * from `products` where product_id= $product_id";
                $result_query=mysqli_query($conn, $select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_price=$row['product_price'];
                    $category_id=$row['category_id'];
                    $manufacturer_id=$row['manufacturer_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price: Rs. $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary' style='background-color: #272343; color: #ffffff;'>Add to Cart</a>
                            <a href='index.php' class='btn btn-secondary my-2'>Go Home</a>
                            </div>
                    </div>
                </div>
                
                <div class='col-md-8'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center mb-5' style='color: #272343;'><b>Product Details</b></h4>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>   
                        </div>
                    </div>
                </div>";
                }
}
}
}
}

function getIPAddress() {   
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }    
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }   
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
 

function cart(){
if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$get_product_id";
    $result_query=mysqli_query($conn, $select_query);
    $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows>0){
                    echo "<script>alert('Item is already present in cart.')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
}else{
    $insert_query="Insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id, '$ip', 0)";
    $result_query=mysqli_query($conn, $insert_query);
    echo "<script>alert('Item added to cart.')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}
}
}

function item_number(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $ip = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn, $select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }else{
        global $conn;
        $ip = getIPAddress();
        $select_query="Select * from `cart_details` where ip_address='$ip'";
        $result_query=mysqli_query($conn, $select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
    }

    function total_cart_price(){
        global $conn;
        $ip = getIPAddress();
        $total_price=0;
        $cart_query="Select * from `cart_details` where ip_address='$ip'";
        $result=mysqli_query($conn, $cart_query);
        while($row=mysqli_fetch_array($result)){
            $product_id=$row['product_id'];
            $select_products="Select * from `products` where product_id=$product_id";
            $result_products=mysqli_query($conn,  $select_products);
            while($row_product_price=mysqli_fetch_array($result_products)){
                $product_price=array($row_product_price['product_price']);
                $product_values=array_sum($product_price);
                $total_price+=$product_values;
            }
        }
        echo $total_price;
    }
?>