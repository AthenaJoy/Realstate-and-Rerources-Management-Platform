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
    
   <form method="post" style="display: inline;">
        <a type="submit" name="received" class = "btn btn-success" href="userRecieved.php">Received</a>
    </form>
</div>


    <table class="container" style="margin-top: 20px;">
        <thead>
            <tr>
            <th>Order no.</th>
                <th>Buyer ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Description</th>
                <th>File</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM cotton_transaction";
            $query = mysqli_query($connforMyOnlineDb,$sql);

            $count = 0;
            while($test = mysqli_fetch_assoc($query)){
                $count++;
                echo '
                <tr>
                <td>'.$count.'</td>
                    <td>'.$test['id'].'</td>
                    <td>'.$test['title'].'</td>
                    <td>'.$test['price'].'</td>
                    <td>'.$test['description'].'</td>
                    <td>'.$test['file'].'</td>
                   
                </tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>