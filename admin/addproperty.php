<?php
include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Prepare the SQL statement
    $stmt = $connforMyOnlineDb->prepare("INSERT INTO propertylist (title, description, type, stype, bedroom, bathroom, balcony, kitchen, hall, floor, size, price, location, city, state,agent,contact,image1) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");

    // Set parameters from form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $property_type = $_POST["property_type"];
    $transaction_type = $_POST["transaction_type"];
    $bedrooms = $_POST["bedrooms"];
    $bathrooms = $_POST["bathrooms"];
    $balconies = $_POST["balconies"];
    $kitchen = $_POST["kitchen"];
    $hall = $_POST["hall"];
    $floor = $_POST["floor"];
    $size = $_POST["size"];
    $price = $_POST["price"];
    $location = $_POST["location"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $agent = $_POST["agent"];
    $contact = $_POST["contact"];
    $pic = "../pictures/".$_POST["pic"];

    // Bind parameters to the statement
    $stmt->bind_param("ssssiiiiisssssssis", $title, $description, $property_type, $transaction_type, $bedrooms, $bathrooms, $balconies, $kitchen, $hall, $floor, $size, $price, $location, $city, $state,$agent,$contact,$pic);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Property added successfully!');window.location.href='building_management.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles here */

        .container{
            margin-top: 10px;
            font-size: 17px;
            border:2px solid 

            rgb(79, 118, 248);
            border-radius:30px;
            width: 100%; /* fixed width */
        }
    </style>
</head>
<body>
<div class="container">
    <form action="addproperty.php" method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="part1">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="property_type">Property Type:</label>
                        <input type="text" class="form-control" id="property_type" name="property_type">
                    </div>
                    <div class="form-group">
                        <label for="transaction_type">Transaction Type:</label>
                        <input type="text" class="form-control" id="transaction_type" name="transaction_type">
                    </div>
                    <div class="form-group">
                        <label for="bedrooms">Bedrooms:</label>
                        <input type="number" class="form-control" id="bedrooms" name="bedrooms" min="0">
                    </div>
                    <div class="form-group">
                        <label for="bathrooms">Bathrooms:</label>
                        <input type="number" class="form-control" id="bathrooms" name="bathrooms" min="0">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="part2">
                    <div class="form-group">
                        <label for="balconies">Balconies:</label>
                        <input type="number" class="form-control" id="balconies" name="balconies" min="0">
                    </div>
                    <div class="form-group">
                        <label for="kitchen">Kitchens:</label>
                        <input type="number" class="form-control" id="kitchen" name="kitchen" min="0">
                    </div>
                    <div class="form-group">
                        <label for="hall">Halls:</label>
                        <input type="number" class="form-control" id="hall" name="hall" min="0">
                    </div>
                    <div class="form-group">
                        <label for="floor">Floor:</label>
                        <input type="text" class="form-control" id="floor" name="floor">
                    </div>
                    <div class="form-group">
                        <label for="size">Size:</label>
                        <input type="text" class="form-control" id="size" name="size">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="part3">
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="state" name="state">
                    </div>

                    <div class="form-group">
                        <label for="agent">Agent:</label>
                        <input type="text" class="form-control" id="agent" name="agent">
                    </div>
                    
                    <div class="form-group">
                        <label for="contact">Contact:</label>
                        <input type="text" class="form-control" id="contact" name="contact">
                    </div>

                    <div class="form-group">
                        <label for="state">Picture of the building:</label>
                        <input type="file" class="form-control" id="state" name="pic">
                    </div>
                    
                    
                    <input type="submit" class="btn btn-primary" value = "Add Property">
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Bootstrap JS and jQuery (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
