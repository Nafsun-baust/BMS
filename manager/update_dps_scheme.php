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

$scheme_id = $_GET['scheme_id'];

$query_find_scheme = "select * from dps_scheme where scheme_id='$scheme_id'";
$table_find_scheme = mysqli_query($con, $query_find_scheme);
$row = mysqli_fetch_assoc($table_find_scheme);





if (isset($_POST['update'])) {
    $tenure = $_POST['tenure'];
    $installment_amount = $_POST['installment_amount'];
    $interest_rate = $_POST['interest_rate'];
    $maturity_amount = ((int)$installment_amount * (int)$tenure) + (((int)$installment_amount * (int)$tenure) * (int)$interest_rate) / 100;



    $query_insert = "UPDATE `dps_scheme` SET `tenure`='$tenure',`total_installment`='$tenure',`maturity_amount`='$maturity_amount',
                         `installment_amount`='$installment_amount',`interest_rate`='$interest_rate' WHERE scheme_id='$scheme_id'";
    mysqli_query($con, $query_insert);
    $_SESSION['msg'] = "Updated scheme information successfully";
    header("Location: dps_scheme.php");
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
                

                <form action="" method="post">
                    <div class="d-flex double">
                        <div class="mb-3">
                            <label class="form-label">Scheme Id</label>
                            <input class="form-control" value="<?php echo $row['scheme_id'] ?>" type="number" name="tenure" id="" disabled>
                        </div>
                        <div class="mb-3" style="margin-left: 6%;">
                            <label class="form-label">Tenure</label>
                            <input class="form-control" value="<?php echo $row['tenure'] ?>" type="number" name="tenure" id="" required>
                        </div>
                    </div>

                    <div class="d-flex double">
                        <div class="mb-3">
                            <label class="form-label">Total Installment</label>
                            <input class="form-control" value="<?php echo $row['total_installment'] ?>" type="number" name="tenure" id="" disabled>
                        </div>
                        <div class="mb-3" style="margin-left: 6%;">
                            <label class="form-label">Maturity Amount</label>
                            <input class="form-control" value="<?php echo $row['maturity_amount'] ?>" type="number" name="tenure" id="" disabled>
                        </div>
                    </div>



                    <div class="d-flex double">
                        <div class="mb-3">
                            <label class="form-label">Installment Amount</label>
                            <input class="form-control" value="<?php echo $row['installment_amount'] ?>" type="number" name="installment_amount" id="" required>
                        </div>
                        <div class="mb-3" style="margin-left: 6%;">
                            <label class="form-label">Interest Rate</label>
                            <input class="form-control" value="<?php echo $row['interest_rate'] ?>" type="number" name="interest_rate" id="" required>
                        </div>
                    </div>

                    <div class="btn_div">
                        <input type="submit" class="btn btn-primary" value="Update" name="update" id="">
                        <a href="dps_scheme.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>


        </div>
        <!-- End -->

    </div>

</body>

</html>