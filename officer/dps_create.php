<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create DPS Account</title>
    <style>
        .main {
            background-color: #e1e9e1;

        }

        .btndiv {
            display: flex;
            margin: 10px 20px;
        }

        .btndiv button {
            height: 40px;
            font-weight: bold;
        }

        .p2 {

            width: 1%;
            height: 40px;
            border-bottom: 2px solid #878c87;
            border-right: 2px solid #878c87;
            border-bottom-right-radius: 5px;
        }

        .dps {
            border: none;
            background-color: #e1e9e1;
            width: 150px;
            border-top: 2px solid #878c87;

        }

        .fdr {
            background-color: #c8ccc8;
            width: 150px;
            border-left: 2px solid #878c87;
            border-top: 2px solid #878c87;
            border-bottom: 2px solid #878c87;
            border-right: 1px solid #878c87;
            border-bottom-left-radius: 5px;
        }

        .loan {
            background-color: #c8ccc8;
            width: 150px;
            border-left: 1px solid #878c87;
            border-top: 2px solid #878c87;
            border-bottom: 2px solid #878c87;
            border-right: 2px solid #878c87;
        }

        .pa {
            border: none;
            background-color: #c8ccc8;
            width: 250px;
            border-top: 2px solid #878c87;
            border-bottom: 2px solid #878c87;
        }

        .p {
            border: none;
            border-left: 2px solid #878c87;
            width: 42%;
            height: 40px;
            border-bottom: 2px solid #878c87;
        }

        .cnt {
            width: 300px;
            margin-top: 50px;
        }

        .cnt span {
            color: red;
            margin-left: 50px;
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


if (isset($_POST['create'])) {
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


    $query_customer = "INSERT INTO `customer`( `nid`, `first_name`, `last_name`, `email`, `phone`, `gender`, `address`, `division`, `district`, `dob`)
                         VALUES ('$nid','$first_name','$last_name','$email','$phone','$gender','$address','$division','$district','$dob')";
    mysqli_query($con, $query_customer);

    $find = mysqli_fetch_assoc(mysqli_query($con,"SELECT MAX(customer_id) as customer_id FROM customer"));
    $customer_id = $find['customer_id'];

    $query_dps = "INSERT INTO `dps`(`customer_id`, `scheme_id`, `current_balance`, `pin_code`, `status`, `opening_date`, `closing_date`, `paid_installment`, `nom_name`, `nom_nid`, `nom_address`, `nom_relation`)
                VALUES ('$customer_id','$scheme','0','$pin_code','active',CURDATE(),NULL,'0','$nom_name','$nom_nid','$nom_address','$nom_relation')";
  
    mysqli_query($con, $query_dps);
     
        
        header("Location: dps_invoice.php");
    
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
            <div class="btndiv">
                <p class="p2"></p>
                <a href="dps_create.php"> <button class="dps">DPS</button></a>
                <!-- <a href="fdr_create.php"> <button class="fdr">FDR</button></a> -->
               
                <!-- <a href="personal_account_create.php"> <button class="pa">Personal Account</button></a> -->
                <p class="p"></p>
            </div>
            <div>
                <form action="" method="post">
                    <div class="d-flex">
                        <div class="customer">
                            <div>
                                <h5 style="margin-left: 100px; margin-bottom:20px;">Customer Information</h5>
                                <div>
                                    <label class="">First Name</label>
                                    <input type="text" name="first_name" required id="">
                                </div>
                                <div>
                                    <label class="">Last Name</label>
                                    <input type="text" name="last_name" id="" required>
                                </div>
                                <div>
                                    <label class="">NID</label>
                                    <input type="number" name="nid" id="" required>
                                </div>
                                <div>
                                    <label class="">Email</label>
                                    <input type="email" name="email" id="" required>
                                </div>
                                <div>
                                    <label class="">Phone</label>
                                    <input type="number" name="phone" placeholder="+880" id="" required>
                                </div>
                                <div>
                                    <label>Gender</label>
                                    <input type="radio" name="gender" value="Male" id="" style="width:15px; height:15px;">
                                    <label style="width:60px;">Male</label>
                                    <input type="radio" name="gender" id="" value="Female" style="width:15px; height:15px;">
                                    <label style="width:30px;">Female</label>
                                </div>
                                <div>
                                    <label class="">Birth Date</label>
                                    <input type="date" name="dob" id="" required>
                                </div>
                                <div>
                                    <label class="">Division</label>
                                    <input type="text" name="division" id="" required>
                                </div>
                                <div>
                                    <label class="">District</label>
                                    <input type="text" name="district" id="" required>
                                </div>
                                <div>
                                    <label class="">Address</label>
                                    <textarea name="address" id="" cols="30" rows="3" required></textarea>

                                </div>
                            </div>

                        </div>



                        <div class="dpsaccount">
                            <div>
                                <h5 style="margin-left: 100px; margin-bottom:20px;">Nominee Information</h5>
                                <div>
                                    <label class="">Name</label>
                                    <input type="text" name="nom_name" id="" required>
                                </div>
                                <div>
                                    <label class="">NID or Birth Certificate</label>
                                    <input type="number" name="nom_nid" id="" required>
                                </div>
                                <div>
                                    <label class="">Address</label>
                                    <input type="text" name="nom_address" id="" required>
                                </div>
                                <div>
                                    <label class="">Relation</label>
                                    <input type="text" name="nom_relation" id="" required>
                                </div>
                            </div>

                            <div>
                                <h5 style="margin-left: 100px; margin-bottom:20px; margin-top:30px;">DPS Account Details</h5>
                                <div>
                                    <label class="">Scheme</label>
                                    <select class="sel"  name="scheme">
                                    <?php 
                                       $query_scheme = "SELECT * FROM dps_scheme";
                                       $table_scheme = mysqli_query($con,$query_scheme);
                                      while( $row_scheme = mysqli_fetch_assoc($table_scheme)){
                                    ?>
                                        <option value="<?php echo $row_scheme['scheme_id']?>"><?php echo $row_scheme['tenure']." Month"?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div>
                                    <label class="">Pin Code</label>
                                    <input type="number" name="pin_code" id="">
                                </div>

                            </div>
                            <div class="btn_div">
                                <input type="submit" value="Create DPS Account" name="create" id="">

                            </div>

                        </div>

                    </div>


                </form>
            </div>








        </div>

    </div>

</body>

</html>