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

        // Retrieve property details from the propertylist table
        $sql_property = "SELECT title, price FROM propertylist WHERE id = $property_id";
        $result_property = mysqli_query($connect, $sql_property);
        
        // Check if the property details were retrieved successfully
        if($result_property && mysqli_num_rows($result_property) > 0) {
            $row_property = mysqli_fetch_assoc($result_property);
            $property_name = $row_property['title'];
            $property_price = $row_property['price'];

            // Save to buy history (for demonstration, you might use a database instead)
            $sql = "INSERT INTO buy_history (property_name, price) VALUES ('$property_name', $property_price)";
            $query = mysqli_query($connect, $sql);
            
            // Check if the query was successful
            if($query) {
                echo "<script>alert('Purchase recorded successfully.');</script>";
            } else {
                echo "<script>alert('Failed to record purchase.');</script>";
            }
        } else {
            echo "<script>alert('Failed to retrieve property details.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy History</title>
    <!-- Add any additional CSS styles if needed -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Buy History</h1>

    <!-- Display buy history data in a table -->
    <table>
        <tr>
            <th>ID</th>
            <th>Property Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Purchase Date</th>
        </tr>
        <?php
        // Retrieve buy history data from the database
        $sql = "SELECT * FROM buy_history";
        $query = mysqli_query($connect, $sql);
        
        // Loop through each row of buy history data and display it in the table
        while ($row = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['property_name']}</td>";
            echo "<td>{$row['price']}</td>";
            echo "<td>{$row['quantity']}</td>";
            echo "<td>{$row['purchase_date']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
