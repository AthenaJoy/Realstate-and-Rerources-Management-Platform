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
    <title>Property Reports</title>
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
  <table class="table table-striped table-hover" style = "box-shadow: 0 4px 8px rgba(4, 4, 4, 1.1); margin-top: 10px;">
        <thead class = "table-dark">
        <tr>
            <th>Report No.</th>
            <th>Message Report</th>
           
            

        </tr>
        </thead>
        <tbody>
            <?php
                    while($test = mysqli_fetch_assoc($query)){
                        $count++;
                        echo '<tr>';
                        echo '<td>'.$count.'</td>';
                        if(isset($test['txt'])) {
                            echo '<td>'.$test['txt'].'</td>';
                        } else {
                            echo '<td>txt not found</td>'; // Debugging output
                        }
                        echo '</tr>';
                    }
            ?>
        </tbody>
</table>
  </div>
</div>
</div>


    
</body>
</html>