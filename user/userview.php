<?php
include("../connection/connect.php");
include("../includes/user_header.php");
include("../includes/footer.php");

// Check if property ID is provided in the URL
if(isset($_GET['id'])) {
    $property_id = $_GET['id'];
    
    // Retrieve property details from the database
    $sql = "SELECT * FROM propertylist WHERE id = $property_id";
    $query = mysqli_query($connect, $sql);
    
    if(mysqli_num_rows($query) > 0) {
        $property = mysqli_fetch_assoc($query);
?>
        <div class="container mt-5">
            <div class="row">
            <div class="col-md-6">
                    <?php
                            echo '
                                <img src = '.$property['image1'].' style = "width: 400px; height: 400px;">
                            ';
                    ?>
                </div>
                <div class="col-md-6">
                    <h2><?php echo $property['title']; ?></h2>
                    <table class="table table-bordered table-hover table-striped " style = " box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);">
                        <tbody>
                            <tr>
                                <th scope="row">Description</th>
                                <td><?php echo $property['description']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Price</th>
                                <td>$<?php echo $property['price']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Type</th>
                                <td><?php echo $property['type']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Location</th>
                                <td><?php echo $property['location']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td><?php echo $property['city']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">State</th>
                                <td><?php echo $property['state']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Sell Type</th>
                                <td><?php echo $property['stype']; ?></td>
                            </tr>
                            <!-- Add more rows for other property details -->
                        </tbody>

                        
                    </table>
                    <div class="sec2">
                                <!-- Add the Buy button -->
                                <form action="buy_history.php" method="post">
                                    <input type="hidden" name="property_name" value="<?php echo $title; ?>">
                                    <input type="hidden" name="quantity" value="1"> <!-- Assuming 1 unit is being bought -->
                                    <button type="submit" class="btn btn-danger" style="width: 110px; margin-top: 5px;">Buy</button>
                                </form>

                            </div>
                </div>
              
            </div>
        </div>
<?php
    } else {
        echo "<p>Property not found.</p>";
    }
} else {
    echo "<p>Property ID not provided.</p>";
}
?>
