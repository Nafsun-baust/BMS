<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Report: Transfer Money  </title>

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
$transfer = mysqli_query($con, "SELECT  tm.transfer_code trx,a.account_no sender_id, concat(c.first_name,c.last_name) sender_name,tm.amount amount ,aa.account_no receiver_id,concat(cc.first_name,cc.last_name) receiver_name, tm.transfer_date_time date
                                FROM transfer_money tm
                                inner join account a
                                on tm.sender_id = a.account_no
                                inner join customer c
                                on a.customer_id = c.customer_id
                                inner join account aa
                                on tm.receiver_id = aa.account_no
                                inner join customer cc
                                on aa.customer_id = cc.customer_id
                                order by transfer_date_time desc");

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

                    <h3 class="mt-2 mb-3">Report: Transfer Money</h3>
                    <table id="export" class="table table-hover table-bordered table-striped text-center">
                        <thead>
                            <tr class="table-dark">
                                <th>SL</th>
                                <th>Trx code</th>
                                <th>Account No</th>
                                <th>Account Owner</th>
                                <th>Amount</th>
                                <th>Receiver Account</th>
                                <th>Receiver Name</th>
                                <th>Date and Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($transfer)) {
                            ?>

                                <tr>
                                    <td><?php echo $sl;
                                        $sl = $sl + 1 ?></td>
                                    <td><?php echo $row['trx'] ?></td>
                                    <td><?php echo $row['sender_id'] ?></td>
                                    <td><?php echo $row['sender_name'] ?></td>
                                    <td><?php echo $row['amount'] . " Taka" ?></td>
                                    <td><?php echo $row['receiver_id'] ?></td>
                                    <td><?php echo $row['receiver_name'] ?></td>
                                   
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