<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Notice</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 50%;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();

$complain_id = $_GET['complain_id'];
$query = "select * from complain where complain_id = '$complain_id'";
$table = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($table);



if (isset($_POST['replybtn'])) {
    $replay = $_POST['replay'];

    mysqli_query($con,"UPDATE `complain` SET `replay`='$replay' WHERE complain_id='$complain_id'");
     $_SESSION['msg']="Replay send successfull";
    header(("Location: complain.php"));    



  
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

                <h2 class="d-flex justify-content-center mt-3 mb-4">Complain</h2>
               


                <form action="" method="post" >

                 <div>
                    <div class="d-flex">
                        <h5>Complain ID: </h5>&nbsp;&nbsp;
                        <p><?php echo $row['complain_id']?></p>
                    </div>
                    <div class="d-flex">
                        <h5>Name: </h5>&nbsp;&nbsp;
                        <p><?php echo $row['name']?></p>
                    </div>
                    <div class="d-flex">
                        <h5>Email: </h5>&nbsp;&nbsp;
                        <p><?php echo $row['email']?></p>
                    </div>
                    <div class="d-flex">
                        <h5>Subject: </h5>&nbsp;&nbsp;
                        <p><?php echo $row['subject']?></p>
                    </div>
                    <div >
                        <h5>Complain: </h5>&nbsp;&nbsp;
                       <div>
                        <p><?php echo $row['details']?></p>
                       </div>
                    </div>
                 </div>


                 <div>
                    <textarea class="form-control" name="reply" id="" cols="30" rows="10"></textarea>
                   <input type="submit" class="btn btn-dark" value="Replay" style="margin-top: 20px;" name="replybtn" id=""> 

                </div>
                    
                    

                </form>

            </div>









        </div>
        <!-- End -->

    </div>

</body>

</html>