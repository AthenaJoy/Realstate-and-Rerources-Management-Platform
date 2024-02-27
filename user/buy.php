<?php
// Include necessary files and establish database connection
include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if(isset($_POST["property_id"]) && isset($_POST["quantity"]) && !empty($_POST["property_id"]) && !empty($_POST["quantity"])) {
        // Handle form submission
        $property_id = $_POST["property_id"];
        $quantity = $_POST["quantity"];

        // Display a confirmation message
        echo "<script>alert('Purchase of $quantity unit(s) of property with ID $property_id was successful.');</script>";
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}
?>
