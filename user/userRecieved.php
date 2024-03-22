<?php
include("../connection/connect.php");
include("../includes/userbookheader.php");
include("../includes/footer.php");

// Handle pending and received actions here if needed
if(isset($_POST['pending'])) {
    // Handle pending action
}

if(isset($_POST['received'])) {
    // Handle received action
}
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

        /* CSS to position buttons to the right */
        .button-container {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
<div class="button-container" style="margin-right: 60px;">
<form method="post" style="display: inline;">
        <a type="submit" name="pending"  class = "btn btn-success" href="userpending.php">Pending</a>
    </form>
  
</div>


    <table class="container" style="margin-top: 20px; height: 3000px;">
        <thead>
            <tr>
                <th>Buyer ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>File</th>
                <th>Status</th>
                <th>Delivery Rider</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM payment";
            $query = mysqli_query($connforMyOnlineDb,$sql);
            while($test = mysqli_fetch_assoc($query)){

                if($test['rider'] == null){
                        $rider = "No Assigned Rider!";
                }else{
                        $rider = $test['rider'];
                }
                echo '
                <tr>
                    <td>'.$test['id'].'</td>
                    <td>'.$test['title'].'</td>
                    <td>'.$test['price'].'</td>
                    <td>'.$test['description'].'</td>
                    <td>'.$test['file'].'</td>
                    <td>Payment Completed</td>
                    <td>'.$rider.'</td>
                   
                </tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>