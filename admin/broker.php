<?php

include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

$broker_count = 0;
if(mysqli_query($connforMyOnlineDb, "DESCRIBE `transaction_broker`")) {
    // If the table exists, query to get count of pending reservations
    $broker_count_query = "SELECT COUNT(*) AS count FROM transaction_broker WHERE status = 'pending'";
    $broker_count_result = mysqli_query($connforMyOnlineDb, $broker_count_query);
    $broker_count = mysqli_fetch_assoc($broker_count_result)['count'];
} else {
    // If the table doesn't exist, set reservation count to 0
    $broker_count = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Reservation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<body>



<div class="container">
<a href="building_management.php" class="btn btn-secondary">
    <i class="fas fa-arrow-left"></i> Back
</a>

        

    <div class="card" style="width: 68rem; margin-top: 40px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
        <div class="card-body">
             <!-- Link button for pending -->
                <div style="margin-top: 10px; margin-bottom: 10px; float: right;">
                    <a href="pendingBroker.php" class="btn btn-warning"><?php if ($broker_count > 0) { echo "<span class='badge badge-light'>$broker_count</span>"; } ?>Pending</a>
                </div>
            <table class="table table-striped table-hover" style="box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 15px;">
                <thead class="table-dark">
                    <tr>
                        <th>Buyer ID</th>
                        <th>Property ID</th>
                        <th>Title</th>
                        <th>Price</th>  
                        <th>Type</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Payment</th>
                        <th>Purchase Date</th>
                        <th>Broker</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM transaction_broker WHERE status = 'accepted'";
                    $query = mysqli_query($connforMyOnlineDb, $sql);

                    $count = 0;

                    while ($test = mysqli_fetch_assoc($query)) {

                        $count++;
                        echo '
                        <tr>
                        <td>'.$test['buyer_id'].'</td>
                        <td>'.$test['property_id'].'</td>
                        <td>'.$test['title'].'</td>
                        <td>'.$test['price'].'</td>
                        <td>'.$test['type'].'</td>
                        <td>'.$test['location'].'</td>
                        <td>'.$test['city'].'</td>
                        <td>'.$test['state'].'</td>
                        <td>'.$test['type_payment'].'</td>
                        <td>'.$test['buy_time'].'</td>
                        <td>'.$broker.'</td>
                        </tr>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
   
</div>
</body>
</html>
