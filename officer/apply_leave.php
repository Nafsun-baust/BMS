<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Leave</title>
    <style>
        .cnt {
            width: 60%;
        }

        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .btndiv input, .btndiv a{
            margin: 20px 0 0 15px;
        }
        .from,.to{
            width: 45%;
        }
        .to{
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
      include"../database.php";
      session_start();
      $employee_id = $_SESSION['account'];
      $error_message= "";

      if(isset($_POST['apply'])){
        $leave_from = $_POST['leave_from'];
        $leave_to = $_POST['leave_to'];
        $description = $_POST['description'];
        $reason = $_POST['reason'];

        if($leave_from >$leave_to){
            $error_message = "Invalid leave date";
        }
        else{

            $query = "INSERT INTO employee_leave( employee_id, leave_reason, description, status, leave_from, leave_to,apply_date) 
              VALUES ('$employee_id','$reason','$description','pending','$leave_from','$leave_to',CURDATE())";
         mysqli_query($con,$query);

         $_SESSION['msg'] = "Application submited successfully";

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

            <div class="cnt">
                <div class="container">
                    <h2 class="mt-4 d-flex justify-content-center">Apply for Leave</h2>
                    <div class="error"><p><?php echo $error_message?></p></div>
                    <form action="" method="post">
                        <div class="d-flex mt-5">
                            <div class="mb-3 from">
                                <label class="form-label">Leave From</label>
                                <input class="form-control" type="date" name="leave_from" id="" required>
                            </div>

                            <div class="mb-3 to">
                                <label class="form-label">Leave To</label>
                                <input class="form-control" type="date" name="leave_to" id="" required>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Leave Reason</label>
                            <input class="form-control" type="text" name="reason" id=""  required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="4" required></textarea>
                        </div>

                        <div class="btndiv">
                            <input class="btn btn-success" type="submit" value="Apply" name="apply" id="">
                            <input class="btn btn-secondary" type="reset" name="" id="">
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