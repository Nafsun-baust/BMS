<?php
include "../database.php";
session_start();

$dps_id = $_GET['dps_id'];


$query_delete  = "DELETE FROM dps where dps_id = '$dps_id'";
$result = mysqli_query($con, $query_delete);
$_SESSION['msg'] = "Dps Account Deleted successfully";
header("Location: dps.php");


?>