<?php
include "../database.php";
session_start();
$leave_id = $_GET['leave_id'];
$query = "DELETE FROM employee_leave 
          WHERE leave_id='$leave_id'";
mysqli_query($con, $query);
$_SESSION['msg']="Application canceled successfully";
header("Location: leave.php");
