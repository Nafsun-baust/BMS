<?php
include "../database.php";
session_start();

$fdr_id = $_GET['fdr_id'];


$query_delete  = "DELETE FROM fdr where fdr_id = '$fdr_id'";
$result = mysqli_query($con, $query_delete);
$_SESSION['msg'] = "Fdr Account Deleted successfully";
header("Location: fdr.php");


?>