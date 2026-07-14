<?php
include "../database.php";
session_start();

$at_code = $_GET['at_code'];

$query_search = "select * from account where at_code='$at_code'";
$table_search = mysqli_query($con, $query_search);
$row_search = mysqli_fetch_assoc($table_search);

if ($row_search) {
    $_SESSION['msg'] = "This account type cannot be deleted. This account type has some Account.";
    header("Location: acc_type.php");
} else {
    $query_delete  = "DELETE FROM acc_type where at_code = '$at_code'";
    $result = mysqli_query($con, $query_delete);
    $_SESSION['msg'] = "Account Type Deleted successfully";
    header("Location: acc_type.php");
}

?>