<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>


    <style>
        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 80%;
        }

        .cancel,
        .view {
            border: none;
            font-size: 15px;
            height: auto;
            width: auto;
            padding: 3px 7px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .cancel {
            background-color: #e84118;
        }

        .view {
            background-color: #0097e6;
        }

        .l1 {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 8px 10px;
            border-radius: 5px;
            margin: 0 0 10px 0;


        }

        .male_avatar {
            height: 70px;
            width: 70px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .search_div {
            width: 100%;
            position: relative;
        }

        .search_div form {
            position: absolute;
            bottom: 5px;
            right: 0;

        }

        .search_div select {
            height: 30px;
            width: 200px;
            border: 2px solid gray;
            border-radius: 3px;
        }
    </style>
</head>


<?php
include "../database.php";
session_start();
$month = NULL;
if (isset($_POST['month'])) {
    $month = $_POST['month'];
    if($month=='faka'){
        $month = NULL;
    }
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
            <div class="cnt">
                <div class="container">
                    <h2 class="mt-3 mb-5 d-flex justify-content-center">All Leave Request</h2>

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


                    <?php
                    $month_table = mysqli_query($con, "SELECT DISTINCT DATE_FORMAT(apply_date, '%M %Y') month
                                                                       FROM employee_leave;");

                    ?>
                    <div class="search_div">
                        <form action="" method="post">
                            <select name="month" id="" onchange="this.form.submit()">
                            <option value="faka" <?php if($month==NULL) echo 'selected' ?> >Month</option>
                                <?php
                                while ($row2 = mysqli_fetch_assoc($month_table)) {
                                ?>
                                    <option <?php  if($row2['month']==$month) echo 'selected' ?>  value="<?php echo $row2['month'] ?>"><?php echo $row2['month'] ?></option>
                                <?php } ?>

                            </select>
                        </form>

                    </div>

                    <div>

                    </div>
                    <table class="table table-hover text-center">
                        <tr class="table-dark">
                            <th>Leave Id</th>
                            <th>Employee Name</th>
                            <th>Leave Duration</th>
                            <th>Apply Date</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        if ($month == NULL) {
                            $query = "SELECT * FROM employee_leave
                                        INNER JOIN employee 
                                        USING(employee_id)
                                        where status='pending'";
                        }
                        else{
                            $query = "SELECT * FROM employee_leave
                                        INNER JOIN employee 
                                        USING(employee_id)
                                        where status='pending' AND DATE_FORMAT(apply_date, '%M %Y')='$month'";
                        }

                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <style>
                                td {
                                    height: 80px;
                                    background-color: green;

                                }

                                td p {
                                    margin-top: 20px;
                                }
                            </style>

                            <tr>
                                <div>
                                    <td>
                                        <p><?php echo $row['leave_id'] ?></p>
                                    </td>
                                    <td>
                                        <img class="male_avatar" src="<?php
                                                                        if ($row['picture'] == null) {
                                                                            if ($row['gender'] == 'Male') {
                                                                                echo '../logo/male_avatar.png';
                                                                            } else {
                                                                                echo '../logo/female_avatar.png';
                                                                            }
                                                                        } else {
                                                                            echo $leave['picture'];
                                                                        }


                                                                        ?>" alt="">
                                        <?php echo $row['first_name'] . " " . $row['last_name'] ?>
                                    </td>

                                    <td>
                                        <p><?php
                                            $start = strtotime($row['leave_from']);
                                            $end = strtotime($row['leave_to']);
                                            $day = ceil(abs($end - $start) / 86400);
                                            echo $day . " Days";
                                            ?></p>
                                    </td>

                                    <td>
                                        <p><?php
                                            $date = DateTime::createFromFormat('Y-m-d',  $row['apply_date']);
                                            echo $date->format('d F, Y');
                                            ?></p>
                                    </td>
                                    <td>
                                        <p><a href="show_leave_request.php?id=<?php echo $row['leave_id'] ?>"><i style="color: black; height:25px; width:25px;" class="fa-solid fa-eye"></i></a></p>
                                    </td>

                                </div>

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


