<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>

    <title>Complain</title>

    <style>
        body {
            box-sizing: border-box;
        }


        .main {
            background-color: #EEEEEE;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .card {
            height: 100vh;
        }
    </style>
</head>


<?php
include("../database.php");
session_start();

$account_no = $_SESSION['account'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $details = $_POST['details'];

    mysqli_query($con, "INSERT INTO `complain`( `account_no`, `name`, `email`, `subject`, `details`, `date`) 
    VALUES ('$account_no','$name','$email','$subject','$details',CURDATE())");
    // echo "<script> alert('Your complain added successfully.') </script>";
    $_SESSION['msg']="Your complain added successfully.";
    header(("Location: complain.php"));
}



?>



<body>

    <div class="d-flex" style="width: 100%;  box-sizing: border-box; overflow:hidden;">
        <div>
            <?php include "account_sidebar.php" ?>
        </div>



        <div style="width: 100%;" class="aaa">
            <div>
                <?php include "account_header.php" ?>
            </div>
            <!-- Start -->
            <div class="main">
                <style>
                    .a p {
                        background-color: #40407a;
                        width: 100%;
                        color: white;
                        padding-left: 20px;
                        font-size: 25px;
                    }

                    .btn-dark {
                        margin-top: 20px;
                        margin-left: 200px;
                    }

                    .b {
                        padding: 0 50px;
                    }
                </style>
               

                <div class="card">
                    <div class="a">
                        <p>Complain Form</p>

                    </div>

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
                    <div class="b">

                        <form action="" method="post">
                            <div class="d-flex">
                                <div>
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="" required>
                                </div>
                                <div style="margin-left: 20px;">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="" required>
                                </div>
                            </div>

                            <div class="mt-2">
                                <label for="" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" id="" required>
                            </div>

                            <div class="mt-2">
                                <label for="" class="form-label">Complaint Details</label>
                                <textarea class="form-control" name="details" id="" cols="30" rows="10" required></textarea>
                            </div>

                            <input class="btn btn-dark" type="submit" value="Submit" name="submit" id="">



                        </form>




                    </div>

                </div>












            </div>
            <!-- End -->
        </div>

    </div>


</body>

</html>

<script>



</script>