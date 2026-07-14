<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Leave Request</title>


    <style>
        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .pic_div {
            border: 2px double #636e72;
            height: 210px;
            width: 210px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            margin-left: 10%;
            border-radius: 10px;


        }

        .pic {
            height: 200px;
            width: 200px;
        }

        .name_div {
            margin-left: 3%;
        }

        .name_div p {
            color: black;
            font-size: 20px;
            font-weight: bold;

        }

        .card {
            margin: 20px 40px;
            padding: 30px 10px;
        }

        .des_div {
            padding: 20px 30px;
        }

        .des {
            font-size: 20px;
            font-weight: bold;
        }

        .des2 {
            text-align: justify;
            font-size: 17px;
        }

        .btn_div {
            margin: 20px 20px;
        }

        .btn_div input {
            margin-left: 15px;
        }
        .id{
           margin-left: 20px;
        }
        .id p{
           font-size: 18px;
           font-weight: bold;
        }
        .id label{
            font-size: 16px;
            margin: 3px 8px;

        }
    </style>
</head>


<?php
include "../database.php";
session_start();
$leave_id = $_GET['id'];

$leave = mysqli_fetch_assoc(mysqli_query($con,"SELECT *
                                               FROM employee_leave
                                               INNER JOIN employee
                                               USING(employee_id)
                                               WHERE leave_id = '$leave_id'"));

if(isset($_POST['accept'])){
    mysqli_query($con,"UPDATE `employee_leave` SET `status`='accept',`acceptorreject_date`=CURDATE()
    WHERE leave_id = '$leave_id'");
    $_SESSION['msg'] = "Request Accepted Successfully";
    header("Location: leave_request.php");
}

if(isset($_POST['reject'])){
    mysqli_query($con,"UPDATE `employee_leave` SET `status`='reject',`acceptorreject_date`=CURDATE()
    WHERE leave_id = '$leave_id'");
    $_SESSION['msg'] = "Request Rejected Successfully";
     header("Location: leave_request.php");
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


            <div style="width: 100%;">
                <h3 class="d-flex justify-content-center mt-3 mb-3">Employee Leave Request</h3>


              

                <div class="card">
                    <div class="d-flex">
                        <div class="pic_div">
                            <img class="pic" src="<?php
                                if($leave['picture']==NULL){
                                    if($leave['gender']=="Male"){
                                        echo "../logo/male_avatar.png";
                                    }
                                    else{
                                        echo "../logo/female_avatar.png";
                                    }
                                }
                                else{
                                    echo $leave['picture'];
                                }
                            
                            
                            
                            ?>" alt="">
                        </div>
                        <div class="name_div">
                            <div>
                                <p style=" margin-bottom: 3px;"><?php echo $leave['first_name']." ".$leave['last_name'] ?></p>
                                <p style=" margin-bottom: 3px; font-weight: 400; font-size:18px"><?php echo $leave['email'] ?></p>
                                <p style="margin-bottom: 20px;"><?php echo $leave['designation'] ?></p>
                                <p style="font-size: 18px;">Leave Reason: <label style="font-weight: 400;"><?php echo $leave['leave_reason'] ?></label></p>
                                <p style="font-size: 18px;">Leave Duration: <label style="font-weight: 400;"> &nbsp;<?php echo $leave['leave_from'] ?> &nbsp; &nbsp; to &nbsp;&nbsp; <?php echo $leave['leave_to'] ?> = <?php 
                                                                                                                                                                                            $start = strtotime($leave['leave_from']);
                                                                                                                                                                                            $end = strtotime($leave['leave_to']);
                                                                                                                                                                                            $day = ceil(abs($end - $start) / 86400);
                                                                                                                                                                                            echo $day;
                                
                                                                                                                                                                                              ?> Days</label></p>
                            </div>
                        </div>
                        <div class="id">
                            <div class="d-flex">
                            <p>Employee Id: </p>
                            <label><?php echo $leave['employee_id']?></label>
                            </div>
                           
                            <div class="d-flex">
                            <p>Leave Id: </p>
                            <label><?php echo $leave['leave_id']?></label>
                            </div>
                        </div>
                    </div>


                    <div class="des_div">

                        <p class="des">Description:</p>
                        <p class="des2"><?php echo $leave['description'] ?></p>



                    </div>
                    <div class="btn_div d-flex">
                        <form action="" method="post">
                            <div class="d-flex">
                                <p onclick="return accept()"><input class="btn btn-success" type="submit" value="Accept" name="accept" id=""></p>
                                <p onclick="return reject()"> <input class="btn btn-danger" type="submit" value="Reject" name="reject" id=""></p>
                            </div>
                        </form>
                        <a style="margin-left: 15px;" href="leave_request.php"><button class="btn btn-secondary">Back</button></a>
                    </div>
                </div>

            </div>







        </div>
        <!-- End -->
    </div>


</body>

</html>


<script>
    function accept() {
        return confirm("Are you want to accept this request?");
    }

    function reject() {
        return confirm("Are you want to reject this request?");
    }
</script>