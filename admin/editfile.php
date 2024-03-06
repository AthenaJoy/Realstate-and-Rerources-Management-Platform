<?php
include("../connection/connect.php");
include("../includes/BookSeller_header.php");
include("../includes/footer.php");

// Check if property ID is provided in the URL
if(isset($_GET['id'])) {
    $file_list = $_GET['id'];
    
    // Retrieve property details from the database
    $sql = "SELECT * FROM file_list WHERE id = $file_list";
    $query = mysqli_query($connforMyOnlineDb, $sql);
    
    if(mysqli_num_rows($query) > 0) {
        $property = mysqli_fetch_assoc($query);
        
        // Check if form is submitted
        if(isset($_POST['submit'])) {
            // Retrieve form data
            $title = $_POST["title"];
            $description = $_POST["description"];
            $price = $_POST["price"];
            // Update the property details in the database
            $update_sql = "UPDATE file_list SET title = '$title', description = '$description', price = '$price' WHERE id = $file_list";

            $update_query = mysqli_query($connforMyOnlineDb, $update_sql);
            
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
            <div class="row" style="margin-top: -50px;">
                <div class="col-md-6 offset-md-3">
                    <div class="property-section">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $property['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $property['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $property['price']; ?>">
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
