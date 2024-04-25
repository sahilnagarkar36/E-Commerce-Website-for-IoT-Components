<?php
include('../Template/_dbconnect.php');
if(isset($_POST['insert_manufacturer'])){
    $manufacturer_name=$_POST['manufacturer_name'];

    $select_query="Select * from `manufacturers` where manufacturer_name='$manufacturer_name'";
    $result_select=mysqli_query($conn, $select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('Manufacturer is already present.')</script>"; 
    } else{
    $insert_query="Insert into `manufacturers` (manufacturer_name) values ('$manufacturer_name')";
    $result=mysqli_query($conn, $insert_query);
    if ($result){
        echo "<script>alert('Manufacturer has been inserted successfully.')</script>";
    }
}}
?>
<h2 class="text-center"><b>Insert Manufacturers</b></h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" style="background-color: #272343" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="manufacturer_name" placeholder="Insert Manufacturers" aria-label="Manufacturers" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="border-0 p-2 my-3" name="insert_manufacturer" value="Insert Manufacturers"  aria-describedby="basic-addon1" style="background-color: #272343; color: #ffffff;">
    </div>
</form>