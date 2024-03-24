<?php
include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

// Initialize search query
$search_query = "";

if(isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = $_GET['search'];
    $sql = "SELECT * FROM propertylist WHERE title LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM propertylist";
}

$query = mysqli_query($connforMyOnlineDb, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Houses you Want to Sell</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-6">
                <form class="form-inline" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" value="<?php echo $search_query; ?>">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    <a href="addproperty.php" class="btn btn-primary" style=" margin-left:10px;">Add Property</a>
                </form>
               
            </div>
            <div class="col-md-6 text-right">
                
                <a href="viewReservation.php" class="btn btn-success">Reservation</a>
                <a href="broker.php" class="btn btn-success ">Broker</a>
                <a href="reports.php" class="btn btn-danger">Reports</a>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <?php
            while($check = mysqli_fetch_assoc($query)){
                $pic = $check['image1'];
                $title = $check['title'];
                $price = $check['price'];
                $property_id = $check['id'];
                $rate = $check['rate'];
                $id = $check['id'];

                
                                            
                                            $selectAllRatingCondition = "SELECT * FROM property_rating WHERE property_id = $id";
                                            $check = mysqli_query($connforMyOnlineDb,$selectAllRatingCondition);

                                          
                                            $totalnumberofrating = 0;
                                            $totaluserRate = 0;

                                            while($test = mysqli_fetch_assoc($check)){

                                              
                                                  $totaluserRate++;
                                                  $totalnumberofrating+=$test['rate'];
                                                  

                                            }

                                           if($totalnumberofrating == 0){
                                                $rateOfanItem = 0;
                                           }else{
                                                $rateOfanItem = round($totalnumberofrating / $totaluserRate);
                                           }
                                          
                                           
                                              
                  ?>
            
            <div class="col-md-3">
                <div class="card" style="width: 17rem; height: 27rem; margin: 20px;  box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
                    <img src="<?php echo $pic; ?>" class="card-img-top" style="height: 250px; width: 271px;">
                    <div class="card-body">
                        <div class="rate" style = "font-size: 20px; position: absolute; top: 270px; left: 220px;">
                            <?php echo $rateOfanItem; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gold" class="bi bi-star-fill" viewBox="0 0 16 16">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        </div>
                        <h5 class="card-title"><?php echo $title; ?></h5>
                        <h5 class="card-title">$ <?php echo $price; ?></h5>
                            <div class="opt">
                                <div class="sec1">
                                <a href="viewinfo.php?id=<?php echo $property_id; ?>" class="btn btn-info" style = "width: 230px;">More Information</a>
                                </div>
                                <div class="sec2">
                                <a href="editproperty.php?id=<?php echo $property_id; ?>" class="btn btn-success" style = "width: 110px; margin-top: 5px;">Edit</a>
                                  <a href="delete.php?id=<?php echo $property_id; ?>" class="btn btn-danger" style = "width: 110px; margin-top: 5px;" >delete</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

           
            <?php } ?>
        </div>
    </div>


    <div class="div" style = "margin-top: 60px;"></div>

    <!-- Bootstrap JS and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
