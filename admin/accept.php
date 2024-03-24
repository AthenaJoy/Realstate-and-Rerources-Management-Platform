<?php

include("../connection/connect.php");

$id = $_GET['id'];

$sql = "UPDATE reservebuilding SET status = 'accepted' WHERE id = $id";
mysqli_query($connforMyOnlineDb,$sql);



header("Location: viewReservation.php");
?>
