<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Account Type</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 50%;
        }

        .error_message {
            display: flex;
            justify-content: center;
        }

        .cnt span {
            color: red;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();

$error_message = "";
$error = false;
if (isset($_POST['submit'])) {
    $acc_name = $_POST['acc_name'];
    $service_charge = $_POST['service_charge'];
    $interest_rate = $_POST['interest_rate'];
    $trx_limit = $_POST['trx_limit'];
    $withdraw_limit = $_POST['withdraw_limit'];
   

    $query_acc_type = "select * from acc_type where acc_name='$acc_name'";
    $table_acc_type = mysqli_query($con, $query_acc_type);
    $row_acc_type = mysqli_fetch_assoc($table_acc_type);

    if ($row_acc_type) {
        $error_message = "Duplicate Account Type";
        $error = true;
    }

    if (!$error) {
        $query_insert = "INSERT INTO `acc_type`( `acc_name`, `service_charge`, `interest_rate`, `trx_limit`,withdraw_limit)
        VALUES ('$acc_name','$service_charge','$interest_rate','$trx_limit','$withdraw_limit')";
        mysqli_query($con, $query_insert);
        $_SESSION['msg'] = "New account type added successfully";
        header("Location: acc_type.php");
    }
}




?>

<body>
    <div>
        <?php include "manager_header.php" ?>
    </div>
    <div class="d-flex">
        <div>
            <?php include "manager_sidebar.php" ?>
        </div>
        <!-- Start -->
        <div class="main">


            <div class="cnt">

                <h2 class="d-flex justify-content-center mt-3 mb-4">Add New Account Type</h2>
                <div class="error_message">
                    <span><?php echo $error_message ?></span>
                </div>

                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Account Type Name</label>
                        <input class="form-control" type="text" name="acc_name" id="" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Service Charge</label>
                        <input class="form-control" type="number" name="service_charge" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Interest Rate</label>
                        <input class="form-control" type="number" name="interest_rate" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monthly Transaction Limit</label>
                        <input class="form-control" type="number" name="trx_limit" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monthy withdraw/Transfer Money Limit</label>
                        <input class="form-control" type="number" name="withdraw_limit" id="" required>
                    </div>
                    <div class="d-flex">
                        <input type="submit" class="btn btn-success" value="Submit" name="submit" id="">
                        <a href="acc_type.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>









        </div>
        <!-- End -->

    </div>

</body>

</html>