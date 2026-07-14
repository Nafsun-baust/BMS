<?php
include "../database.php";
session_start();

$scheme_id = $_GET['scheme_id'];

$query_search = "select * from dps where scheme_id='$scheme_id'";
$table_search = mysqli_query($con, $query_search);
$row_search = mysqli_fetch_assoc($table_search);

if ($row_search) {
    $_SESSION['msg'] = "This scheme cannot be deleted. This scheme has some DPS account.";
    header("Location: dps_scheme.php");
} else {
    $query_delete  = "DELETE FROM dps_scheme where scheme_id = '$scheme_id'";
    $result = mysqli_query($con, $query_delete);
    $_SESSION['msg'] = "Scheme Deleted successfully";
    header("Location: dps_scheme.php");
}

?>