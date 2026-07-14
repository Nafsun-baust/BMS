<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        .leave_div{
           width: auto;
           height: auto;
           margin: 10px 20px;
            
        }
        .l1,.l2{
            background-color: #3498db;
            border: none;
            color: white;
            padding: 8px 10px;

        }
        .l1{
           border-radius: 5px;
            margin-right: 10px;
            
        }
        .l2{
            border-radius: 5px;

        }

    </style>
</head>

<?
include"../database.php";
session_start();
?>

<body>
    <div>
        <?php include "officer_header.php" ?>
    </div>

    <div class="d-flex">
        <div>
            <?php include "officer_sidebar.php" ?>
        </div>
        <div class="main">
              <div class="leave_div d-flex">
                <a href="apply_leave.php"> <button class="l1">Apply for Leave</button></a>
                <a href="leave.php"> <button class="l2">Your Leave History</button></a>
               
               
              </div>
              


        </div>

    </div>

</body>

</html>