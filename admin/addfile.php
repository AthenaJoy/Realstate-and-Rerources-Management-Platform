<?php
include("../connection/connect.php");
include("../includes/Bookseller_header.php");
include("../includes/footer.php");

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    // Directory where you want to store uploaded files
    $target_dir = "../file/";

    // Create the directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0755, true); // Create directory with 0755 permissions
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $file_tmp = $_FILES["file"]["tmp_name"]; // Temporary location of the file

    if (move_uploaded_file($file_tmp, $target_file)) {
        // File uploaded successfully, now you can insert the file path into the database
        $title = $_POST['title']; // Assuming you have a field for title
        $des = $_POST['description'];
        $price = $_POST['price']; // Assuming you have a field for price
        
        // Insert the file details into the database
        $sql = "INSERT INTO file_list (title, description, price, file) VALUES ('$title', '$des', '$price', '$target_file')";
        if(mysqli_query($connforMyOnlineDb, $sql)) {
            echo "File uploaded successfully and added to the database.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connforMyOnlineDb);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Display the uploaded file
$sql = "SELECT * FROM file_list ORDER BY id DESC LIMIT 1"; // Assuming your table has an 'id' field
$result = mysqli_query($connforMyOnlineDb, $sql);

if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $file_path = $row['file'];
    echo '<img src="' . $file_path . '" alt="Uploaded File">';
} else {
    echo "No file uploaded yet.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add File</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center">Add File</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Choose File:</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
