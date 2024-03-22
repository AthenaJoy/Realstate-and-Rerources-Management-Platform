<?php
session_start();
include("../connection/connect.php");
include("../includes/BookSeller_header.php");
include("../includes/footer.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_id = $_SESSION['id'];
    $file_id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $file = $_POST['file'];

    $sql = "INSERT INTO cotton_transaction (user_id,file_id,title,price,description,file) VALUES ('$user_id','$file_id','$title','$price','$description','$file')";
    mysqli_query($connforMyOnlineDb, $sql);

    header("Location: userfilelist.php");
}

// Check if property ID is provided in the URL
if (isset($_GET['id'])) {
    $file_id = $_GET['id'];
}
    // Retrieve property details from the database
    $sql = "SELECT * FROM file_list WHERE id = $file_id";
    $query = mysqli_query($connforMyOnlineDb, $sql);

    if (mysqli_num_rows($query) > 0) {
        $file = mysqli_fetch_assoc($query);
?>

        
<form action = "buyFile.php" method = "post">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <img src='../img/filePic.jpg' style="width: 400px; height: 400px;">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $file['title']; ?></h2>
                    <table class="table table-bordered table-hover table-striped " style=" box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);">
                        <tbody>
                            <tr>
                                <th scope="row">Description</th>
                                <td><?php echo $file['description']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Price</th>
                                <td>$<?php echo $file['price']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">File</th>
                                <td><?php echo $file['file']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Rate</th>
                                <td><?php echo $file['rate']; ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                    </svg>
                                </td>
                            </tr>
                            <!-- Add more rows for other property details -->
                        </tbody>
                    </table>
                    <div class="sec2">
                        <!-- Add the Buy button -->
                      
                            <input type="hidden" name="id" value="<?php echo $file['id']; ?>">
                            <input type="hidden" name="title" value="<?php echo $file['title']; ?>">
                            <input type="hidden" name="price" value="<?php echo $file['price']; ?>">
                            <input type="hidden" name="description" value="<?php echo $file['description']; ?>">
                            <input type="hidden" name="file" value="<?php echo $file['file']; ?>">
                            <input type="submit" class="btn btn-success" value = "BUY">
                        
                    </div>
                </div>
            </div>
        </div>

        </form>

<?php
    } else {
        echo "<p>Property not found.</p>";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
</body>
</html>
