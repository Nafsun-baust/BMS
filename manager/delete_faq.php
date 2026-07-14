<?php
include "../database.php";
session_start();

$faq_id = $_GET['faq_id'];


$query_delete  = "DELETE FROM faq where faq_id = '$faq_id'";
$result = mysqli_query($con, $query_delete);
$_SESSION['msg'] = "FAQ Deleted successfully";
header("Location: faq.php");


?>