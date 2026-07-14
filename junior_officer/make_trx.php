<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Transaction</title>
    <style>
        .main {
            background-color: white;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 1100px;
            margin-top: 50px;
            height: 100vh;
        }



        .p {
            margin: 8px;
            font-size: 15px;

        }

        .check {
            border: none;
            background-color: #0097e6;
            padding: 4px 10px;
            color: white;
            border-radius: 3px;
            font-weight: bold;
            margin-top: 10px;
            margin-left: 28%;
        }

        .info {
            width: 50%;
            padding: 0 30px;
        }

        .trx {
            width: 50%;
        }

        .info div {
            margin-bottom: 6px;
        }

        .info label {
            font-size: 15px;
            margin-bottom: -1px;
            font-weight: bold;
        }

        .info input {
            height: 30px;
            font-size: 16px;
        }

        .btn_deposit {
            margin-top: 10px;
            margin-left: 45%;

        }

        .dd {
            margin: 20px 0px 10px 50px;
        }
    </style>
</head>

<?php
include("../database.php");
session_start();
$error_pa = "";
$taccount_no = "";
$account_no = "";
$customer_name = "";
$acc_type = "";
$balance = "";
$avl_trx = "";
$withdraw_limit = "";

if (isset($_POST['checkpa'])) {
    $taccount_no = $_POST['account_no'];
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account a
                                            inner join customer c
                                            using(customer_id)
                                            inner join acc_type at
                                             using(at_code)
                                             where account_no='$taccount_no' "));

    if (empty($row)) {
        $error_pa = "Account Not Found";
    }
    else if($row['status']!='active'){
        $error_pa = "Account Not Active";

    } else {

        $account_no = $row['account_no'];
        $customer_name = $row['first_name']." ".$row['last_name'];
        $acc_type = $row['acc_name'];
        $balance = $row['balance'];
        $avl_trx = 10;
        $withdraw_limit = 40000;
    }
}












?>

<body>

    <div>
        <?php include "jo_header.php" ?>
    </div>
    <div class="d-flex">
        <div>
            <?php include "jo_sidebar.php" ?>
        </div>
        <style>

        </style>
        <!-- Start -->
        <div class="main">



            <div class="cnt border">

                <div style="margin-bottom: -10px;" class="border bg-light">
                    <p class="p d-flex justify-content-center ">Account Information</p>
                </div>


                <div class="dd">
                    <select name="typeselect" id="typeselect" onchange="Handler(this.value)">
                        <option value="pa">Personal Account</option>
                        <option value="dps">DPS Account</option>
                    </select>
                </div>



                <div class="pa" id="pa">
                    <form action="" method="post">

                        <div class="d-flex justify-content-center">
                            <div style="width: 40%;" class=" mb-2">
                                <h6 class="d-flex justify-content-center" style="font-size:16px;">Enter Account Number</h6>
                                <input style="height: 32px;" class="form-control" value="<?php echo $taccount_no ?>" type="number" name="account_no" id="">
                                <input type="submit" value="Check Account Info" class="check" name="checkpa" id="">
                                <p class="d-flex justify-content-center" style="color: red;"><?php echo $error_pa ?></p>
                            </div>

                        </div>

                        <div class="d-flex">
                            <div class="info">
                                <div>
                                    <label class="form-label d-flex justify-content-center">Account No</label>
                                    <input class="form-control" value="<?php echo $account_no ?>" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Customer Name</label>
                                    <input class="form-control" value="<?php echo $customer_name ?>" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Account Type</label>
                                    <input class="form-control" value="<?php echo $acc_type ?>" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Balance</label>
                                    <input class="form-control" value="<?php echo $balance." Taka" ?>" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Available Transaction For this month</label>
                                    <input class="form-control" value="<?php echo $avl_trx ?>" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Withdraw Limit for this month</label>
                                    <input class="form-control" value="<?php echo$withdraw_limit ?>" disabled type="text" name="" id="">
                                </div>





                            </div>
                            <div class="trx">
                                <p class="d-flex justify-content-center" style="font-size: 18px; font-weight:bold;">Transaction Process </p>

                                <div>
                                    <input class="form-control" placeholder="Check Number" type="text" name="check_withdraw" id="" style="margin-bottom: 5px;">
                                    <input class="form-control" placeholder="Amount" type="text" name="amount_withdraw" id="">
                                    <input type="submit" value="Withdraw" name="btn_withdraw" id="" class="btn_deposit btn btn-primary">
                                </div>

                                <div class="mt-3">
                                    <input class="form-control" placeholder="Check Number" type="text" name="check_deposit" id="" style="margin-bottom: 5px;">
                                    <input class="form-control" placeholder="Amount" type="text" name="amount_deposit" id="">
                                    <input type="submit" value="Deposit" name="btn_deposit" id="" class="btn_deposit btn btn-success">
                                </div>

                            </div>
                        </div>


                    </form>


                </div>




                <div class="dps" id="dps" style="display: none;">
                    <form action="" method="post">

                        <div class="d-flex justify-content-center">
                            <div style="width: 40%;" class=" mb-2">
                                <h6 class="d-flex justify-content-center" style="font-size:16px;">Enter Account Number</h6>
                                <input style="height: 32px;" class="form-control" type="text" name="account_no" id="">
                                <input type="submit" value="Check Account Info" class="check" name="check" id="">
                            </div>

                        </div>

                        <div class="d-flex">
                            <div class="info">
                                <div>
                                    <label class="form-label d-flex justify-content-center">DPS ID</label>
                                    <input class="form-control" value="56655568" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Customer Name</label>
                                    <input class="form-control" value="56655568" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Required Instalment Date</label>
                                    <input class="form-control" value="56655568" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Paid Installment</label>
                                    <input class="form-control" value="56655568" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Installment Amount</label>
                                    <input class="form-control" value="56655568" disabled type="text" name="" id="">
                                </div>
                                <div>
                                    <label class="form-label d-flex justify-content-center">Maturity Amount</label>
                                    <input class="form-control" value="56655568" disabled type="text" name="" id="">
                                </div>





                            </div>
                            <div class="trx">
                                <p class="d-flex justify-content-center" style="font-size: 18px; font-weight:bold;">Transaction Process </p>

                                <div>
                                    <input class="form-control" placeholder="Amount" type="text" name="amount_withdraw" id="">
                                    <input type="submit" value="Withdraw" name="btn_withdraw" id="" class="btn_deposit btn btn-primary">
                                </div>

                                <div class="mt-3">
                                    <input class="form-control" placeholder="Amount" type="text" name="amount_deposit" id="">
                                    <input type="submit" value="Deposit" name="btn_deposit" id="" class="btn_deposit btn btn-success">
                                </div>

                            </div>
                        </div>


                    </form>


                </div>










                <div class="d-flex">
                    <div class="details ">




                    </div>
                    <div class="deposit">

                    </div>

                </div>





            </div>














        </div>
        <!-- End -->
    </div>
</body>

</html>


<script>
    function Handler(value) {
        if (value == 'pa') {
            document.getElementById('pa').style.display = 'block';
            document.getElementById('dps').style.display = 'none';
        } else {
            document.getElementById('pa').style.display = 'none';
            document.getElementById('dps').style.display = 'block';
        }
    }
</script>