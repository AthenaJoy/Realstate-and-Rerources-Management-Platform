<?php
session_start();
include("../connection/connect.php");
include("../includes/user_header.php");
include("../includes/footer.php");




if($_SERVER['REQUEST_METHOD'] == "POST"){
        $user_id = $_SESSION['id'];
        $property_id = $_POST['property_id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        $location = $_POST['location'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $type_payment = $_POST['type_payment'];
        

        $sql = "INSERT INTO buy_history (buyer_id,property_id,title,price,type,location,city,state,type_payment) VALUES ('$user_id','$property_id','$title','$price','$type','$location','$city','$state','$type_payment')";
        mysqli_query($connect,$sql);

        header("Location: building_user.php");
}


// Check if property ID is provided in the URL
if(isset($_GET['id'])) {
    $property_id = $_GET['id'];
    
    // Retrieve property details from the database
    $sql = "SELECT * FROM propertylist WHERE id = $property_id";
    $query = mysqli_query($connforMyOnlineDb, $sql);
    
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
                                <form action="userview.php" method="post">

                               
                                <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
                                <input type="hidden" name="title" value="<?php echo $property['title']; ?>">
                                <input type="hidden" name="price" value="<?php echo $property['price']; ?>">
                                <input type="hidden" name="type" value="<?php echo $property['type']; ?>">
                                <input type="hidden" name="location" value="<?php echo $property['location']; ?>">
                                <input type="hidden" name="city" value="<?php echo $property['city']; ?>">
                                <input type="hidden" name="state" value="<?php echo $property['state']; ?>">
                                <input type="hidden" name="type_payment" value="<?php echo $property['stype']; ?>">
                              
                                    <input type="submit" class="btn btn-danger" style="width: 110px; margin-top: 5px;" value = "BUY">
                                </form>

                            </div>
                </div>
              
            </div>
        </div>
<?php
    } else {
        echo "<p>Property not found.</p>";
    }
} 
?>
