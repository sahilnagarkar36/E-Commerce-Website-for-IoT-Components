<?php
$showAlert=false;
$showError=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
include 'Template/_dbconnect.php';
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$exists=false;
if (($password == $cpassword) && $exists==false) {
    $sql = "INSERT INTO `user` (`email`, `password`, `dt`) VALUES ('$email', '$password', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert=true;
    }
  } else {
    $showError = "Passwords do not match.";
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 50px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .card-header {
            background-color: #66bfbf;
            text-align: center;
            color: #eaf6f6;
            font-weight: bold;
        }

        .btn-signup {
            background-color: #66bfbf;
            border-color: #66bfbf;
            color: #eaf6f6;
        }

        .btn-signup:hover {
            background-color: #0881a3;
            border-color: #0881a3;
            color: #eaf6f6;
        }
    </style>
</head>
<body>
<div class="container my-4">
    <h1 class='text-center'>CONNECTIFY</h1>
    <?php
    if ($showAlert) {
      echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> Your account is created and you can login.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    if ($showError) {
      echo '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> '. $showError.'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <form action="/Ecom/signup.php" method="post">
  <div class="mb-3 col-md-4">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 col-md-4">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="mb-3 col-md-4">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="emailHelp" class="form-text">Make sure you enter the same password.</div>
  </div>
  <button type="submit" class="btn btn-warning">Sign Up</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>