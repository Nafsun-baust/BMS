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

$account_no = $_SESSION['account'];



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

                <table class="table table-hover">
                     <tr>
                        <th>Account No</th>
                        <th>Name</th>
                        <th>Action</th>
                     </tr>

                     <?php
                     $q = mysqli_query($con,"SELECT * FROM beneficiary where source_acc_no = '$account_no'");

                     while($row = mysqli_fetch_assoc($q)){


                     ?>

                     <tr>
                        <td><?php echo $row['ben_acc_no'] ?></td>
                        <td><?php echo $row['ben_name'] ?></td>
                        <td>
                            <a href="delete_beneficiary.php?ben_acc_no=<?php echo $row['ben_acc_no']?>"><button>Delete</button></a>
                        </td>
                     </tr>


                     <?php } ?>



                </table>






                </div>

              


            </div>
            <!-- End -->
        </div>

    </div>


</body>

</html>

<script>



</script>