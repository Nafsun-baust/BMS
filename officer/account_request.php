<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Request</title>
    <style>
        h2 {
            display: flex;
            justify-content: center;

        }

        .view {
            border: none;
            background-color: #1B9CFC;
            color: white;
            border-radius: 3px;
            height: 30px;
            width: 50px;
        }
    </style>
</head>
<?php
include("../database.php");
session_start();
$query = "SELECT * 
                      FROM account
                      INNER JOIN customer
                      USING(customer_id)
                      INNER JOIN acc_type
                      USING(at_code)
                      WHERE status = 'pending'";

$result = mysqli_query($con, $query);

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





        <div class="main ">

            <h2>Requested Account</h2>
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

            <div class="container">

                <table style="margin-top: 30px;" class="table">

                    <tr>
                        <th>Customer Name</th>
                        <th>Account No</th>
                        <th>Account Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {


                    ?>

                        <tr>
                            <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                            <td><?php echo $row['account_no'] ?></td>
                            <td><?php echo $row['acc_name'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td>
                                <a href="view_account_request.php? account_no=<?php echo $row['account_no'] ?>"><button class="view">View</button></a>
                            </td>
                        </tr>

                    <?php  }  ?>


                </table>

            </div>





        </div>
        <!-- End -->
    </div>


</body>

</html>