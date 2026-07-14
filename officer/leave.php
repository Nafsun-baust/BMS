<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave</title>
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

        .div {
            position: relative;
            display: flex;
        }

        .search_div {
            position: absolute;
            right: 0;
            bottom: 15px;
        }

        .searchbtn {
            background-color: #22a6b3;
            border: none;
            padding: 2px 8px;
            color: white;
            border-radius: 3px;

        }
    </style>
</head>


<?php
include "../database.php";
session_start();
$employee_id = $_SESSION['account'];
$search = "";

if (isset($_POST['searchbtn'])) {
    $search = $_POST['search'];
}


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
                    <h2 class="mt-3 mb-3 d-flex justify-content-center">Your all Leave Information</h2>

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


                    <div class="div d-flex">
                    <a href="apply_leave.php"> <button class="l1">Apply for Leave</button></a>
                        <form method="post">
                            <div class="search_div">
                                <input type="text" name="search" id="">
                                <input type="submit" value="Search" class="searchbtn" name="searchbtn" id="">
                            </div>
                        </form>
                    </div>

                    <table class="table table-hover text-center">
                        <tr class="table-dark">
                            <th>Leave Id</th>
                            <th>Status</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        $query = "SELECT * FROM employee_leave
                                       WHERE employee_id = '$employee_id' and leave_id like '%$search%'
                                        order by leave_id desc";
                        $result = mysqli_query($con, $query);

                        while ($row = mysqli_fetch_assoc($result)) {



                        ?>

                            <tr>
                                <td><?php echo $row['leave_id'] ?></td>
                                <td><?php echo $row['status'] ?></td>
                                <td><?php echo $row['leave_from'] ?></td>
                                <td><?php echo $row['leave_to'] ?></td>
                                <td>
                                    <a href="cancel_leave.php?leave_id=<?php echo $row['leave_id'] ?>" style="display: <?php if ($row['status'] != 'pending') echo 'none' ?>;"><button onclick="return remove()" class="cancel">Cancel</button></a>
                                    <a href="view_leave.php?leave_id=<?php echo $row['leave_id'] ?>"><button class="view">Update</button></a>
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

<script>

  function remove(){
    return confirm("Are you sure to cancel this application?");
  }

</script>