<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Personal Account</title>
</head>

<?php
include("../database.php");
session_start();

$account_no = $_SESSION['account'];
$my_account = mysqli_fetch_assoc(mysqli_query($con, "SELECT *
                                                    FROM account a
                                                    INNER JOIN customer c
                                                    USING(customer_id)
                                                    INNER JOIN acc_type
                                                    USING(at_code)
                                                    WHERE a.account_no='$account_no'"));

$spend = mysqli_fetch_assoc(mysqli_query($con, "select count(trx_code) as total, sum(amount) as total_amount
                                                        from transaction 
                                                        where trx_type='withdraw' and account_no='100002'
                                                        union
                                                        select count(transfer_code) as total, sum(amount) as total_amount
                                                        from transfer_money
                                                        where sender_id='100002'
                                                        union
                                                        select count(payment_id) as total, sum(amount) as total_amount
                                                        from university_bill_payment
                                                        where account_no='100002'"));


$income = mysqli_fetch_assoc(mysqli_query($con, "select count(trx_code) as total, sum(amount) as total_amount
                                                from transaction 
                                                where trx_type='deposit' and account_no='100002'
                                                union
                                                select count(transfer_code) as total, sum(amount) as total_amount
                                                from transfer_money
                                                where receiver_id='100002'"));




$q = mysqli_query($con, "select trx_code as tc, 'deposit' type, amount, trx_date_time date
                                                from transaction 
                                                where trx_type = 'deposit' and account_no='$account_no'
                                                union
                                                select trx_code as tc, 'withdraw' type, amount, trx_date_time date
                                                from transaction 
                                                where trx_type = 'withdraw' and account_no='$account_no'
                                                union
                                                select transfer_code tc,'send money' type,amount,transfer_date_time date
                                                from transfer_money 
                                                where sender_id='$account_no'
                                                union
                                                select transfer_code tc,'received money' type,amount,transfer_date_time date
                                                from transfer_money 
                                                where receiver_id='$account_no'
                                                union
                                                select payment_id tc, 'Bill Payment' type,amount,date_time date
                                                from university_bill_payment 
                                                where account_no = '$account_no'
                                                order by date desc
                                                limit 8");
?>

<body>

    <div>
        <?php include "account_header.php" ?>
    </div>

    <div class="d-flex">
        <div>
            <?php include "account_sidebar.php" ?>
        </div>
        <!-- Start -->
        <div class="main">




            <h2 class="mb-3">Hello, <?php echo $my_account['first_name'] . " " . $my_account['last_name'] ?></h2>

            <!-- Balance -->
            <div class="d-flex mt-4">

                <div class="balancediv" style="margin-left: 10px;">
                    <h4><?php echo $my_account['acc_name'] ?></h4>
                    <div class="d-flex">
                        <p class="tb">Total Balance</p>
                        <i class="fa-solid fa-circle-up"></i>
                        <p class="per"><?php echo $my_account['interest_rate'] ?>%</p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <h2><?php echo $my_account['balance'] ?></h2>
                        <img class="taka" src="../logo/taka.svg" alt="">
                    </div>
                </div>

                <div class="balancediv" style="margin-left: 10px; background-color:#f5cdc4;">
                    <div class="d-flex">
                        <p class="tb" style="font-weight: bold;">Income</p>
                        <i class="fa-solid fa-square-up-right"></i>

                    </div>

                    <div class="d-flex justify-content-center">
                        <h2><?php echo $income['total_amount'] ?></h2>
                        <img class="taka" src="../logo/taka.svg" alt="">
                    </div>
                    <div class="trx">
                        <p>Transaction(<?php echo $income['total'] ?>)</p>
                    </div>
                </div>

                <div class="balancediv" style="margin-left: 10px; background-color:#f2e0bd;">
                    <div class="d-flex">
                        <p class="tb" style="font-weight: bold;">Spend</p>
                        <i class="fa-solid fa-circle-down"></i>

                    </div>

                    <div class="d-flex justify-content-center">
                        <h2><?php if ($spend['total'] == 0) {
                                echo "0";
                            } else  echo $spend['total_amount'] ?></h2>
                        <img class="taka" src="../logo/taka.svg" alt="">
                    </div>

                    <div class="trx">
                        <p>Transaction(<?php echo $spend['total'] ?>)</p>
                    </div>
                </div>



                <!-- Card -->
                <div class="card">
                    <div class="card__front card__part">
                        <img class="card__front-square card__square" src="../logo/chip.png">
                        <span class="card_name">NCBL Card</span>
                        <p class="card_numer"><?php echo $my_account['debit_card_no'] ?></p>
                        <div class="card__space-75">
                            <span class="card__label">Card holder</span>
                            <p class="card__info"><?php echo $my_account['first_name'] . " " . $my_account['last_name'] ?></p>
                        </div>
                        <div class="card__space-25">
                            <span class="card__label">Expires</span>
                            <p class="card__info"><?php echo date('m', strtotime($my_account['debit_exp_date'])) . "/" . substr(date('Y', strtotime($my_account['debit_exp_date'])), -2);  ?></p>
                        </div>
                    </div>

                    <div class="card__back card__part">
                        <div class="card__black-line"></div>
                        <div class="card__back-content">
                            <div class="card__secret">
                                <p class="card__secret--last">420</p>
                            </div>
                            <img class="card__back-square card__square" src="../logo/chip.png">
                            <span class="card__back-logo card__logo">NCBL Card</span>
                        </div>
                    </div>

                </div>

                <!-- Card -->



            </div>
            <!-- Balance -->


            <div class="d-flex">
                <!-- <div class="bh">
                    <h4>Balance History</h4>
                    <div class="chrtbh" style="">
                        <canvas id="line-chart"></canvas>
                    </div>
                </div> -->


                <div class="trx_div">
                    <div class="d-flex">
                    <h4>Leatest Transaction</h4>
                    <a style="margin-left: 350px; text-decoration:none;" href="transaction.php">See More</a>
                    </div>
                   
                    <div class="container">
                        <table class="table table-hover text-center">
                            <tr>
                                <th class="sl">Trx Code</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>

                            <?php

                            while ($r = mysqli_fetch_assoc($q)) {



                            ?>

                                <tr>
                                 
                                    <td><?php echo $r['tc'] ?></td>
                                    <td><?php echo $r['type'] ?></td>
                                    <td><?php echo $r['amount'] ?></td>
                                    <td><?php
                                        $datetime = new DateTime($r['date']);
                                        $formattedDatetime = $datetime->format('d-M-Y H:i:s');
                                        echo $formattedDatetime;
                                        ?></td>


                                </tr>

                            <?php } ?>


                        </table>
                    </div>



                </div>


                <div class="pie">
                    <h4>Statistics</h4>
                    <div class="d-flex justify-content-center">
                        <div class="piediv ">
                            <canvas id="pie-chart"></canvas>
                        </div>
                    </div>

                </div>


            </div>



            <div class="d-flex">


                <div class="mf2">
                    <h4>Money Flow</h4>
                    <canvas id="chartId" aria-label="chart" height="350" width="550"></canvas>

                </div>


            </div>

            <style>

            </style>




















































        </div>


        <!-- End -->


    </div>

    </div>

    <script>
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    data: [186, 205, 1321, 1516, 2107, 2191, 3133, 3221, 4783, 5478, 6178, 6359],
                    label: "Account Balance",
                    borderColor: "#3cba9f",
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Chart JS Multiple Lines Example'
                }
            }
        });




        var chrt = document.getElementById("chartId").getContext("2d");
        var chartId = new Chart(chrt, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Money In",
                        data: [186, 205, 1321, 1516, 2107, 2191, 3133, 3221, 4783, 5478, 6178, 6359],
                        backgroundColor: '#1B9CFC', // ['#1B9CFC', '#1B9CFC', '#1B9CFC', 'lightgreen', 'lightblue', 'gold'],
                        // borderColor:'#1B9CFC',// ['red', 'blue', 'fuchsia', 'green', 'navy', 'black'],
                        borderWidth: 2,
                    },


                    {
                        label: "Money Out",
                        data: [1282, 1350, 2411, 2502, 2635, 2809, 3947, 4402, 3700, 5267, 4987, 6874],
                        backgroundColor: "#ff4d4d", // ['#ff4d4d', '#ff4d4d', '#ff4d4d', '#ff4d4d', '#ff4d4d', '#ff4d4d','#ff4d4d','#ff4d4d','#ff4d4d','#ff4d4d','#ff4d4d','#ff4d4d'],
                        // borderColor: "#ff4d4d",// ['red', 'blue', 'fuchsia', 'green', 'navy', 'black'],
                        borderWidth: 2,
                    },
                ],
            },
            options: {
                responsive: false,
            },
        });






        var chrt3 = document.getElementById("pie-chart").getContext("2d");
        var chartId3 = new Chart(chrt3, {
            type: 'doughnut',
            data: {
                labels: ['Send Money', 'Received Money', 'Deposit', 'Withdrow', 'Bill Pay'],
                datasets: [{
                    data: [50, 60, 70, 180, 190],
                    backgroundColor: ['#1B9CFC', '#6ab04c', '#be2edd', '#ff6348', '#341f97'],
                }, ],
            },
            options: {
                plugins: {
                    datalabels: {
                        display: true,
                        backgroundColor: '#ccc',
                        borderRadius: 3,
                        font: {
                            color: 'red',
                            weight: 'bold',
                        },
                    },
                    doughnutlabel: {
                        labels: [{
                                text: '550',
                                font: {
                                    size: 20,
                                    weight: 'bold',
                                },
                            },
                            {
                                text: 'total',
                            },
                        ],
                    },
                },
            },
        });
    </script>

</body>

</html>