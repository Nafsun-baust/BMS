<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Officer Dashboard</title>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .infodiv {
            display: flex;
        }

        .info {
            display: flex;
            width: 21%;
            height: 17vh;
            background-color: #05c46b;
            margin: 10px 2%;
            border-radius: 15px;
            box-shadow: 0 0 10px gray;

        }

        .infoicon {
            width: 100%;

        }

        .infotext {
            color: white;
            font-weight: bolder;
            font-size: 20px;
            width: 70%;
            text-align: center;
        }

        .infotext p {
            font-size: 25px;
        }

        .infoicondiv {
            width: 30%;
        }

        .infoicon,
        .infotext {
            height: 17vh;
            padding: 5% 10%;
            box-sizing: border-box;


        }
    </style>
</head>

<body>
    <?php
    include('../database.php');
    session_start();



    $total_customer_query = " SELECT COUNT(customer_id) AS total_customer
                            FROM customer ";
    $total_customer_result = mysqli_query($con, $total_customer_query);
    $total_customer = mysqli_fetch_assoc($total_customer_result);


    $total_employee_query = " SELECT COUNT(employee_id) AS total_employee
                            FROM employee ";
    $total_employee_result = mysqli_query($con, $total_employee_query);
    $total_employee = mysqli_fetch_assoc($total_employee_result);


    $total_at_query = " SELECT COUNT(at_code) AS total_at
                            FROM acc_type ";
    $total_at_result = mysqli_query($con, $total_at_query);
    $total_at = mysqli_fetch_assoc($total_at_result);

    $total_account_query = " SELECT COUNT(account_no) AS total_account
                             FROM account ";
    $total_account_result = mysqli_query($con, $total_account_query);
    $total_account = mysqli_fetch_assoc($total_account_result);
    ?>
    <div>
        <?php include "officer_header.php" ?>
    </div>

    <div style="display: flex;">
        <div>
            <?php include "officer_sidebar.php" ?>
        </div>

        <!-- Start  -->
        <div class="main">


         


            <div class="infodiv">

                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>Atm Booth</label><br>
                        <p>7</p>
                    </div>
                </div>

                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>Customer</label>
                        <p> <?php echo $total_customer['total_customer'] ?></p>
                    </div>
                </div>


                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>Employee</label>
                        <p> <?php echo $total_employee['total_employee'] ?></p>
                    </div>
                </div>




                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>Acc Type</label>
                        <p> <?php echo $total_at['total_at'] ?></p>
                    </div>
                </div>




            </div>

            <div class="infodiv">
                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>Personal Account</label>
                        <p> <?php echo $total_account['total_account'] ?></p>
                    </div>
                </div>

                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>DPS Account</label>
                        <p>57</p>
                    </div>
                </div>

                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label>FDR Account</label>
                        <p>25</p>
                    </div>
                </div>

                <div class="info">
                    <div class="infoicondiv">
                        <img class="infoicon" src="../logo/client.png" alt="">
                    </div>

                    <div class="infotext">
                        <label style="font-size: 16px;">Transaction</label>
                        <p>300</p>
                    </div>
                </div>




            </div>



            <div id="acc_type" style="width: 900px; height: 500px;"></div>

           









        </div>
        <!-- End -->

    </div>


    <?php


    ?>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawAtChart);

        function drawAtChart() {
            var data = google.visualization.arrayToDataTable([
                ['Account', 'Accounts Per Acc Type'],
                <?php

                $pa = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(account_no) from account"));
                $dps = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(dps_id) from dps"));
                $fdr = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(fdr_id) from fdr"));
                    $query = "SELECT acc_type.acc_name, COUNT(account_no) AS total
                              FROM acc_type
                              INNER JOIN account
                              ON acc_type.at_code = account.at_code
                              GROUP BY account.at_code";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "['" . $row['acc_name'] . "'," . $row['total'] . "],";
                        
                    }
                ?>
            ]);

            var options = {
                title: 'Accounts Per Acc Type',
                pieHole: 0.4,
            };

            var at_chart = new google.visualization.PieChart(document.getElementById('acc_type'));
            at_chart.draw(data, options);
        }


    </script>

</body>

</html>