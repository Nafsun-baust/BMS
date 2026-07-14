<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View DPS</title>
    <style>
        .cnt{
            margin-top: 50px;
            margin-left: 50px;
        }
        table{
            
        }
       table th, table td{
            border:2px solid black;
            height: 40px;
            padding-left: 10px;
        }
        th{
            width: 200px;
          
           
           
        }
        td{
            width: 500px;

        }

    </style>
</head>

<?php 
include"../database.php";

$dps_id = $_GET['dps_id'];

$query = "SELECT *
          FROM dps d
          INNER JOIN dps_scheme ds
          USING(scheme_id)
          WHERE d.dps_id='$dps_id'";
$table = mysqli_query($con,$query);
$row = mysqli_fetch_assoc($table);



?>


<body>
    <div>
        <?php include "officer_header.php" ?>
    </div>
    <div class="d-flex">
        <div>
            <?php include "officer_sidebar.php" ?>
        </div>
        <!-- Start -->
        <div class="main">
            
        <div class="cnt">
             <table>
                  <tr>
                    <th>DPS Id</th>
                    <td><?php echo $row['dps_id']?></td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td><?php echo $row['status']?></td>
                  </tr>
                  <tr>
                    <th>Balance</th>
                    <td><?php echo $row['current_balance']."  Taka"?></td>
                  </tr>
                  <tr>
                    <th>Paid Installment</th>
                    <td><?php echo $row['paid_installment']?></td>
                  </tr>
                  <tr>
                    <th>Total Installment</th>
                    <td><?php echo $row['total_installment']?></td>
                  </tr>
                  <tr>
                    <th>Tenure</th>
                    <td><?php echo $row['tenure']."  Month"?></td>
                  </tr>
                  <tr>
                    <th>Maturity Amount</th>
                    <td><?php echo $row['maturity_amount']."  Taka"?></td>
                  </tr>
                  <tr>
                    <th>Installment Amount</th>
                    <td><?php echo $row['installment_amount']."  Taka"?></td>
                  </tr>
                  <tr>
                    <th>Interest Rate</th>
                    <td><?php echo $row['interest_rate']."%"?></td>
                  </tr>
             </table>
             <a href="dps.php"><button class="btn btn-primary mt-4">Back</button></a>

        </div>



        </div>
        <!-- End -->

    </div>

</body>

</html>