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
    
    <style>
        table {
            width: 150%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <table class = "container" style=" margin-top: 80px;">
        <thead>
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
            </tr>
        </thead>
        <tbody>
            <?php
                    $sql = "SELECT * FROM buy_history";
                    $query = mysqli_query($connect,$sql);
                    while($test = mysqli_fetch_assoc($query)){

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

                            </tr>
                            
                            ';

                    }
            ?>
        </tbody>
    </table>
</body>
</html>
