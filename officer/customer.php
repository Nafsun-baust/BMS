<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Customer</title>
    <style>
        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 80%;
        }

        .l1 {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 8px 10px;
            border-radius: 5px;
            margin: 0 0 10px 0;
        }

        .fa-pen-to-square {
            color: black;
            font-size: 20px;
            margin-top: 3px;
        }

        .material-icons {
            font-size: 45px;
            margin-left: 5px;
        }

        .tt {
            display: flex;
            justify-content: center;
        }

        .new {
            margin-bottom: 10px;
        }

        .new button {
            padding: 6px 10px;
            background-color: #22a6b3;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hdiv {
            position: relative;
        }

        .searchdiv {
            margin-bottom: 10px;
            position: absolute;
            right: 10px;
        }

        .fc {
            margin-left: 15px;
            height: 38px;
            width: 250px;
            border-radius: 5px;

        }

        .btnn {
            margin-left: 10px;
            padding: 6px 10px;
            background-color: #22a6b3;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;

        }
    </style>
</head>


<?php
include "../database.php";
session_start();
$search = "";

if (isset($_POST['searchbtn'])) {
    $search = $_POST['searchinput'];
}

$result = mysqli_query($con, "SELECT * FROM customer
                             WHERE customer_id LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR nid LIKE '%$search%'
                             ORDER BY customer_id DESC");




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
                <div class="container">
                    <h2 class="mt-3 mb-3 d-flex justify-content-center">All Customer</h2>

                    <?php
                    if (isset($_SESSION['delete_message'] ) && $_SESSION['delete_message'] != "") {
                        $msg =  $_SESSION['delete_message'];
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                        $_SESSION['delete_message'] = "";
                    }
                    ?>




                    <div class="d-flex hdiv">
                        <div class="new">
                            <a href="add_customer.php"><button>New Customer</button></a>

                        </div>

                        <div class="searchdiv d-flex">
                            <form action="" method="post">
                                <div class="d-flex">
                                    <input class="form-control fc" style=" border: 2px solid #95a5a6;" type="text" name="searchinput" id="">
                                    <input class="btnn" type="submit" value="Search" name="searchbtn" id="">
                                </div>

                            </form>

                        </div>
                    </div>

                    <table class="table table-hover text-center">
                        <tr class="table-dark">
                            <th>Customer Id</th>
                            <th>Name</th>
                            <th>NID</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <tr>
                                <td><?php echo $row['customer_id'] ?></td>
                                <td><?php echo $row['first_name'] . " " . $row['last_name']  ?></td>
                                <td><?php echo $row['nid'] ?></td>
                                <td class="tt">
                                    <div>
                                        <a href="update_customer.php?customer_id=<?php echo $row['customer_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>

                                    <div>
                                        <a class="link-dark" name='delete' href="delete_customer.php?customer_id=<?php echo $row['customer_id'] ?>"><i class="material-icons">delete</i></a>
                                    </div>

                                </td>
                            </tr>

                        <?php } ?>

                    </table>
                </div>
            </div>



        </div>
        <!-- End -->
    </div>


</body>

</html>