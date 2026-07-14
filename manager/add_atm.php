<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
include "../database.php";
session_start();

   if(isset($_POST["add"])){

    $Atm_Name =  $_POST["atm_name"];
    $atmc_name = $_POST['atmc_name'];
    $division = $_POST["division"];
    $district =  $_POST["district"];
    $Postal_Code =  $_POST["postal_code"];
    $capacity = $_POST["capacity"];
    $Address = $_POST["address"];
    $Start_Time = $_POST["start_time"];
    $Closing_Time = $_POST["closing_time"];
    $Aditional_Information = $_POST["add_info"];

 
    
        $query="insert into atm_booth(name,division,district,postal_code,address,start_time,closing_time,add_info,capacity)
            VALUES ('$Atm_Name','$division','$district','$Postal_Code','$Address','$Start_Time','$Closing_Time','$Aditional_Information','$capacity')";
    
        mysqli_query($con,$query);
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
                    <h2 class="d-flex justify-content-center mt-2 mb-4">Add New Atm Booth</h2>
                    <form action="" method="post">

                        <div class="d-flex mb-3 div2">
                            <div>
                                <label class="form-label">Atm Name</label>
                                <input class="form-control" type="text" name="atm_name" required>
                            </div>

                            <div style="margin-left: 10%;" class="">
                            <label class="form-label">ATMC Name</label>
                                <input class="form-control" type="text" name="atmc_name" required>
                            </div>
                        </div>


                        <div class="d-flex mb-3 div3">
                            <div>
                                <label class="form-label">Division</label>
                                <input class="form-control" type="text" name="division" required>
                            </div>
                            <div style="margin-left: 5%;">
                                <label class="form-label">District</label>
                                <input class="form-control" type="text" name="district" required>
                            </div>

                            <div style="margin-left: 5%;">
                                <label class="form-label">Postal Code</label>
                                <input class="form-control" type="number" name="postal_code" required>
                            </div>
                        </div>

                      

                        <div class="d-flex mb-3 div2">
                        <div>
                            <label class="form-label">Address</label>
                            <input class="form-control" type="text" name="address" required>
                        </div>

                            <div style="margin-left: 10%;" class="">
                            <label class="form-label">Capacity</label>
                                <input class="form-control" type="number" name="capacity" required>
                            </div>
                        </div>

                        <div class="d-flex mb-3 div2">
                            <div>
                                <label class="form-label">Start Time</label>
                                <input class="form-control" type="time" name="start_time" required>
                            </div>
                            <div style="margin-left: 10%;">
                                <label class="form-label">Closing Time</label>
                                <input class="form-control" type="time" name="closing_time" required>
                            </div>
                        </div>

                        <div class="div1 mb-3">
                            <label class="form-label">Aditional Information</label>
                            <input class="form-control" type="text" name="add_info" required>
                        </div>

                        <input type="submit" value="Add" name="add" class="btn btn-success">

                    </form>

                </div>


            </div>









        </div>
        <!-- End -->
    </div>


</body>

</html>