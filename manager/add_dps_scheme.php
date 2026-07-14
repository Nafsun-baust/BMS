<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Scheme</title>
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
    $tenure = $_POST['tenure'];
    $installment_amount = $_POST['installment_amount'];
    $interest_rate = $_POST['interest_rate'];
    $maturity_amount = ((int)$installment_amount * (int)$tenure) + (((int)$installment_amount * (int)$tenure) * (int)$interest_rate) / 100;

    $query_scheme = "select * from dps_scheme where tenure='$tenure'";
    $table_scheme = mysqli_query($con, $query_scheme);
    $row_scheme = mysqli_fetch_assoc($table_scheme);

    if ($row_scheme) {
        $error_message = "Duplicate Scheme";
        $error = true;
    }

    if (!$error) {
        $query_insert = "INSERT INTO `dps_scheme`( `tenure`, `total_installment`, `maturity_amount`, `installment_amount`, `interest_rate`)
        VALUES ('$tenure','$tenure','$maturity_amount','$installment_amount','$interest_rate')";
        mysqli_query($con, $query_insert);
        $_SESSION['msg'] = "New scheme added successfully";
        header("Location: dps_scheme.php");
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

                <h2 class="d-flex justify-content-center mt-3 mb-4">Add New DPS Scheme</h2>
                <div class="error_message">
                    <span><?php echo $error_message ?></span>
                </div>

                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Tenure</label>
                        <input class="form-control" type="number" name="tenure" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Installment Amount</label>
                        <input class="form-control" type="number" name="installment_amount" id="" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Interest Rate</label>
                        <input class="form-control" type="number" name="interest_rate" id="" required>
                    </div>
                    <div class="d-flex">
                        <input type="submit" class="btn btn-success" value="Submit" name="submit" id="">
                        <a href="dps_scheme.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>









        </div>
        <!-- End -->

    </div>

</body>

</html>