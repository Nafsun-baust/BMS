<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Atm Booth</title>
    <style>
        .cnt {
            width: 60%;
        }

        .main {
            display: flex;
            justify-content: center;
        }

        .div2 div {
            width: 45%;
        }

        .div1 div {
            width: 100%;
        }

        .div3 div {
            width: 30%;
        }

        .btn-success {
            margin: 20px 0 0 10px;
            width: 80px;
        }

        .avl {
            margin-top: 35px;
        }

        .avl input {
            margin-right: 15px;
        }
    </style>
</head>


<?php
    include("../database.php");
    session_start();

    $atm_id = $_GET['atm_id'];
    $query = "SELECT * FROM atm_booth
              WHERE atm_id='$atm_id'";
    $table = mysqli_query($con,$query);
    $row = mysqli_fetch_assoc($table);




    if(isset($_POST["update"])){

    $Atm_Name =  $_POST["atm_name"];
    $atmc_name = $_POST["atmc_name"];
    $division = $_POST["division"];
    $district =  $_POST["district"];
    $Postal_Code =  $_POST["postal_code"];
    $Address = $_POST["address"];
    $capacity = $_POST["capacity"];
    $Start_Time = $_POST["start_time"];
    $Closing_Time = $_POST["closing_time"];
    $Aditional_Information = $_POST["add_info"];

    $query= "UPDATE atm_booth
            SET name='$Atm_Name',division='$division',district='$district',atmc_name='$atmc_name',
            postal_code='$Postal_Code', address = '$Address',capacity = '$capacity',
            start_time='$Start_Time',closing_time='$Closing_Time', add_info = '$Aditional_Information'
            WHERE atm_id = '$atm_id'";
   

          $r= mysqli_query($con,$query);

          if($r)
           header("Location: atm.php");



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
                    <h2 class="d-flex justify-content-center mt-2 mb-4">Update Atm Booth</h2>
                    <form action="" method="post">

                        <div class="d-flex mb-3 ">
                            <div style="width: 20%;">
                                <label class="form-label">Atm Id</label>
                                <input class="form-control" type="text" name="atm_id" required disabled value="<?php echo $row['atm_id']?>">
                            </div>
                            <div style="margin-left: 5%; width: 35%;">
                                <label class="form-label">Atm Name</label>
                                <input class="form-control" type="text" name="atm_name" required value="<?php echo $row['name']?>">
                            </div>

                            <div style="margin-left: 5%; width: 35%;">
                            <label class="form-label">ATMC Name</label>
                            <input class="form-control" type="text" name="atmc_name" required value="<?php echo $row['atmc_name']?>">
                            </div>
                        </div>


                        <div class="d-flex mb-3 div3">
                            <div>
                                <label class="form-label">Division</label>
                                <input class="form-control" type="text" name="division" required value="<?php echo $row['division']?>">
                            </div>
                            <div style="margin-left: 5%;">
                                <label class="form-label">District</label>
                                <input class="form-control" type="text" name="district" required value="<?php echo $row['district']?>">
                            </div>

                            <div style="margin-left: 5%;">
                                <label class="form-label">Postal Code</label>
                                <input class="form-control" type="number" name="postal_code" required value="<?php echo $row['postal_code']?>">
                            </div>
                        </div>

                       

                        <div class="d-flex mb-3 div2">
                        <div>
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" name="address" required value="<?php echo $row['address']?>">
                        </div>
                            <div style="margin-left: 10%;">
                                <label class="form-label">Capacity</label>
                                <input class="form-control" type="text" name="capacity" required value="<?php echo $row['capacity']?>">
                            </div>
                        </div>

                        <div class="d-flex mb-3 div2">
                            <div>
                                <label class="form-label">Start Time</label>
                                <input class="form-control" type="time" name="start_time" required value="<?php echo $row['start_time']?>">
                            </div>
                            <div style="margin-left: 10%;">
                                <label class="form-label">Closing Time</label>
                                <input class="form-control" type="time" name="closing_time" required value="<?php echo $row['closing_time']?>">
                            </div>
                        </div>

                        <div class="div1 mb-3">
                            <label class="form-label">Aditional Information</label>
                            <input class="form-control" type="text" name="add_info" required value="<?php echo $row['add_info']?>">
                        </div>

                        <input type="submit" value="Update" name="update" class="btn btn-success">

                    </form>

                </div>


            </div>









        </div>
        <!-- End -->
    </div>


</body>

</html>