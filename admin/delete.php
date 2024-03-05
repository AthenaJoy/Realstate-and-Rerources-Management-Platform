<?php
        include("../connection/connect.php");

        if(isset($_GET['id'])){
            $id = $_GET['id'];

                $sql = "DELETE FROM propertylist WHERE id = $id";
                mysqli_query($connforMyOnlineDb,$sql);

                header("Location: building_management.php");
        }
?>