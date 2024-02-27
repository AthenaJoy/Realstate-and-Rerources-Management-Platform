<?php
        include("../connection/connect.php");

        if(isset($_GET['id'])){
            $id = $_GET['id'];

                $sql = "DELETE FROM propertylist WHERE id = $id";
                mysqli_query($connect,$sql);

                header("Location: building_management.php");
        }
?>