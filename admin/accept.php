<?php

include("../connection/connect.php");

$id = $_GET['id'];
$p_id = $_GET['p_id'];

$sql = "UPDATE reservebuilding SET status = 'accepted' WHERE id = $id;
        UPDATE propertylist SET reserve_status = 'RESERVED' WHERE id = $p_id;

";
mysqli_multi_query($connforMyOnlineDb,$sql);



header("Location: viewReservation.php");
?>
