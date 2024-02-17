<?php

include("connection/connect.php");
include("includes/footer.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password']; // Corrected typo here

    $defaultProfilepic = "../pictures/profilepic.jpg";

    // Check if the user is registering as a seller or user
    if (isset($_POST['seller_register'])) {
        // Seller registration
        $sql = "INSERT INTO seller_account (name, surname, age, email, password, confirm_password,profile_img) 
                VALUES ('$name', '$surname', '$age', '$email', '$password', '$confirmPassword','$defaultProfilepic')";
    } else {
        // User registration
        $sql = "INSERT INTO user_account (name, surname, age, email, password, confirm_password,profile_img) 
                VALUES ('$name', '$surname', '$age', '$email', '$password', '$confirmPassword','$defaultProfilepic')";
    }

    mysqli_query($connect, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Registration Form</title>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <form action="register.php" method="post">
        <div class="row rounder-5 p-3 shadow box-area" id="backgroundInput">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="features-img mb-3">
                    <img src="img/pic2.jpg" class="img-fluid" style="width: 250px">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row align-items-center">
                    <h1> Create Your Account</h1>
                    <div class="input-items mb-3">
                        <input type="text" class="input form-control form-control-lg bg-light fs-6" placeholder="Name" id="Name" name="name" required>
                    </div>
                    <div class="input-items mb-3">
                        <input type="text" class="input form-control form-control-lg bg-light fs-6" placeholder="Surname" id="Surname" name="surname" required>
                    </div>
                    <div class="input-items mb-3">
                        <input type="text" class="input form-control form-control-lg bg-light fs-6" placeholder="Age" id="Age" name="age" required>
                    </div>
                    <div class="input-items mb-3">
                        <input type="email" class="input form-control form-control-lg bg-light fs-6" placeholder="Email" id="Email" name="email" required>
                    </div>
                    <div class="input-items mb-3">
                        <input type="password" class="input form-control form-control-lg bg-light fs-6" placeholder="Password" id="Password" name="password" required>
                    </div>
                    <div class="input-items mb-3">
                        <input type="password" class="input form-control form-control-lg bg-light fs-6" placeholder="Confirm Password" id="Confirm-Password" name="confirm_password" required>
                    </div>
                    <div class="input-items mb-3">
                        <label for="seller_register">Register as Seller</label>
                        <input type="checkbox" id="seller_register" name="seller_register">
                    </div>
                    <div class="buttons">
                        <div class="login-button mb-3">
                            <button class="btn btn-lg btn-primary" type="submit">Register</button>
                        </div>
                        <div class="sign-up mb-3">
                            <button class="btn btn-lg btn-primary" type="button" onclick="window.location.href='index.php'">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
