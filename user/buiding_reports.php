<?php
include("../connection/connect.php");
include("../includes/user_header.php");
include("../includes/footer.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Reports</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <a href="building_user.php" class="btn btn-danger mb-3">Back</a>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Property Name</th>
                <th scope="col">Property Location</th>
                <th scope="col">Property City</th>
                <th scope="col">Property State</th>
                <th scope="col">Property Report</th>
                <th scope="col">Reporter</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $all = "SELECT * FROM `report`";
                $query = mysqli_query($connforMyOnlineDb, $all);

                $count = 0;
                while ($test = mysqli_fetch_assoc($query)) {
                    $count++;
                    echo '
                    <tr>
                        <th scope="row">' . $count . '</th>
                        <td>' . $test['property_name'] . '</td>
                        <td>' . $test['location'] . '</td>
                        <td>' . $test['city'] . '</td>
                        <td>' . $test['state'] . '</td>
                        <td>' . $test['report'] . '</td>
                        <td>' . $test['reporter'] . '</td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS (optional, for certain Bootstrap features like dropdowns, modals, etc.) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
