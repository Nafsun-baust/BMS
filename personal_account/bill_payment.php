<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.0.1/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/helpers.esm.min.js"></script>

    <title>Bill Payment</title>

    <style>
        body {
            box-sizing: border-box;
        }


        .main {
            background-color: #EEEEEE;
            display: flex;
            justify-content: center;

        }

        .card {
            padding: 30px;

        }

        .bill_button {}

        .bill_button button {
            border: none;
            background-color: #70a1ff;
            padding: 5px 10px;
            color: white;


        }

        .university {
            margin-top: 10px;

        }

        .log {
            height: 40px;
            width: 40px;
            margin-right: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<?php
include("../database.php");
session_start();



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
                <div>
                    <div class="card" style="height: 400px; width:450px; margin-top:50px;">
                        <div class="bill_button mb-4">
                            <div class="d-flex justify-content-center">
                                <!-- <button>Bill Payment Details</button> -->

                            </div>

                        </div>

                        <div>
                            <div class="d-flex" style="">
                                <div class="card" style="width:45%; height:120px; border: 2px solid gray;" onclick="university()">
                                    <img src="../logo/university.png" style="height: 100px; width:100px; margin-top:-40px;" alt=""><br>
                                    <p style="margin-top: -35px; font-size:15px; font-weight:bold;">University Bill</p>
                                </div>

                                <div class="card" style="width: 45%; margin-left:10%; height:120px; border: 2px solid gray;">
                                    <img src="../logo/elec.png" style="height: 100px; width:100px; margin-top:-40px;" alt=""><br>
                                    <p style="margin-top: -35px; font-size:15px; font-weight:bold;">Electricity Bill</p>
                                </div>

                            </div>


                            <div class="d-flex" style="margin-top:20px;">
                                <div class="card" style="width:45%; height:120px; border: 2px solid gray;">
                                    <img src="../logo/internet.png" style="height: 100px; width:100px; margin-top:-40px;" alt=""><br>
                                    <p style="margin-top: -35px; font-size:15px; font-weight:bold;">Internet Bill</p>

                                </div>

                                <div class="card" style="width: 45%; margin-left:10%; height:120px; border: 2px solid gray;">
                                    <img src="../logo/gass.png" style="height: 100px; width:100px; margin-top:-40px;" alt=""><br>
                                    <p style="margin-top: -35px; font-size:15px; font-weight:bold;">Gass Bill</p>
                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="university card" id="all_university" style="display: none;">
                        <?php
                        $university = mysqli_query($con, "SELECT  * FROM uni_hall group by university_name");
                        while ($row = mysqli_fetch_assoc($university)) {


                        ?>

                            <a href="university_bill.php?university_name=<?php echo $row['university_name']?>" style="text-decoration: none; color:black;">
                                <div class="d-flex">
                                    <img class="log" src="<?php echo $row['university_logo'] ?>" alt="">
                                    <p class="uname"><?php echo $row['university_name'] ?></p>
                                </div>
                            </a>



                        <?php } ?>

                    </div>


                </div>

            </div>
            <!-- End -->
        </div>

    </div>


</body>

</html>

<script>
    function university() {
        document.getElementById("all_university").style.display = "block";
    }
</script>

<style>
    .uname {
        margin-top: 6px;
        font-weight: bold;
    }
</style>