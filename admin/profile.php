<?php
session_start();
include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

// Check if form is submitted for information update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $bio = $_POST["bio"];
    $id = $_SESSION['id'];

    // Update profile information in the database
    $sql = "UPDATE seller_account SET name = ?, email = ?, bio = ? WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $bio, $id);
    $stmt->execute();
    $stmt->close();

    if(isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
      $file = $_FILES['profilePicture'];
      $uploadDir = "../pictures/";
      $uploadFile = $uploadDir . basename($file['name']);
      move_uploaded_file($file['tmp_name'], $uploadFile);
      
      // Update profile picture path in the database
      $sql = "UPDATE seller_account SET profile_img = ? WHERE id = ?";
      $stmt = $connect->prepare($sql);
      $stmt->bind_param("si", $uploadFile, $id);
      $stmt->execute();
      $stmt->close();
  }
  
}

// Fetch user's profile information
$id = $_SESSION['id'];
$sql = "SELECT * FROM seller_account WHERE id = $id";
$query = mysqli_query($connect,$sql);
$call = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <title>Profile Update</title>
  
  <style>
    /* Styles for your HTML */

    .container{
      display:flex;
      font-size: 20px;
      border-radius:30px;
      border: 2px solid white;
      background-color: rgb(79, 118, 248);
    }

    .part2{
      width: ;
      margin-left: 115px;
      border:2px white;
      margin-top: 50px;
    }
    .part1{
      margin-top: 10px;
      border-radius: 30px;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
      <div class="part1">
      <div class="card p-2">
        <img src="<?php echo $call['profile_img']; ?>" class="card-img-top rounded-circle " alt="profile pic" style="height: 400px; width:400px; ">
  </div>

  <form action="profile.php" method="post" enctype="multipart/form-data">
    <!-- <label for="profilePicture">Select Profile Picture</label> -->
    <div class="input-group mb-3">
    <input type="file" class="form-control" id="profilePicture" name="profilePicture" accept="image/*" hidden>
    
    </div>
      </div>
      <div class="part2">
     
      <div class="input">
        <h4>Update Profile Information</h4>
        <label for="text">Name</label>
        <input type="text" class="form-control" name="name"  required value="<?php echo $call['name']; ?>">
        <label for="text">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email" required value="<?php echo $call['email']; ?>">
          <label for="text">Bio</label>
          <textarea class="form-control" name="bio" placeholder="Bio"><?php echo $call['bio']; ?></textarea><br>
          <label class="input-group-text btn btn-success" for="profilePicture">Change Profile Pic</label>
          <input type="submit" class="btn btn-primary" value="Update Information">
      </div>
    </form>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
