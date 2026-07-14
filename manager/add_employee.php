<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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

        $query = "INSERT INTO `employee`( `first_name`, `last_name`, `nid`, `phone`, `email`, `gender`, `address`, `city`, `state`, `designation`, `employee_type`, `salary`, `doj`, `dob`, `password`)
                  VALUES ('$f_name','$l_name','$nid','$phone','$email','$gender','$address','$city','$state','$designation','$employee_type','$salary','$doj','$dob','$password')";
        
        mysqli_query($con,$query);
        $_SESSION['msg'] = "Employee Added Successfully";
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
                    <h2 class="d-flex justify-content-center mb-4">Add New Employee</h2>
                    <span><?php echo $error_message?></span>
                    <form action="" method="post">

                        <div class="d-flex mb-3">
                            <div class="inp_grp_dbl">
                                <label class="form-label">First Name</label>
                                <input class="form-control" type="text" name="f_name" id="" required>
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="l_name" id="" required>
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">NID</label>
                                <input class="form-control" type="number" name="nid" id="" required>
                            </div>
                        </div>

                        <div class="d-flex mb-3">

                            <div class="inp_grp_dbl">
                                <label class="form-label">Phone</label>
                                <input class="form-control" type="phone" placeholder="+880" name="phone" id="" required>
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">Email</label>
                                <input class="form-control" type="email" placeholder="name@example.com" name="email" id="" required>
                            </div>
                            <div class="inp_grp_dbl gender">
                                <label class="form-label">Gender</label><br>
                                <div>
                                    <input type="radio" name="gender" value="Male" id="" required>
                                    <label>Male</label>
                                    <input type="radio" name="gender" value="Female" id="" required>
                                    <label>Female</label>
                                </div>

                            </div>
                        </div>

                        <div class="d-flex mb-3">
                            <div class="inp_grp_dbl">
                                <label class="form-label">Birth Date</label>
                                <input class="form-control" type="date" name="dob" id="" required>
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">City</label>
                                <input class="form-control" type="text" name="city" id="" required>
                            </div>
                            <div class="inp_grp_dbl">
                                <label class="form-label">State</label>
                                <input class="form-control" type="text" name="state" id="" required>
                            </div>

                        </div>


                        <div class="d-flex mb-4">
                            <div class="inp_grp_sngl">
                                <label class="form-label">Address</label>
                                <input class="form-control" style="height: 50px;" type="text" name="address" id="" required>
                            </div>


                        </div>

                        <div class="d-flex mb-3">
                            <div class="inp_grp_4">
                                <label class="form-label">Designation</label>
                                <select class="form-select" name="designation" id="">
                                    <option value="Bank Teller">Bank Teller</option>
                                    <option value="Financial Services Rep:">Financial Services Rep:</option>
                                    <option value="Loan Processor">Loan Processor</option>
                                    <option value="Junior Underwriter">Junior Underwriter</option>
                                    <option value="Operations Assistant">Operations Assistant</option>
                                    <option value="Credit Analyst">Credit Analyst</option>
                                    <option value="Bank Clerk">Bank Clerk</option>
                                    <option value="Senior Analyst">Senior Analyst</option>
                                    <option value="Assistant Manager">Assistant Manager</option>
                                    <option value="Manager">Manager</option>
                                </select>
                            </div>
                            <div class="inp_grp_4">
                                <label class="form-label">Joining Date</label>
                                <input class="form-control" type="date" name="doj" id="" required>
                            </div>
                            <div class="inp_grp_4">
                                <label class="form-label">Salary</label>
                                <input class="form-control" type="number" name="salary" id="" required>
                            </div>
                            <div class="inp_grp_4">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="text" name="password" id="" required>
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
                            <input class="btn btn-success" type="submit" value="Submit" name="submit" id="">
                            <input class="btn btn-secondary" type="reset" value="Reset" name="" id="">
                            <a href="employee.php"><p class="btn btn-danger">Cancle</p></a>
                        </div>


                    </form>
                </div>


            </div>





        </div>
        <!-- End -->
    </div>

</body>

</html>