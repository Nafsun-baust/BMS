<?php 
include"../database.php";
session_start();
$atm_id = $_GET['atm_id'];
$query = "DELETE FROM atm_booth
          WHERE atm_id = '$atm_id'";
mysqli_query($con,$query);
header("Location: atm.php");



?>