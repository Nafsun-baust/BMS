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
            align-items: center;

        }

        .back {
            text-decoration: none;
        }

        .card {
            padding: 50px;
        }

        .lbl {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .inp {
            width: 250px;
            height: 30px;
            border: 2px solid gray;
            border-radius: 3px;

        }

        .check {
            border: none;
            background-color: #40407a;
            padding: 3px 5px;
            color: white;
            border-radius: 3px;
        }

        .add {
            background-color: #34ace0;
            border: none;
            padding: 5px 10px;
            margin-bottom: 15px;
            color: white;
            font-size: 17px;
            border-radius: 3px;
        }

        .back {
            background-color: #706fd3;
            color: white;
            padding: 5px 10px;
            font-size: 17px;
            border-radius: 3px;


        }

        .btn_div {
            margin-left: 10%;
        }

        .pic {
            height: 100px;
            width: 100px;
        }
        .error_message{
            color: red;
            display: flex;
            justify-content: center;

        }

        .crd {
            margin-left: 20px;
        }
    </style>
</head>


<?php
include("../database.php");
session_start();
$error_message = "";
$checked = false;
$customer_name = "";
$email = "";
$phone = "";
$account_type = "";
$photo = "";

$account_no = "";
$name = "";



$account_table = mysqli_query($con, "SELECT * from acc_type");





if (isset($_POST['check'])) {
    $account_no = $_POST['account_no'];
    $acc_type = $_POST['acc_type'];
    $name =  $_POST['name'];

    $find = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account a
                                                   INNER JOIN customer c
                                                    USING(customer_id)
                                                  INNER JOIN acc_type ac
                                                   USING(at_code)
                                                   WHERE a.account_no = $account_no AND ac.at_code='$acc_type'"));
    if ($find) {
        $checked = true;
        $customer_name = $find['first_name']." ".$find['last_name'];
        $email = $find['email'];
        $phone = $find['phone'];
        $account_type = $find['acc_name'];
        if($find['picture']==""){
            $photo = "../logo/men.jpg";
        }
        else{
            $photo = $find['picture'];
        }
       
    } else {
        $error_message = "Account Not Found";
        $error = true;
    }
}

if(isset($_POST['add'])){
    $account_no = $_POST['account_no'];
    $name =  $_POST['name'];
    $my_account = $_SESSION['account'];
    
    $find2 = mysqli_fetch_assoc(mysqli_query($con,"SELECT * from beneficiary WHERE ben_acc_no = '$account_no'"));
    if($find2){
        $error_message = "This account is on your Beneficiary List";
    }
    else{
        mysqli_query($con,"INSERT INTO `beneficiary`(`source_acc_no`, `ben_acc_no`, `ben_name`)
        VALUES ('$my_account','$account_no','$name')");
        $_SESSION['msg']="Beneficiary added successfully";
        header("Location: fund_transfer.php");
    }

   
}




?>



<body>

    <div class="d-flex" style="width: 100%;  box-sizing: border-box; overflow:hidden;">
        <div>
            <?php include "account_sidebar.php" ?>
        </div>



        <div style="width: 100%;" class="aaa">
            <div>
                <?php include "account_header.php" ?>
            </div>
            <!-- Start -->
            <div class="main">


                <div class="card">
                    <h3>Add Beneficiary Account</h3>
                    <div class="error_message">
                        <span><?php echo $error_message ?></span>
                    </div>

                    <form method="post">
                        <div class="mt-3 mb-2">
                            <label class="lbl">Account Type</label><br>
                            <select class="inp" name="acc_type" id="">
                                <?php
                                while ($account = mysqli_fetch_assoc($account_table)) {
                                ?>
                                    <option value="<?php echo $account['at_code'] ?>"><?php echo $account['acc_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-2">
                            <label class="lbl">Beneficiary Account Number</label><br>
                            <input class="inp" type="number" name="account_no" id="" value="<?php echo $account_no ?>" required>
                            <input type="submit" value="Check" name="check" id="check" class="check" >
                            <!-- <button name="check" class="check" id="check" type="submit" >Check</button> -->

                        </div>
                        <div class="mb-4">
                            <label class="lbl">Beneficiary Name</label><br>
                            <input class="inp" type="text" name="name" id="" value="<?php echo $name ?>" >
                        </div>
                        <div class="btn_div">
                            <input class="add" type="submit" value="Add to Beneficiary List" name="add" id="" style="display:<?php if($checked) echo 'inline'; else echo 'none'?>;" ><br>
                            <a class="back" href="fund_transfer.php">Back To Transfer Page</a><br><br>
                            <a style="background-color: black;" class="back" href="beneficiary.php">Beneficiary List</a>
                        </div>
                    </form>





                </div>

                <div class="card crd" id="profile">
                    <div class="d-flex justify-content-center">
                        <img class="pic" id="pic" src="<?php echo $photo ?>" alt="">
                    </div>
                    <style>
                        .details p {
                            margin-bottom: -1px;
                        }
                    </style>
                    <div class="details">
                        <p class="text-center"><b><?php echo $customer_name ?></b> </p>
                        <p class="text-center"><?php echo $email ?></p>
                        <p class="text-center"><?php echo $phone ?></p>
                        <p style="margin-top: 10px; font-size:22px;"><b><?php echo $account_type ?></b> </p>
                    </div>



                </div>


            </div>
            <!-- End -->
        </div>

    </div>


</body>

</html>

<script>



</script>