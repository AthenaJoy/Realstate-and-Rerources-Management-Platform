<?php
// Assuming you have already connected to your MySQL database

if(isset($_POST['buyButton'])) {
    // Retrieve data from the form
    $itemName = $_POST['title'];
    $itemPrice = $_POST['Price'];

    // Prepare and execute SQL query to insert data into buy_history table
    $stmt = $pdo->prepare("INSERT INTO buy_history (title, price, purchase_date) VALUES (?, ?, NOW())");
    $stmt->execute([$itemName, $itemPrice]);

    // Check if the insertion was successful
    if($stmt->rowCount() > 0) {
        echo "Item successfully purchased and saved to buy history.";
    } else {
        echo "Error: Failed to save item to buy history.";
    }
}
?>
