<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>

    <title>Bill Payment</title>

    <style>
        body {
            box-sizing: border-box;
        }


        .main {
            background-color: #EEEEEE;
            display: flex;
            justify-content: center;

        }

        .card {
            padding: 30px;

        }

        .bill_button {}

        .bill_button button {
            border: none;
            background-color: #70a1ff;
            padding: 5px 10px;
            color: white;


        }

        .uname {
            margin-top: 6px;
            font-weight: bold;
        }

        .log {
            height: 40px;
            width: 40px;
            margin-right: 10px;
            margin-bottom: 20px;
        }

        .card {
            width: 500px;
        }

        .rec {
            margin-right: 70px;
        }

        .check {
            border: none;
            padding: 5px 8px;
            color: white;
            background-color: #0984e3;
            border-radius: 5px;
        }
    </style>
</head>

<?php
include("../database.php");
session_start();
$account_no = $_SESSION['account'];
$tution_balance = "";
$hall_balance = "";
$tution_student_id = "";
$hall_student_id = "";
$university_name = $_GET['university_name'];
$university = mysqli_query($con, "SELECT  * FROM uni_hall where university_name='$university_name'");
$row = mysqli_fetch_assoc($university);


$account = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account where account_no='$account_no'"));







if (isset($_POST['hallpay'])) {

    $student_id = $_POST['hall_student_id'];
    $hall_name = $_POST['hall_name'];
    $amount = $_POST['amount'];

    if ($amount > $account['balance']) {
        echo "<script>alert('Insufficient Balance') </script>";
    }
    else{

        $insert =  mysqli_query($con, "INSERT INTO `university_bill_payment`(account_no, `payment_type`, `student_id`, `university_name`, `hall_name`,`amount`,date_time)
        VALUES ('$account_no','Hall Fee','$student_id','$university_name','$hall_name','$amount',NOW())");
      
          $ac = mysqli_query($con, "UPDATE account set balance=balance-" . $amount . " WHERE account_no='$account_no'");
          $st =  mysqli_query($con, "UPDATE student_tution_fee set due2=due2-" . $amount . " WHERE student_id='$student_id'");
      
          if ($insert && $ac && $st) {
              header("Location: hall_invoice.php");
          }

    }



}



if (isset($_POST['tutionpay'])) {
    $student_id = $_POST['tution_student_id'];
    $department = $_POST['department'];
    $batch = $_POST['batch'];
    $amount = $_POST['amount'];

    if ($amount > $account['balance']) {
        echo "<script>alert('Insufficient Balance') </script>";
    } else {
        //   $insert =   mysqli_query($con, "INSERT INTO `university_bill_payment`(account_no, `payment_type`, `student_id`, `university_name`, `hall_name`, `department`, `batch`, `amount`,date_time)
        //     VALUES ('$account_no','tution','$student_id','$university_name',NULL,'$department','$batch','$amount',NOW()");

        $insert = mysqli_query($con, "INSERT INTO `university_bill_payment`( `account_no`, `payment_type`, `student_id`, `university_name`,  `department`, `batch`, `amount`, `date_time`)
    VALUES ('$account_no','Tution Fee','$student_id','$university_name','$department','$batch','$amount',NOW())");


        $ac = mysqli_query($con, "UPDATE account set balance=balance-" . $amount . " WHERE account_no='$account_no'");
        $st =  mysqli_query($con, "UPDATE student_tution_fee set due=due-" . $amount . " WHERE student_id='$student_id'");

        if ($insert && $ac && $st) {
            header("Location: tution_invoice.php");
        }
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


                <div>
                    <div class="card" style="height: 90px;">
                        <div class="d-flex">
                            <div class="rec">
                                <p>Recipient</p>
                            </div>
                            <div class="d-flex">
                                <img class="log" src="<?php echo $row['university_logo'] ?>" alt="">
                                <p class="uname"><?php echo $row['university_name'] ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="d-flex">
                            <div>
                                <label class="sel_lbl" for="">Payment Type</label><br>
                                <select class="sel" name="" id="ptype" onclick="validate()">
                                    <option value="select">Select Payment Type</option>
                                    <option value="tution">Tution Fee</option>
                                    <option value="hall">Hall Fee</option>
                                </select>
                            </div>

                            <div style="margin-left: 50px;">
                                <P style="margin-bottom: 5px;" class="text-center">Balance</P>
                                <p class="text-center"><?php echo $account['balance'] ?> Taka</p>
                            </div>
                        </div>


                    </div>

                    <div class="card" id="hall_fee" style="display: none;">
                        <div>
                            <form action="" method="post">

                                <?php

                                if (isset($_POST['checkhall'])) {
                                    $hall_student_id = $_POST['hall_student_id'];
                                    $q = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM student_tution_fee  where student_id = '$hall_student_id'"));
                                    if ($q) {
                                        $hall_balance = $q['due2'];
                                    } else {
                                        echo "<script> swal({
            title: 'Account Not Found!',
            timer: 2000
          }); </script>";
                                    }
                                }

                                ?>
                                <div class="mb-2">
                                    <div class="d-flex">
                                        <label class="lbl">Student Id</label>
                                        <p style="margin-left: 250px;"><?php if ($hall_balance != "") echo $hall_balance . " Taka" ?></p>
                                    </div>
                                    <input class="inp" value="<?php echo $hall_student_id ?>" type="number" name="hall_student_id" id="" required>
                                    <button name="checkhall" class="check">Check Due</button>
                                </div>

                                <div class="mb-2">
                                    <?php
                                    $hall = mysqli_query($con, "SELECT hall_name FROM uni_hall where university_name = '$university_name'");

                                    ?>
                                    <label class="lbl">Hall</label><br>
                                    <select class="sel" name="hall_name" id="">
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($hall)) {

                                        ?>
                                            <option value="<?php echo $row2['hall_name'] ?>"><?php echo $row2['hall_name'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label class="lbl">Amount</label><br>
                                    <input class="inp" type="number" name="amount" id="">
                                </div>

                                <div style="margin-left: 50px;">
                                    <input type="submit" value="Pay" class="pay" name="hallpay" id="">
                                </div>



                            </form>
                        </div>

                    </div>

                    <div class="card" id="tution_fee" style="display: none;">
                        <div>
                            <form action="" method="post">

                                <?php

                                if (isset($_POST['checktution'])) {
                                    $tution_student_id = $_POST['tution_student_id'];
                                    $q = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM student_tution_fee  where student_id = '$tution_student_id'"));
                                    if ($q) {
                                        $tution_balance = $q['due'];
                                    } else {
                                        echo "<script> swal({
                                            title: 'Account Not Found!',
                                            timer: 2000
                                          }); </script>";
                                    }
                                }

                                ?>

                                <div class="mb-2">
                                    <div class="d-flex">
                                        <label class="lbl">Student Id</label>
                                        <p style="margin-left: 250px;"><?php if ($tution_balance != "") echo $tution_balance . " Taka" ?></p>
                                    </div>
                                    <input class="inp" value="<?php echo $tution_student_id ?>" type="int" name="tution_student_id" id="">
                                    <button name="checktution" class="check">Check Due</button>
                                </div>

                                <div class="mb-2">
                                    <label class="lbl">Department</label><br>
                                    <select class="sel" name="department" id="">
                                        <option value="CSE">CSE</option>
                                        <option value="ME">ME</option>
                                        <option value="EEE">EEE</option>
                                        <option value="Civil">Civil</option>
                                        <option value="BBA">BBA</option>
                                        <option value="English">English</option>
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label class="lbl">Batch</label><br>
                                    <input class="inp" type="text" name="batch" id="">
                                </div>



                                <div class="mb-2">
                                    <label class="lbl">Amount</label><br>
                                    <input class="inp" type="number" name="amount" id="">
                                </div>

                                <div style="margin-left: 50px;">
                                    <input type="submit" value="Pay" class="pay" name="tutionpay" id="">
                                </div>



                            </form>
                        </div>

                    </div>







                </div>









            </div>
            <!-- End -->
        </div>

    </div>


</body>

</html>



<script>
    function validate() {
        var ddl = document.getElementById("ptype");
        var selectedValue = ddl.options[ddl.selectedIndex].value;
        if (selectedValue == "tution") {
            document.getElementById("tution_fee").style.display = "block";
            document.getElementById("hall_fee").style.display = "none";
        } else if (selectedValue == "hall") {
            document.getElementById("tution_fee").style.display = "none";
            document.getElementById("hall_fee").style.display = "block";
        } else if (selectedValue == "select") {
            document.getElementById("tution_fee").style.display = "none";
            document.getElementById("hall_fee").style.display = "none";
        }
    }
</script>


<style>
    .sel {
        width: 200px;
        height: 35px;
        border: none;
        background-color: #ced6e0;
        border-radius: 4px;
        text-align: center;
    }

    .sel_lbl {
        margin-bottom: 5px;
    }

    .lbl {
        margin-bottom: 3px;
    }

    .inp {
        width: 300px;
        height: 35px;
        border: 2px solid gray;
        border-radius: 4px;
        padding: 2px 10px;
    }

    .pay {
        border: none;
        font-size: 18px;
        background-color: #1e90ff;
        padding: 5px 80px;
        border-radius: 5px;
        color: white;
        margin-top: 10px;
    }
</style>