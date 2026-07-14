<?php
include "../database.php";
session_start();
$employee_id = $_GET['employee_id'];
mysqli_query($con,"DELETE FROM employee WHERE employee_id='$employee_id'");
$_SESSION['msg'] = "Employee Deleted Successfully";
header("Location: employee.php");


?>