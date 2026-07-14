<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account Type</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 70%;
        }

        .error_message {
            display: flex;
            justify-content: center;
        }

        .cnt span {
            color: red;
        }

        .double div {
            width: 47%;
        }

        .btn_div {
            margin-top: 20px;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();

$at_code = $_GET['at_code'];

$query_find_acc_type = "select * from acc_type where at_code='$at_code'";
$table_find_acc_type = mysqli_query($con, $query_find_acc_type);
$row = mysqli_fetch_assoc($table_find_acc_type);





if (isset($_POST['update'])) {
    $acc_name = $_POST['acc_name'];
    $service_charge = $_POST['service_charge'];
    $interest_rate = $_POST['interest_rate'];
    $trx_limit = $_POST['trx_limit'];
    $withdraw_limit = $_POST['withdraw_limit'];


    $query_update = "UPDATE `acc_type` SET `acc_name`='$acc_name',`service_charge`='$service_charge',`interest_rate`='$interest_rate',
                    `trx_limit`='$trx_limit', withdraw_limit='$withdraw_limit' WHERE at_code='$at_code'";
    $result =  mysqli_query($con, $query_update);
    if ($result) {
        $_SESSION['msg'] = "Updated Account Type information successfully";
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

                <h2 class="d-flex justify-content-center mt-3 mb-4">Update Account Type</h2>


                <form action="" method="post">
                <div class="mb-3">
                        <label class="form-label">Account Type Id</label>
                        <input class="form-control" value="<?php echo $row['at_code']?>" type="text" name="acc_name" id="" disabled>
                    </div>

                <div class="mb-3">
                        <label class="form-label">Account Type Name</label>
                        <input class="form-control" value="<?php echo $row['acc_name']?>" type="text" name="acc_name" id="" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Service Charge</label>
                        <input class="form-control" value="<?php echo $row['service_charge']?>" type="number" name="service_charge" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Interest Rate</label>
                        <input class="form-control" value="<?php echo $row['interest_rate']?>" type="number" name="interest_rate" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Transaction Limit</label>
                        <input class="form-control" value="<?php echo $row['trx_limit']?>" type="number" name="trx_limit" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Monthy withdraw/Transfer Money Limit</label>
                        <input class="form-control" type="number" name="withdraw_limit" value="<?php echo $row['withdraw_limit']?>" id="" required>
                    </div>

                    <div class="btn_div">
                        <input type="submit" class="btn btn-primary" value="Update" name="update" id="">
                        <a href="acc_type.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>


        </div>
        <!-- End -->

    </div>

</body>

</html>