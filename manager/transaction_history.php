<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Report: Transaction History </title>

    <link rel="stylesheet" href="../dist/css/adminlte.min.css">



    <style>
        .dt-buttons .dt-button {
            color: #fff !important;
            background-color: #1b55e2 !important;
            border-color: #1b55e2;
            margin-top: 13px;
            margin-bottom: 13px;
            margin-right: 5px;
        }
    </style>

    <style>
        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 100%;
        }

        .out {
            position: relative;
            margin-top: 5px;
        }

      

        .search {
            border: 2px solid gray;
            border-radius: 5px;
            padding-left: 5px;
        }

        .sel {
           
              position: absolute;
            right: 0;
             bottom: -10px;
            border: none;
            padding-left: 5px;
            background-color: #95afc0;
            border-radius: 4px;
        }

        .searchbtn {
            border: none;
            background-color: #2C3A47;
            color: white;
            padding: 2px 10px;
            border-radius: 3px;
        }
    </style>
</head>


<?php
include "../database.php";
session_start();
$sl = 1;
$search = "";
$acc_type = "";

if (isset($_POST['sel'])) {
    $acc_type = $_POST['sel'];
}

if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];
}
$transfer = mysqli_query($con, "SELECT trx_code as trx_code,a.account_no as account_no, t.trx_type as trx_type, t.amount as amount, concat(c.first_name,' ',c.last_name) as name, 'Personal Account' as acc_type, t.trx_date_time as date
                                from transaction t
                                inner join account a
                                on t.account_no = a.account_no
                                inner join customer c
                                on a.customer_id=c.customer_id 
                                where account_type = 'account'

                                union

                                select trx_code as trx_code,d.dps_id as account_no, t.trx_type as trx_type, t.amount as amount, concat(c.first_name,' ',c.last_name) as name,'DPS' as acc_type, t.trx_date_time as date
                                from transaction t
                                inner join dps d
                                on t.account_no = d.dps_id
                                inner join customer c
                                on d.customer_id=c.customer_id 
                                where account_type = 'dps'


                                union 


                                select trx_code as trx_code,f.fdr_id as account_no, t.trx_type as trx_type, t.amount as amount, concat(c.first_name,' ',c.last_name) as name,'FDR' as acc_type, t.trx_date_time as date
                                from transaction t
                                inner join fdr f
                                on t.account_no = f.fdr_id
                                inner join customer c
                                on f.customer_id=c.customer_id 
                                where account_type = 'fdr'

                                union

                                select transfer_code as trx_code,a.account_no as account_no, 'transfer' as trx_type, t.amount as amount, concat(c.first_name,' ',c.last_name) as name,'Personal Account' as acc_type, t.transfer_date_time as date
                                from transfer_money t
                                inner join account a
                                on t.sender_id = a.account_no
                                inner join customer c
                                on a.customer_id=c.customer_id 
                                order by date desc");

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
                <div class="container">

                    <h3 class="mt-2 mb-3">Report: Transaction History</h3>
                    <table id="export" class="table table-hover table-bordered table-striped text-center">
                        <thead>
                            <tr class="table-dark">
                                <th>SL</th>
                                <th>Trx code</th>
                                <th>Account No</th>
                                <th>Trx Type</th>
                                <th>Amount</th>
                                <th>Account Owner</th>
                                <th>Account Type</th>
                                <th>Date and Time</th>

                            </tr>
                        </thead>
                        <tbody>

                        <style>
                            .pp{
                                background-color: green;
                            }
                        </style>
                            <?php
                            while ($row = mysqli_fetch_assoc($transfer)) {
                            ?>

                                <tr>
                                    <td><?php echo $sl;
                                        $sl = $sl + 1 ?></td>
                                    <td><?php echo $row['trx_code'] ?></td>
                                    <td><?php echo $row['account_no'] ?></td>
                                    <td><p class="pp" style="background-color: <?php if($row['trx_type']=='transfer') echo '#f0932b'; else if($row['trx_type']=='deposit') echo 'green';  else echo '#eb4d4b'?>; color:white; border-radius:4px; "><?php echo $row['trx_type'] ?></p></td>
                                    <td><?php echo $row['amount'] . " Taka" ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['acc_type'] ?></td>
                                   
                                    <td><?php
                                        $datetime = new DateTime($row['date']);
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
                    extend: 'print',
                    className: 'btn'
                }]
            },
            

            "pageLength": 8
        });
    </script>


</body>

</html>