<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap_css.css">
    <script src="../bootstrap/bootstrap_js.js"></script>
    <title>Invoice</title>
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
            width: 1100px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .table_div {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }

        .table1_div {
            width: 500px;
            margin: 0 25px;


        }

        .table2_div {
            width: 500px;
            margin: 0 25px;
        }

        .table1 {
            border-collapse: collapse;
        }

        header {
            background-color: #bdc3c7;
            padding: 5px 20px;
            font-weight: bold;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
            font-size: 22px;
            border: 2px solid #7f8c8d;
            border-bottom: none;
        }

        table {}

        table th,
        table td {
            border: 2px solid #7f8c8d;
            height: 35px;
            padding: 5px 10px;

        }

        table th {
            width: 180px;
        }

        table td {
            width: 320px;
        }

        .table2 {}

        .logo {
            height: 80px;
            width: 80px;
            margin-top: 15px;
        }

        .phone,
        .email {
            margin-top: -15px;
        }

        .btnn {
            background-color: #3498db;
            border: none;
            font-size: 20px;
            padding: 5px 15px;
            border-radius: 5px;
            margin-top: 40px;
            color: white;
            margin-left: 440px;

        }
        .hdiv{
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
    </style>
</head>

<?php
include "../database.php";
session_start();

$query = "SELECT MAX(fdr_id) as id FROM fdr";
$table = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($table);
$fdr_id = $row['id'];


$query2 = "SELECT * 
           FROM fdr f
           INNER JOIN fdr_scheme fs
           USING(scheme_id)
           INNER JOIN customer c
            USING(customer_id)
            WHERE f.fdr_id= '$fdr_id'";

$table2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_assoc($table2);




?>

<body>
    <div class="cnt">
        <div class="text-center">
            <img class="logo" src="../logo/logo.png" alt="Bank Logo">
            <h2 class="mt-2">Nexus Capital Bank Limited</h2>
            <h5>Building Trust, Empowering Futures</h5>
            <p>Shadhinata Tower, Bir Srestha Shaheed Jahangir Gate Dhaka Cantonment, Dhaka-1206.</p>
            <p class="phone">Phone: +88-02-55478856-6</p>
            <p class="email">Email: ncbl@gmail.com</p>
        </div>
        <div class="d-flex hdiv">
            <p class="fdr">New FDR Account</p>
            <p class="date">Date: <?php echo date("d-m-Y") ?> </p>
        </div>

        <div class="d-flex table_div">
            <div class="table1_div">
                <table class="table2">

                    <header>FDR Account Details</header>
                    <tr>
                        <th>FDR Id</th>
                        <td><?php echo $row2['fdr_id'] ?></td>
                    </tr>
                    <tr>
                        <th>Customer Id</th>
                        <td><?php echo $row2['customer_id'] ?></td>
                    </tr>
                    <tr>
                        <th>Customer Name</th>
                        <td><?php echo $row2['first_name'] . " " . $row2['last_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Pin Code</th>
                        <td><?php echo $row2['pin_code'] ?></td>
                    </tr>
                    <tr>
                        <th>Principle Amount</th>
                        <td><?php echo $row2['principle_amount'] . " Taka" ?></td>
                    </tr>
                </table>





            </div>









            <div class="table2_div">
                <table class="table2">
                    <header>Scheme Details</header>
                    <tr>
                        <th>Scheme Id</th>
                        <td><?php echo $row2['scheme_id'] ?></td>
                    </tr>
                    <tr>
                        <th>Tenure</th>
                        <td><?php echo $row2['tenure'] . " month" ?></td>
                    </tr>
                    <tr>
                        <th>Maturity Amount</th>
                        <td><?php echo $row2['principle_amount'] + (((($row2['principle_amount'] / 100) * $row2['interest_rate']) / 12) * $row2['tenure']) . " Taka" ?></td>
                    </tr>
                    <tr>
                        <th>Interest Rate</th>
                        <td><?php echo $row2['interest_rate'] . "%" ?></td>
                    </tr>
                </table>
                <a href="fdr_create.php"><button class="btnn">Ok</button></a>
            </div>


        </div>


    </div>
</body>

</html>