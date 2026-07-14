<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update DPS Account</title>
    <style>
        .main {
            background-color: #e1e9e1;

        }

        .customer label,
        .dpsaccount label {
            width: 150px;
            font-size: 18px;
            font-weight: 500;
        }

        .customer div,
        .dpsaccount div {
            margin-bottom: 10px;
        }

        .customer input,
        .customer textarea,
        .dpsaccount input
         {
            width: 250px;
            border: 2px solid gray;
            border-radius: 3px;
            padding: 0 10px;

        }
        .sel{
            width: 250px;
            border-radius: 3px;
            padding: 0 10px;
            background-color: #bdc3c7;
            border: none;
        }
        .customer,
        .dpsaccount {
            margin: 10px 100px;
        }
        .btn_div{
            margin-left: 160px;
            margin-top: 50px;
            
        }
        .btn_div input{
            border: none;
            background-color: #22a6b3;
            padding: 8px 12px;
            font-size: 20px;
            color: white;
            border-radius: 5px;

        }
    </style>
</head>

<?php
include "../database.php";
session_start();
$error_message = "";

$dps_id = $_GET['dps_id'];
$customer_id = $_GET['customer_id'];

 



if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $nid= $_POST['nid'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $gender= $_POST['gender'];
    $dob= $_POST['dob'];
    $division= $_POST['division'];
    $district= $_POST['district'];
    $address= $_POST['address'];
    $nom_name= $_POST['nom_name'];
    $nom_nid= $_POST['nom_nid'];
    $nom_address= $_POST['nom_address'];
    $nom_relation= $_POST['nom_relation'];
    $scheme= $_POST['scheme'];
    $pin_code= $_POST['pin_code'];


    $query_customer = "UPDATE `customer` SET `nid`='$nid',`first_name`='$first_name',`last_name`='$last_name',`email`='$email',`phone`='$phone',`gender`='$gender',`address`='$address',`division`='$division',`district`='$district',`dob`='$dob' WHERE customer_id='$customer_id'";
    mysqli_query($con, $query_customer);


    $query_dps = "UPDATE `dps` SET `pin_code`='$pin_code',`nom_name`='$nom_name',`nom_nid`='$nom_nid',`nom_address`='$nom_address',`nom_relation`='$nom_relation' WHERE dps_id='$dps_id'";

    mysqli_query($con, $query_dps);
     
    $_SESSION['msg'] = "Updated dps account successfully";
        header("Location: dps.php");
    
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
        <div class="main">
            <div>
                <form action="" method="post">
                    <div class="d-flex">
                        <div class="customer">

                          <?php
                          $row = mysqli_fetch_assoc(mysqli_query($con,"SELECT *
                          FROM dps d
                          inner join customer c
                          using(customer_id)
                          inner join dps_scheme ds
                          using(scheme_id)
                           WHERE d.dps_id='$dps_id'"));
                          
                          ?>

                            <div>
                                <h5 style="margin-left: 100px; margin-bottom:20px;">Customer Information</h5>
                                <div>
                                    <label class="">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" required id="">
                                </div>
                                <div>
                                    <label class="">Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" id="" required>
                                </div>
                                <div>
                                    <label class="">NID</label>
                                    <input type="number" name="nid" value="<?php echo $row['nid'] ?>" id="" required>
                                </div>
                                <div>
                                    <label class="">Email</label>
                                    <input type="email" name="email" id="" value="<?php echo $row['email'] ?>" required>
                                </div>
                                <div>
                                    <label class="">Phone</label>
                                    <input type="number" name="phone" placeholder="+880" value="<?php echo $row['phone'] ?>" id="" required>
                                </div>
                                <div>
                                    <label>Gender</label>
                                    <input type="radio" name="gender" value="Male" id="" <?php if($row['gender']=="Male") echo 'checked' ?> style="width:15px; height:15px;">
                                    <label style="width:60px;">Male</label>
                                    <input type="radio" name="gender" id="" value="Female"  <?php if($row['gender']=="Female") echo 'checked' ?> style="width:15px; height:15px;">
                                    <label style="width:30px;">Female</label>
                                </div>
                                <div>
                                    <label class="">Birth Date</label>
                                    <input type="date" name="dob" id="" value="<?php echo $row['dob'] ?>" required>
                                </div>
                                <div>
                                    <label class="">Division</label>
                                    <input type="text" name="division" id="" value="<?php echo $row['division'] ?>" required>
                                </div>
                                <div>
                                    <label class="">District</label>
                                    <input type="text" name="district" id="" value="<?php echo $row['district'] ?>" required>
                                </div>
                                <div>
                                    <label class="">Address</label>
                                    <textarea name="address" id="" cols="30" rows="3"  required><?php echo $row['address'] ?></textarea>

                                </div>
                            </div>

                        </div>



                        <div class="dpsaccount">
                            <div>
                                <h5 style="margin-left: 100px; margin-bottom:20px;">Nominee Information</h5>
                                <div>
                                    <label class="" >Name</label>
                                    <input type="text" name="nom_name" id="" value="<?php echo $row['nom_name'] ?>" required>
                                </div>
                                <div>
                                    <label class="">NID or Birth Certificate</label>
                                    <input type="number" name="nom_nid" id="" value="<?php echo $row['nom_nid'] ?>" required>
                                </div>
                                <div>
                                    <label class="">Address</label>
                                    <input type="text" name="nom_address" id="" value="<?php echo $row['nom_address'] ?>" required>
                                </div>
                                <div>
                                    <label class="">Relation</label>
                                    <input type="text" name="nom_relation" id="" value="<?php echo $row['nom_relation'] ?>" required>
                                </div>
                            </div>

                            <div>
                                <h5 style="margin-left: 100px; margin-bottom:20px; margin-top:30px;">DPS Account Details</h5>
                                <div>
                                    <label class="">DPS Id</label>
                                    <input type="text" name="scheme" value="<?php echo $row['dps_id'] ?>" id="" disabled>
                                </div>
                                <div>
                                    <label class="">Scheme</label>
                                    <input type="text" name="scheme" value="<?php echo $row['tenure']." Month" ?>" id="" disabled>
                                </div>
                                <div>
                                    <label class="">Pin Code</label>
                                    <input type="number" name="pin_code" value="<?php echo $row['pin_code']?>" id="">
                                </div>

                            </div>
                            <div class="btn_div">
                                <input type="submit" value="Update" name="update" id="" style="display: <?php if($row['status']=='closed') echo 'none'?>;">

                            </div>

                        </div>

                    </div>


                </form>
            </div>








        </div>

    </div>

</body>

</html>