<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">



    <title>Transaction</title>

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
           
           
        }



    



    </style>
</head>

<?php
include("../database.php");
session_start();
$sl = 1;
$account_no = $_SESSION['account'];

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
order by date desc");






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


            <div class="cnt">
                <div class="container">

                    <h3 class="mt-2 mb-3">Transaction History</h3>
                    <table id="export" class="table table-hover table-bordered table-striped text-center">
                        <thead>
                            <tr class="table-dark">
                                <th>SL</th>
                                <th>Trx code</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Trx Time</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                        <style>
                            .pp{
                                background-color: green;
                            }
                        </style>
                            <?php

                            while($r = mysqli_fetch_assoc($q)){

                            
                           
                            ?>

                                <tr>
                                    <td><?php 
                                    echo $sl++;
                                        ?></td>
                                    <td><?php echo $r['tc'] ?></td>
                                    <td><?php  echo $r['type'] ?></td>
                                    <td><?php  echo $r['amount'] ?></td>
                                    <td><?php
                                        $datetime = new DateTime($r['date']);
                                        $formattedDatetime = $datetime->format('d-M-Y H:i:s');
                                        echo $formattedDatetime;
                                        ?></td>
                                  

                                </tr>

                            <?php } ?>


                            </tfoot>
                    </table>



                </div>
            </div>

               



            </div>
            <!-- End -->
        </div>

    </div>



    <script src="../plugins/jquery/jquery.min.js"></script>

    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../dist/js/demo.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
    <script src="../plugins/datatable/button-ext/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatable/button-ext/jszip.min.js"></script>
    <script src="../plugins/datatable/button-ext/buttons.html5.min.js"></script>
    <script src="../plugins/datatable/button-ext/buttons.print.min.js"></script>
    <script>
        $('#export').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [{
                    // extend: 'print',
                    // className: 'btn'
                }]
            },
            

            "pageLength": 8
        });
    </script>



</body>

</html>