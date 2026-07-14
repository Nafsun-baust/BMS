<?php
include("../database.php");
session_start();
$customer_id = $_GET['customer_id'];
echo $customer_id . "<br>";

$account = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account
                                               WHERE customer_id = '$customer_id'"));

$dps = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM dps
                                                  WHERE customer_id = '$customer_id'"));

$fdr = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM fdr
                                                  WHERE customer_id = '$customer_id'"));

$loan = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM loan
                                                   WHERE customer_id = '$customer_id'"));

 if($account || $fdr || $dps || $loan){
          $_SESSION['delete_message']="Can not delete this customer. This customer has an account";
 }
 else{
    $delete = mysqli_query($con, "DELETE FROM customer 
    WHERE customer_id = '$customer_id'");
 }
    echo "DELETED";

header("Location: customer.php");
