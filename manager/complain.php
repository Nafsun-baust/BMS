<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Complain </title>

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




$transfer = mysqli_query($con, "SELECT * from complain
                                order by complain_id desc");

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

                    <h3 class="mt-2 mb-3">Complain</h3>
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
                    <table id="export" class="table table-hover table-bordered table-striped text-center">
                        <thead>
                            <tr class="table-dark">
                                <th>Complain Id</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>

                            <style>
                                .pp {
                                    background-color: green;
                                }
                            </style>
                            <?php
                            while ($row = mysqli_fetch_assoc($transfer)) {
                            ?>

                                <tr>
                                    <td><?php echo $row['complain_id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['subject'] ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td>
                                        <a href="view_complain.php?complain_id=<?php echo $row['complain_id']?>"><button>View</button></a>

                                    </td>


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
                    // extend: 'print',
                    // className: 'btn'
                }]
            },


            "pageLength": 8
        });
    </script>


</body>

</html>