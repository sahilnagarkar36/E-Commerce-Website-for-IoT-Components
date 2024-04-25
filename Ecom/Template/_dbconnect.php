<?php
$server = "localhost";
$email = "root";
$password = "";
$database = "ecomweb";

$conn = mysqli_connect($server, $email, $password, $database);
if (!$conn) {
    //echo "success";
//} else {
    die ("Error". mysqli_connect_error());
}
?>


