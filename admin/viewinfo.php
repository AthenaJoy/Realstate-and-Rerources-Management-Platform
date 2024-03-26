<?php
include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

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
                        echo '<img src="'.$property['image1'].'" style="width: 400px; height: 400px;">';

                        $id = $_GET['id'];
                        $selectAllRatingCondition = "SELECT * FROM property_rating WHERE property_id = $id";
                        $check = mysqli_query($connforMyOnlineDb, $selectAllRatingCondition);

                        $totalnumberofrating = 0;
                        $totaluserRate = 0;

                        while($test = mysqli_fetch_assoc($check)){
                            $totaluserRate++;
                            $totalnumberofrating += $test['rate'];
                        }

                        if($totaluserRate == 0){
                            $rateOfanItem = 0;
                        } else {
                            $rateOfanItem = round(($totalnumberofrating / ($totaluserRate * 5)) * 100);
                        }
                        
                        echo '<div class="rating">';
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rateOfanItem / 20) {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                            } else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" class="bi bi-star" viewBox="0 0 16 16">
                                    <path d="M8 .25l1.277 4.175 4.246.309a.717.717 0 0 1 .398 1.218l-3.25 2.665.973 4.207a.717.717 0 0 1-1.077.798L8 12.347l-4.267 2.45a.717.717 0 0 1-1.077-.798l.973-4.207-3.25-2.665a.717.717 0 0 1 .398-1.218l4.246-.309L8 .25zm0 2.076L6.615 5.2a.717.717 0 0 1-.538.396l-3.368.245 2.547 2.083a.717.717 0 0 1 .206.796l-.805 3.48 3.337-1.915a.717.717 0 0 1 .684 0l3.337 1.915-.805-3.48a.717.717 0 0 1 .206-.796l2.547-2.083-3.368-.245a.717.717 0 0 1-.538-.396L8 2.326V2.326z"/>
                                    </svg>';
                            }
                        }
                        
                        echo '</div>';
                        echo '<p>Rating: '.$rateOfanItem.'%</p>';
                    ?>
                </div>
                <div class="col-md-6">
                    <h2><?php echo $property['title']; ?></h2>
                    <table class="table table-bordered table-hover table-striped" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);">
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
                        </tbody>
                    </table>

                    <?php 
                        
                    ?>
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
