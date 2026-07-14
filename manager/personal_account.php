<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <style>
         .main{
            background-color: #e1e9e1;
        }
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

        .table {
            border: 2px solid black;
        }

        .table tr th {
            background-color: #00d8d6;
        }
        .search_div {
                        position: relative;
                        margin-top: 50px;
                    }

                    .search_div form {
                        position: absolute;
                        right: 0;
                        bottom: 5px;
                    }

                    .search {
                        height: 30px;
                        width: 200px;
                        border: 2px solid gray;
                        border-radius: 5px;
                    }

                    .searchbtn {
                        height: 30px;
                        width: 70px;
                        border: none;
                        border-radius: 3px;
                        background-color: #22a6b3;
                        color: white;
                        font-weight: bold;
                        margin-right: 5px;
                    }

                    .sel {
                        height: 30px;
                        width: 200px;
                        border-radius: 3px;
                        background-color: #bdc3c7;
                        padding-left: 10px;
                    }
                    .deposit,.withdraw, .instalment{
                            border: none;
                            padding: 3px 5px;
                            border-radius: 3px;
                            font-weight: bold;
                            color: white;
                        }
                        .deposit{
                            background-color: #3B3B98;
                           
                        }
                        .withdraw{
                            background-color: #6F1E51;
                           
                        }
                        .instalment{
                           background-color: #1289A7;
                        }
    </style>
</head>

<?php
include("../database.php");
session_start();
$result = "";
$search = "";
$tt = 'faka';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchbtn'])) {
    $search = $_POST['search'];
}

