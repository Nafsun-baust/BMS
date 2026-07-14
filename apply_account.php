<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/apply_account.css">
    <title>Apply</title>
</head>

<?php
include("database.php");
session_start();


$error_account = "";
$error = false;
if (isset($_POST['next'])) {
    $acc_type = $_POST['acc_type'];
    $pin = $_POST['pin'];
    $nid = $_SESSION['nid'];

    if ($_SESSION['has'] == true) {
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account
                                                        INNER JOIN customer
                                                        USING(customer_id)
                                                        WHERE account.at_code='$acc_type' AND nid = '$nid'"));

        if ($row) {
            $row2 = mysqli_fetch_assoc(mysqli_query($con, "SELECT acc_name FROM acc_type
                                                          WHERE at_code='$acc_type'"));

            $error_account = "Already you have a " . $row2['acc_name'];
            $error = true;
            $row = "";
        }
    }

 

    if (!$error && $_SESSION['has'] == false) {
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $phone = $_SESSION['phone'];
        $gender = $_SESSION['gender'];
        $dob = $_SESSION['dob'];
        $division = $_SESSION['division'];
        $district = $_SESSION['district'];
        $address = $_SESSION['address'];
        $filename = $_SESSION['filename'];


        $r =  mysqli_query($con, "INSERT INTO customer(nid,first_name,last_name,picture,email,phone,gender,address,division,district,dob)
                           VALUES('$nid','$first_name','$last_name','$filename','$email','$phone','$gender','$address','$division','$district','dob')");
    }

    if (!$error) {
        $cust_info = mysqli_fetch_assoc(mysqli_query($con, "SELECT *
        FROM customer
        WHERE nid = '$nid'"));
        $customer_id = $cust_info['customer_id'];
        mysqli_query($con, "INSERT INTO account(customer_id,at_code,balance,pin_code,opening_date,closing_date,status)
                            VALUES('$customer_id','$acc_type','0','$pin',NULL,NULL,'pending')");

        $rrr = mysqli_fetch_assoc(mysqli_query($con,"SELECT account_no FROM account
                                                      WHERE customer_id = '$customer_id' AND  at_code = '$acc_type'"));
        $_SESSION['account_no'] = $rrr['account_no'];
          echo "<script> window.location.href='account_pdf.php'; </script>";

    }
}



?>



<body>
    <div>
        <?php include("header.php") ?>
    </div>
    <div class="main">

        <div class="crd">
            <h3 class="navbar d-flex justify-content-center mb-3 mt-2">Account Registration</h3>
            <form action="" method="post">
                <div class="select mb-4">
                    <select class="form-select" aria-label="Default select example" name="acc_type">
                        <option value="1" selected>Savings Account</option>
                        <option value="2">Current Account</option>
                        <option value="3">Student Account</option>
                    </select>

                    <span><?php echo $error_account ?></span>
                </div>


                <div class="input-field">
                    <input type="number" required spellcheck="false" name="pin">
                    <label>Pin Code</label>
                </div>


                <div class="d-flex">
                    <input type="submit" value="Apply" name="next" class="next">
                    <a style="text-decoration: none;" href="apply_customer.php">
                        <div class="back">Back</div>
                    </a>
                </div>



            </form>
        </div>



    </div>

    <div>
        <?php include("footer.php") ?>
    </div>

</body>

</html>