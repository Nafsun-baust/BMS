<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        .main {
            background-color: #e1e9e1;
        }

        .inp_grp_dbl {
            margin: 0 20px;
            width: 30%;
        }

        .inp_grp_sngl {
            margin: 0 20px;
            width: 80%;

        }

        .inp_grp_4 {
            margin: 0 20px;
            width: 22%;
        }

        .form-label {
            font-size: 17px;
        }

        .gender div label {
            margin: 6px 15px 0 2px;
            font-size: 18px;
        }

        .gender div input {
            height: 15px;
            width: 15px;
        }
    </style>
</head>

<?php

include "../database.php";
session_start();
$error_message = "";
$error = false;

$employee_id = $_GET['employee_id'];
$row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM employee WHERE employee_id='$employee_id'"));




if (isset($_POST['submit'])) {
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $nid = $_POST['nid'];
    $phone = $_POST['phone'];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $doj = $_POST['doj'];
    $salary = $_POST['salary'];
    $password = $_POST['password'];


    if (empty($email)) {
        $error_message = "Invalid Email";
    } 
    else {
        $employee_type = "";
        if ($designation == "Manager" || $designation == "Assistant Manager") {
            $employee_type = 1;
        } 
        else if ($designation == "Senior Analyst" || $designation == "Credit Analyst" || $designation == "Loan Processor" || $designation == "Financial Services Rep:") {
            $employee_type = 2;
        }
         else if ($designation == "Junior Underwriter" || $designation == "Operations Assistant") {
            $employee_type = 3;
        } 
        else {
            $employee_type = 4;
        }


        $query = "UPDATE employee
                  SET first_name='$f_name',last_name='$l_name',nid='$nid',phone='$phone',email='$email',gender='$gender',address='$address',city='$city',state='$state',
                  designation='$designation',employee_type='$employee_type',salary='$salary',doj='$doj',dob='$dob'
                  WHERE employee_id='$employee_id'";

        
        mysqli_query($con,$query);
        $_SESSION['msg']="Updated Employee Information successfullt";
        header("Location: employee.php");

   }








   
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
            <div class="container d-flex justify-content-center">
                <div class="mt-3">
                    <h2 class="d-flex justify-content-center mb-4">Edit Employee Details</h2>
                    <span><?php echo $error_message?></span>
                    <form action="" method="post">

                        <div class="d-flex mb-3">
                            <div class="inp_grp_dbl">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" name="f_name" id="" required value="<?php echo $row['first_name']?>">
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="l_name" id="" required value="<?php echo $row['last_name']?>">
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">NID</label>
                                <input class="form-control" type="number" name="nid" id="" required value="<?php echo $row['nid']?>">
                            </div>
                        </div>

                        <div class="d-flex mb-3">

                            <div class="inp_grp_dbl">
                                <label class="form-label">Phone</label>
                                <input class="form-control" type="phone" placeholder="+880" name="phone" id="" required value="<?php echo $row['phone']?>">
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" placeholder="name@example.com" name="email" id="" required value="<?php echo $row['email']?>">
                            </div>
                            <div class="inp_grp_dbl gender">
                                <label class="form-label">Gender</label><br>
                                <div>
                                    <input type="radio" name="gender" value="Male" id="" required <?php if($row['gender']=='Male') echo 'checked'?>>
                                    <label>Male</label>
                                    <input type="radio" name="gender" value="Female" id="" required <?php if($row['gender']=='Female'){ echo 'checked';}?> >
                                    <label>Female</label>
                                </div>

                            </div>
                           
                        </div>

                        <div class="d-flex mb-3">
                            <div class="inp_grp_dbl">
                                <label class="form-label">Birth Date</label>
                                <input class="form-control" type="date" name="dob" id="" required value="<?php echo $row['dob']?>">
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">City</label>
                                <input class="form-control" type="text" name="city" id="" required value="<?php echo $row['city']?>">
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">State</label>
                                <input class="form-control" type="text" name="state" id="" required value="<?php echo $row['state']?>">
                            </div>

                        </div>


                        <div class="d-flex mb-4">
                            <div class="inp_grp_sngl">
                                <label class="form-label">Address</label>
                                <input class="form-control" style="height: 50px;" type="text" name="address" id="" required value="<?php echo $row['address']?>">
                            </div>


                        </div>

                        <div class="d-flex mb-3">
                            <div class="inp_grp_4">
                                <label class="form-label">Designation</label>
                                <select class="form-select" name="designation" id="">
                                    <option <?php if($row['designation']=='Bank Teller') echo 'selected'?> value="Bank Teller">Bank Teller</option>
                                    <option <?php if($row['designation']=='Financial Services Rep:') echo 'selected'?> value="Financial Services Rep:">Financial Services Rep:</option>
                                    <option <?php if($row['designation']=='Loan Processor') echo 'selected'?> value="Loan Processor">Loan Processor</option>
                                    <option <?php if($row['designation']=='Junior Underwriter') echo 'selected'?> value="Junior Underwriter">Junior Underwriter</option>
                                    <option <?php if($row['designation']=='Operations Assistant') echo 'selected'?> value="Operations Assistant">Operations Assistant</option>
                                    <option <?php if($row['designation']=='Credit Analyst') echo 'selected'?> value="Credit Analyst">Credit Analyst</option>
                                    <option <?php if($row['designation']=='Bank Clerk') echo 'selected'?> value="Bank Clerk">Bank Clerk</option>
                                    <option <?php if($row['designation']=='Senior Analyst') echo 'selected'?> value="Senior Analyst">Senior Analyst</option>
                                    <option <?php if($row['designation']=='Assistant Manager') echo 'selected'?> value="Assistant Manager">Assistant Manager</option>
                                    <option <?php if($row['designation']=='Manager') echo 'selected'?> value="Manager">Manager</option>
                                </select>
                            </div>
                            <div class="inp_grp_4">
                                <label class="form-label">Joining Date</label>
                                <input class="form-control" type="date" name="doj" id="" required value="<?php echo $row['doj']?>">
                            </div>
                            <div class="inp_grp_4">
                                <label class="form-label">Salary</label>
                                <input class="form-control" type="number" name="salary" id="" required value="<?php echo $row['salary']?>">
                            </div>
                            

                        </div>
                        <style>
                            .btn {
                                margin-left: 10px;
                            }

                            .btn_div {
                                margin-left: 20px;
                            }
                        </style>

                        <div class="mt-5 btn_div">
                            <input class="btn btn-success" type="submit" value="Update" name="submit" id="">
                            <input class="btn btn-secondary" type="reset" value="Reset" name="" id="">
                            <a href="employee.php"><button class="btn btn-danger">Cancle</button></a>
                        </div>


                    </form>
                </div>


            </div>





        </div>
        <!-- End -->
    </div>

</body>

</html>