if (isset($_POST['acc_type'])) {

    if ($_POST['acc_type'] == 'pa') {
        $tt = 'pa';
        $result = mysqli_query($con, "SELECT a.account_no as account_no, concat(c.first_name,' ',c.last_name) as customer_name, concat('Personal Account (',at.acc_name,')') as type , a.opening_date as opening_date,status
                            from account a
                            inner join customer c
                            using(customer_id)
                            inner join acc_type at
                            using(at_code)
                            where status='active' and (account_no like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')
                            order by opening_date desc ;");
    } else if ($_POST['acc_type'] == 'loan') {
        $tt = 'loan';
        $result = mysqli_query($con, " SELECT l.loan_id as account_no, concat(c.first_name,c.last_name) as customer_name, 'LOAN' as type ,l.approval_date as opening_date,status
                            from loan l
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (l.loan_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')
                            order by opening_date desc ;");
    } else if ($_POST['acc_type'] == 'fdr') {
        $tt = 'fdr';
        $result = mysqli_query($con, " SELECT f.fdr_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'FDR' as type ,f.opening_date as opening_date,status
                            from fdr f
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (f.fdr_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')
                            order by opening_date desc ;");
    } else if ($_POST['acc_type'] == 'dps') {
        $tt = 'dps';
        $result = mysqli_query($con, " SELECT d.dps_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'DPS' as type ,d.opening_date as opening_date,status
                            from dps d
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (d.dps_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')
                            order by opening_date desc ;");
    } else {
        $tt = 'faka';
        $result = mysqli_query($con, "SELECT a.account_no as account_no, concat(c.first_name,' ',c.last_name) as customer_name, concat('Personal Account (',at.acc_name,')') as type , a.opening_date as opening_date,status
                            from account a
                            inner join customer c
                            using(customer_id)
                            inner join acc_type at
                            using(at_code)
                            where status='active' and (account_no like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')

                            UNION

                            SELECT d.dps_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'DPS' as type ,d.opening_date as opening_date,status
                            from dps d
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (d.dps_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')

                            UNION

                            SELECT f.fdr_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'FDR' as type ,f.opening_date as opening_date,status
                            from fdr f
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (f.fdr_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')

                            UNION

                            SELECT l.loan_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'LOAN' as type ,l.approval_date as opening_date,status
                            from loan l
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (l.loan_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')
                            order by opening_date desc ;");
    }
}




if ($tt == 'faka') {
    $result = mysqli_query($con, "SELECT a.account_no as account_no, concat(c.first_name,' ',c.last_name) as customer_name, concat('Personal Account (',at.acc_name,')') as type , a.opening_date as opening_date,status
                            from account a
                            inner join customer c
                            using(customer_id)
                            inner join acc_type at
                            using(at_code)
                            where status='active' and (account_no like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')

                            UNION

                            SELECT d.dps_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'DPS' as type ,d.opening_date as opening_date,status
                            from dps d
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (d.dps_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')

                            UNION

                            SELECT f.fdr_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'FDR' as type ,f.opening_date as opening_date,status
                            from fdr f
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (f.fdr_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')

                            UNION

                            SELECT l.loan_id as account_no, concat(c.first_name,' ',c.last_name) as customer_name, 'LOAN' as type ,l.approval_date as opening_date,status
                            from loan l
                            inner join customer c
                            using(customer_id)
                            where status!='closed' and (l.loan_id like '%$search%' or c.first_name like '%$search%' or c.last_name like '%$search%')
                            order by opening_date desc ;");
}






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



            <h2 class="navbar d-flex justify-content-center mt-2 mb-3">All Account Here</h2>



            <div class="container">

                <style>

                </style>

                <div class="search_div">
                    <form action="" method="post">
                        <input class="search" type="text" name="search" id="">
                        <input class="searchbtn" type="submit" value="Search" name="searchbtn" id="">
                        <select class="sel" name="acc_type" id="" onchange="this.form.submit()">
                            <option value="faka" <?php if ($tt == 'faka') echo 'selected' ?>>Select Account Type</option>
                            <option value="pa" <?php if ($tt == 'pa') echo 'selected' ?>>Personal Account</option>
                            <option value="dps" <?php if ($tt == 'dps') echo 'selected' ?>>DPS Account</option>
                            <option value="fdr" <?php if ($tt == 'fdr') echo 'selected' ?>>FDR Account</option>
                            <option value="loan" <?php if ($tt == 'loan') echo 'selected' ?>>LOAN Account</option>

                        </select>
                    </form>


                </div>

                <table class="table text-center table-responsive">
                    <tr>
                        <th>Account No</th>
                        <th>Customer Name</th>
                        <th>Account Type</th>
                        <th>Opening Date</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    <style>
      

                    </style>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <tr>
                            <td><?php echo $row['account_no'] ?></td>
                            <td><?php echo $row['customer_name'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['opening_date'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td>
                                <div class="pa" style="display:<?php if(substr($row['type'],0,1)!='P') echo 'none' ?>;" >
                                    <a href="pa_deposit.php?account_no=<?php echo $row['account_no']?>"><button class="deposit">Deposit</button></a>
                                    <a href="pa_withdraw.php?account_no=<?php echo $row['account_no']?>"><button class="withdraw">Withdraw</button></a>
                                </div>

                                <div class="dps" style="display:<?php if($row['type']!='DPS') echo 'none' ?>;" >
                                    <a href="dps_instalment.php?dps_id=<?php echo $row['account_no']?>"><button class="instalment">Instalment</button></a>
                                    <a href="dps_withdraw.php?dps_id=<?php echo $row['account_no']?>"><button class="withdraw">Withdraw</button></a>
                                </div>

                                <div class="fdr" style="display:<?php if($row['type']!='FDR') echo 'none' ?>;" >
                                    <a href=""><button class="deposit">Deposit</button></a>
                                    <a href=""><button class="withdraw">Withdraw</button></a>
                                </div>

                                <div class="loan" style="display:<?php if($row['type']!='LOAN') echo 'none' ?>;" >
                                    <a href=""><button class="instalment">Instalment</button></a>
                                    <a href=""><button class="withdraw">Withdraw</button></a>
                                </div>

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