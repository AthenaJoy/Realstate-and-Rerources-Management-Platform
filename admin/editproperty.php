<?php
include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

// Check if property ID is provided in the URL
if(isset($_GET['id'])) {
    $property_id = $_GET['id'];
    
    // Retrieve property details from the database
    $sql = "SELECT * FROM propertylist WHERE id = $property_id";
    $query = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($query) > 0) {
        $property = mysqli_fetch_assoc($query);
        
        // Check if form is submitted
        if(isset($_POST['submit'])) {
            // Retrieve form data
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
            // Update the property details in the database
            $update_sql = "UPDATE propertylist SET title = '$title',description = '$description', type='$property_type' ,  stype='$transaction_type', bedroom   ='$bedrooms',bathroom='$bathrooms', balcony='$balconies', kitchen='$kitchen', hall='$hall',floor='$floor', size='$size', price = '$price', location='$location', city='$city',state='$state', agent='$agent', contact='$contact' WHERE id = $property_id";

            $update_query = mysqli_query($connect, $update_sql);
            
            if($update_query) {
                echo "<script>alert('Property details updated successfully!');</script>";
                // Redirect to the property listing page
                header("Location: building_management.php");
                exit();
            } else {
                echo "<script>alert('Failed to update property details.');</script>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles here */
        .property-section {
            
            border-radius: 10px;
            padding: 20px;
            width: 350px;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
       
        <form method="POST">
            <div class="row" style=" margin-top: -50px;">
                <div class="col-md-4">
                    <div class="property-section" >
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $property['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $property['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="property_type">Property Type:</label>
                            <input type="text" class="form-control" id="property_type" name="property_type" value="<?php echo $property['type']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="transaction_type">Transaction Type:</label>
                            <input type="text" class="form-control" id="transaction_type" name="transaction_type" value="<?php echo $property['stype']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="bedrooms">Bedrooms:</label>
                            <input type="text" class="form-control" id="bedrooms" name="bedrooms" value="<?php echo $property['bedroom']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="bathrooms">Bathrooms:</label>
                            <input type="text" class="form-control" id="bathrooms" name="bathrooms" value="<?php echo $property['bathroom']; ?>">
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="property-section">
                    
                        <div class="form-group">
                            <label for="balconies">Balconies:</label>
                            <input type="text" class="form-control" id="balconies" name="balconies" value="<?php echo $property['balcony']; ?>">
                        </div>
                    <div class="form-group">

                            <label for="kitchen">Kitchen:</label>
                            <input type="text" class="form-control" id="kitchen" name="kitchen" value="<?php echo $property['kitchen']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="hall">Hall:</label>
                            <input type="text" class="form-control" id="hall" name="hall" value="<?php echo $property['hall']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="floor">Floor:</label>
                            <input type="text" class="form-control" id="floor" name="floor" value="<?php echo $property['floor']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input type="text" class="form-control" id="size" name="size" value="<?php echo $property['size']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $property['price']; ?>">
                        </div>
                        

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="property-section">
                    
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" value="<?php echo $property['location']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $property['city']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="state">State:</label>
                            <input type="text" class="form-control" id="state" name="state" value="<?php echo $property['state']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="agent">Agent:</label>
                            <input type="text" class="form-control" id="agent" name="agent" value="<?php echo $property['agent']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $property['contact']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

<?php
    } else {
        echo "<p>Property not found.</p>";
    }
} else {
    echo "<p>Property ID not provided.</p>";
}
?>
