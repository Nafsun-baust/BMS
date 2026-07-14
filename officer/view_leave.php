<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Leave</title>
    <style>
        .cnt {
            width: 60%;
        }

        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .btndiv input,
        .btn-danger {
            margin: 20px 0 0 15px;
        }



        .from,
        .to {
            width: 45%;
        }

        .to {
            margin-left: 10%;
        }
        .error{
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .error p{
           color: red;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();
$leave_id = $_GET['leave_id'];
$error_message= "";





if (isset($_POST['update'])) {
    $leave_from = $_POST['leave_from'];
    $leave_to = $_POST['leave_to'];
    $description = $_POST['description'];
    $reason = $_POST['reason'];

    if($leave_from >$leave_to){
        $error_message = "Invalid leave date";
    }
    else{
        $query = "UPDATE employee_leave SET leave_reason='$reason',description='$description',leave_from='$leave_from',leave_to='$leave_to' 
        WHERE leave_id='$leave_id'";
        mysqli_query($con, $query);
        $_SESSION['msg']="Application Updated successfully";
         header("Location: leave.php");
    }


   
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

            <?php
                        $query = "SELECT * FROM employee_leave
                        WHERE leave_id = '$leave_id'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);

            ?>

            <div class="cnt">
                <div class="container">
                    <h2 class="mt-4 d-flex justify-content-center">Leave Information</h2>
                    <div class="error"><p><?php echo $error_message?></p></div>
                    <form action="" method="post">
                        <div class="d-flex">
                            <div class="mb-3 from">
                                <label class="form-label">Leave Id</label>
                                <input class="form-control" type="text" name="leave_id" value="<?php echo $row['leave_id'] ?>" id="" disabled>
                            </div>

                            <div class="mb-3 to">
                                <label class="form-label">Status</label>
                                <input class="form-control" type="text" name="status" value="<?php echo $row['status'] ?>" id="" disabled>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="mb-3 from">
                                <label class="form-label">Leave From</label>
                                <input class="form-control" type="date" name="leave_from" value="<?php echo $row['leave_from'] ?>" id="" required >
                            </div>

                            <div class="mb-3 to">
                                <label class="form-label">Leave To</label>
                                <input class="form-control" type="date" name="leave_to" value="<?php echo $row['leave_to'] ?>" id="" required >
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Leave Reason</label>
                            <input class="form-control" type="text" name="reason" value="<?php echo $row['leave_reason'] ?>" id="" required >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description"  id="" cols="30" rows="4" required> <?php echo $row['description'] ?> </textarea>
                        </div>

                        <div class="btndiv">
                            <input class="btn btn-success" type="submit" value="Update" name="update" id="" style="display: <?php if ($row['status'] != 'pending') echo 'none' ?>;">
                            <a href="leave.php" class="btn btn-danger">Back</a>
                        </div>

                    </form>
                </div>
            </div>







        </div>
        <!-- End -->
    </div>


</body>

</html>