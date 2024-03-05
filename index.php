<?php
session_start();
include("connection/connect.php");
include("includes/footer.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $decide = $_POST['select'];

    if($decide == "seller"){
         // Check if the user is an admin or seller
    $admin_sql = "SELECT * FROM seller_account WHERE email = '$email' AND password = '$password'";
    $admin_query = mysqli_query($connect, $admin_sql);
    $admin_row = mysqli_fetch_assoc($admin_query);
    if ($admin_row) {
        // Redirect to seller dashboard

        $_SESSION['id'] = $admin_row['id'];

        header("Location: admin/homepage.php?");
        exit; // Make sure to exit after redirection
    }

    // If no matching user or admin/seller is found, redirect back to login page
    header("Location: index.php");
    exit; // Make sure to exit after redirection
    }else{

           // Check if the user is a regular user
    $user_sql = "SELECT * FROM user_account WHERE email = '$email' AND password = '$password'";
    $user_query = mysqli_query($connect, $user_sql);
    $user_row = mysqli_fetch_assoc($user_query);
    if ($user_row) {
        // Redirect to user dashboard
        $_SESSION['id'] = $user_row['id'];
        header("Location: user/dashboard.php");
        exit; // Make sure to exit after redirection
    }
    }
    

 

   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login Form</title>
    
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100" >
    

        

     <form action="index.php" method="post">

        <div class="row rounder-5 p-3  shadow box-area" id = "backgroundInput">

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box " >
                  <div class="features-img mb-3">
                    <img src="img/book.jpg"  class="img-fluid" style="width: 250px">
                  </div>
            </div>

            <div class="col-md-6">
                <div class="row align-items-center ">
                    <h4>Welcome to </h4>
                    <h3> Real State and Resources Management Platform</h3>
                    <div class="input-items mb-3">
                         

                            <input type="email" class="input form-control form-control-lg bg-light fs-6" placeholder="Email" id="Email" name="email" required >

                            
                            </div>
                            <div class="input-items mb-3" id = "buttons">
                                    <input type="password" class="input form-control form-control-lg bg-light fs-6" placeholder="Password" id="Password" name="password" required>
                                    
                                    </div>
                                    <div class="select">
                                    <select class="btn btn-primary" name="select" id="selectOption">
                                        <option value="seller">Seller</option>
                                        <option value="buyer">Buyer</option>
                                    </select>
                                    </div>

                                    <div class="buttons">
                                    <div class="login-button mb-3">
                                            <button class="btn btn-lg btn-primary "type="submit">Login</button>
                                        </div>

                                        <div class="sign-up mb-3">
                                        <button class="btn btn-lg btn-primary " type="button" onclick="window.location.href='register.php'">Sign up</button> 
                                        </div>
                                    </div>

                                   
                                        
                             </div>

            </div>

        </div>

    </form> 
    
</div>

</body>
</html>
