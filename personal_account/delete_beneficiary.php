<?php 
include"../database.php";
session_start();
$ben_acc_no = $_GET['ben_acc_no'];
mysqli_query($con,"DELETE FROM beneficiary where ben_acc_no='$ben_acc_no'");
$_SESSION['msg'] = "Beneficiary deleted successfully";
header("Location: fund_transfer.php");
?>