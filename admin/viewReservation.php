<?php

include("../connection/connect.php");
include("../includes/seller_header.php");
include("../includes/footer.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Reservation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
<div class="card" style="width: 68rem; margin-top: 40px; box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1);">
 
  <div class="card-body">
  <table class="table table-striped table-hover" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 10px;">
        <thead class = "table-dark">
        <tr>
            <th>Reservation No.</th>
            <th>Building Name</th>
            <th>Location</th>
            <th>City</th>
            <th>State</th>
            <th>Client Username</th>
            

        </tr>
        </thead>
        <tbody>
            <?php
                    $sql = "SELECT * FROM reservebuilding";
                    $query = mysqli_query($connforMyOnlineDb,$sql);

                    $count = 0;

                    while($test = mysqli_fetch_assoc($query)){

                        $count++;
                        echo '
                        <tr>
                                 <td>'.$count.'</td>
                                <td>'.$test['title'].'</td>
                                <td>'.$test['location'].'</td>
                                <td>'.$test['city'].'</td>
                                <td>'.$test['state'].'</td>
                                <td>'.$test['user_reserve'].'</td>
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