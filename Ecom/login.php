<?php
$login=false;
$showError=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    include 'Template/_dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num == 1) {
        $login = true;
    } else {
        $showError = "Invalid Credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<style>
    body {
        background-image: url('');
        background-size: cover;
        background-position: center;
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
        color: #272343;
        font-weight: bold;
    }

    .btn-login {
        background-color: #66bfbf;
        border-color: #66bfbf;
        color: #272343;
    }

    .btn-login:hover {
        background-color: #0881a3;
        border-color: #0881a3;
        color: #eaf6f6;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h1><b>CONNECTIFY</b></h1>
                </div>
                <div class="card-body">
                    <form action="/Ecom/login.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-warning btn-login btn-block">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <small>Don't have an account? <a href="/Ecom/signup.php">Sign Up</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
if ($login) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Welcome to CONNECTIFY!</strong> You are logged in.
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

</body>
</html>
