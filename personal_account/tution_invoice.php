<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>
    <link rel="stylesheet" href="../bootstrap/bootstrap_css.css">
    <script src="../bootstrap/bootstrap_js.js"></script>
    <title>Bill Payment</title>

    <style>
        body {
            background-color: #e1e9e1;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .cnt {
            background-color: white;
            margin-top: 20px;
            height: 600px;
            width: 700px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }







        .logo {
            height: 80px;
            width: 80px;
            margin-top: 15px;
        }

        .phone {}

        .email {
            margin-top: -15px;
        }

        .btnn {
            background-color: #3498db;
            border: none;
            font-size: 20px;
            padding: 5px 15px;
            border-radius: 5px;
            margin-top: 45px;
            color: white;

        }

        .hdiv {
            position: relative;

        }

        .date {
            position: absolute;
            right: 28px;
            /* margin: -5px 0 -20px 25px; */
        }

        .fdr {
            position: absolute;
            left: 27px;
            font-size: 20px;
            font-weight: bold;

        }
        .d{
             border: 2px solid gray;
             width: 300px;
             padding: 10px;
        }
        .d label{
            font-weight: bold;
        }
        .bb{
            border: none;
            background-color: #22a6b3;
            color: white;
            border-radius: 3px;
            padding: 5px 10px;
            margin: 40px;
        }
    </style>
</head>

<?php
include("../database.php");
session_start();
$bill = mysqli_fetch_assoc(mysqli_query($con, "select * from university_bill_payment where payment_id=(SELECT MAX(payment_id) from university_bill_payment)"));




?>



<body>

    <div class="cnt">
        <div class="text-center">
            <img class="logo" src="../logo/logo.png" alt="Bank Logo">
            <h2 class="mt-2">Nexus Capital Bank Limited</h2>
            <h5>Building Trust, Empowering Futures</h5>
            <p class="phone">Phone: +88-02-55478856-6</p>
            <p class="email">Email: ncbl@gmail.com</p>
        </div>

        <h5 style="margin-left: 45px; font-weight:bold;">Bill Information</h5>
        <div style="margin-left: 30px;" class="container d-flex">
            
            <div class="d">
                <div class="d-flex">
                    <label>Transaction Code:</label>&nbsp;&nbsp;<p><?php echo $bill['payment_id'] ?></p>
                </div>
                <div class="d-flex">
                    <label>University Name:</label>&nbsp;&nbsp;<p><?php echo $bill['university_name'] ?></p>
                </div>
                <div class="d-flex">
                    <label>Student Id:</label>&nbsp;&nbsp;<p><?php echo $bill['student_id'] ?></p>
                </div>
                <div class="d-flex">
                    <label>Department:</label>&nbsp;&nbsp;<p><?php echo $bill['department'] ?></p>
                </div>
            </div>
            <div class="d">
                <div class="d-flex">
                    <label>Batch:</label>&nbsp;&nbsp;<p><?php echo $bill['batch'] ?></p>
                </div>

                <div class="d-flex">
                    <label>Account No:</label>&nbsp;&nbsp;<p><?php echo $bill['account_no'] ?></p>
                </div>
                <div class="d-flex">
                    <label>Amount:</label>&nbsp;&nbsp;<p><?php echo $bill['amount'] . " Taka" ?></p>
                </div>
                <div class="d-flex">
                    <label>Payment Date:</label>&nbsp;&nbsp;<p><?php echo $bill['date_time'] ?></p>
                </div>
            </div>
        </div>


   <a href="bill_payment.php"><button class="bb">Ok</button></a>



    </div>


    </div>



</body>

</html>