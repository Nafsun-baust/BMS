<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <style>
        .edit {
            border: none;
            background-color: #1B9CFC;
            color: white;
            border-radius: 3px;
        }

        .rolback {
            border: none;
            background-color: #f53b57;
            color: white;
            border-radius: 3px;
        }
        .table{
            border: 2px solid black;
        }
        .table tr th{
            background-color: #00d8d6;
        }
    </style>
</head>

<?php
include("../database.php");
session_start();

$query = "SELECT * FROM transaction";

$result = mysqli_query($con, $query);



?>

<body>

    <div>
        <?php include "jo_header.php" ?>
    </div>

    <div class="d-flex">

        <div>
            <?php include "jo_sidebar.php" ?>
        </div>
        <!-- Start -->
        <div class="main">


            <h2 class="navbar d-flex justify-content-center">All Transaction Here</h2>


            <div class="container">

                <table class="table text-center table-responsive">
                    <tr>
                        <th>Trx Code</th>
                        <th>Account</th>
                        <th>Account Type</th>
                        <th>Trx Type</th>
                        <th>Amount</th>
                        <th>Action</th>

                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <tr>
                            <td><?php echo $row['trx_code'] ?></td>
                            <td><?php echo $row['account_no'] ?></td>
                            <td><?php echo $row['account_type'] ?></td>
                            <td><?php echo $row['trx_type'] ?></td>
                            <td><?php echo $row['amount'] ?></td>
                            <td>
                                <a href=""><button class="rolback">Roll Back</button></a>
                                <a href=""><button class="edit">Edit</button></a>
                            </td>

                        </tr>


                    <?php  } ?>

                </table>

            </div>








        </div>
        <!-- End -->
    </div>


</body>

</html>