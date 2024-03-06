<!-- import_file.php -->

<?php
include("../connection/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_dir = "uploads/"; // Directory where you want to store uploaded files
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // File uploaded successfully, now you can handle the file import logic
        // For example, you can insert the file path into the database
        $file_id = $_POST['file_id']; // Assuming you have a field for file_id
        // Update the file path in the database
        $sql = "UPDATE file_list SET file = '$target_file' WHERE id = '$file_id'";
        if(mysqli_query($connforMyOnlineDb, $sql)) {
            echo "File imported successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connforMyOnlineDb);
        }
    } else {
        echo "Sorry, there was an error importing your file.";
    }
}
?>
