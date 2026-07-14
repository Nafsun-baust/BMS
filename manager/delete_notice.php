<?php
include "../database.php";
session_start();

$notice_id = $_GET['notice_id'];


$query_delete  = "DELETE FROM notice where notice_id = '$notice_id'";
$result = mysqli_query($con, $query_delete);
$_SESSION['msg'] = "Notice Deleted successfully";
header("Location: notice.php");


?>