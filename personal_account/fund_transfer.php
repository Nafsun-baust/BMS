<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>

    <title>Fund Transfer</title>

    <style>
        body {
            box-sizing: border-box;
        }


        .main {
            background-color: #EEEEEE;
            display: flex;
            justify-content: center;

        }

        .cnt {
            margin-top: 100px;
            width: 400px;
        }

        .btn-success {
            margin-top: 15px;
        }

        .form-label {
            font-size: 20px;
        }

        .container span {
            color: red;
            font-size: 15px;
            margin-left: 10px;
        }

        .add_ben {
            border: none;
            font-size: 20px;
            background-color: #3498db;
            color: white;
            padding: 5px 10px;
            border: 2px double #7f8c8d;
            cursor: default;

        }

        .transfer {
            border: none;
            background-color: #0fb9b1;
            padding: 5px 20px;
            border-radius: 3px;
            font-size: 20px;
            color: #f1f2f6;
            margin-left: 25%;
            margin-top: 20px;
        }
    </style>
</head>

<?php
include("../database.php");
session_start();
$account_no = $_SESSION['account'];

$account = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account where account_no='$account_no'"));

$sender_account = $_SESSION['account'];


if (isset($_POST['transfer'])) {
    $receiver_account = $_POST['account'];
    $amount = $_POST['amount'];
   
    if($amount>$account['balance']){
        echo "<script>alert('Insufficient Balance') </script>";
    }
    else{

        mysqli_query($con,"INSERT INTO `transfer_money`( `sender_id`, `receiver_id`, `amount`, `transfer_date_time`)
                           VALUES ('$account_no','$receiver_account','$amount',NOW()");
          
           mysqli_query($con, "UPDATE account set balance=balance+" . $amount . " WHERE account_no='$receiver_account'");
           mysqli_query($con, "UPDATE account set balance=balance-" . $amount . " WHERE account_no='$account_no'");

        header("Location: transfer_invoice.php");


    }




   


}



?>



<body>

    <div class="d-flex" style="width: 100%;  box-sizing: border-box; overflow:hidden;">
        <div>
            <?php include "account_sidebar.php" ?>
        </div>
        <style>
            .aaa {
                overflow: hidden;

            }
        </style>
        <div style="width: 100%;" class="aaa">
            <div>
                <?php include "account_header.php" ?>
            </div>
            <!-- Start -->
            <div class="main">

                <div class="cnt">


                    <div class="container">
                        <?php
                        if (isset($_SESSION["msg"])) {
                            $msg = $_SESSION["msg"];
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <form action="fund_transfer.php" method="post">
                            <h3 class="mb-4 d-flex justify-content-center">Fund Transfer</h3>

                            <div class="d-flex justify-content-center">
                                <a href="add_beneficiary.php" style="text-decoration: none;">
                                    <p class="add_ben">+ Add Beneficiary Account</p>
                                </a>
                            </div>


                            <div class="d-flex">
                                <h4 class="d-flex justify-content-center">Balance:  </h4>&nbsp;&nbsp; <p style="font-size: 20px;"><?php echo $account['balance']." Taka"?></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Receiver Account No</label>
                                <select class="form-select" name="account" id="">
                                    <?php
                                    $beneficiary = mysqli_query($con, "SELECT * FROM beneficiary WHERE source_acc_no = '$sender_account'");
                                    while ($row = mysqli_fetch_assoc($beneficiary)) {
                                    ?>
                                        <option value="<?php echo $row['ben_acc_no'] ?>"><?php echo $row['ben_acc_no'] . "  " . $row['ben_name'] ?></option>
                                    <?php } ?>

                                </select>
                                <!-- <input class="form-control" type="number" name="account" id="" required> -->
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input class="form-control" type="number" name="amount" id="" required>
                            </div>

                            <input class="transfer" type="submit" value="Transfer Money" name="transfer" id="">
                        </form>

                    </div>
                </div>



            </div>
            <!-- End -->
        </div>

    </div>


</body>

</html>