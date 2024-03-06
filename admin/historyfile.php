<?php
include("../connection/connect.php");
include("../includes/Bookseller_header.php");
include("../includes/footer.php");

// Retrieve file details from the database
$sql = "SELECT * FROM file_list";
$query = mysqli_query($connforMyOnlineDb, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File List Management</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">File List Management</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Loop through each file record and display its details
                while($file = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>".$file['title']."</td>";
                    echo "<td>".$file['description']."</td>";
                    echo "<td>".$file['price']."</td>";
                    echo "<td><a href='".$file['file']."' target='_blank'>".$file['file']."</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
