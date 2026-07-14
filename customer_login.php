<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Customers Login</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ececec;
        }

        a {
            text-decoration: none;
            font-weight: bold;
        }

        .box-area {
            width: 930px;
        }

        .right-box {
            padding: 40px 30px 40px 40px;
        }

        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }

        .btn {
            background-color: #22a6b3;
            color: white;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #22a6b3;
            color: white;
            box-shadow: 0px 0px 30px rgb(72, 62, 128);
        }


        @media only screen and (max-width: 768px) {
            .box-area {
                margin: 0 10px;
            }

            .left-box {
                height: 100px;
                overflow: hidden;
            }

            .right-box {
                padding: 20px;
            }
        }

        .row div span {
            color: red;
            font-size: small;
            margin-left: 10px;
        }
    </style>

</head>

<?php
include("database.php");
session_start();
$error_account = "";
$error_pin_code = "";
$error = false;

$account = "";
$pin_code = "";
$acc_type = "account";

if (isset($_POST['login'])) {
    $account = $_POST['account'];
    $pin_code = $_POST['pin_code'];
    $acc_type = $_POST['acc_type'];
    $row= "";

    if($acc_type=='account'){
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM account
                      WHERE account_no = '$account'"));
        if (empty($row)) {
            $error_account = "Account not found";
            $error = true;
        }
        else if($row['pin_code'] != $pin_code) {
            $error_pin_code = "Wrong Pin";
            $error = true;
        }
    }

    if($acc_type=='dps'){
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM dps
                      WHERE dps_id = '$account'"));
        if (empty($row)) {
            $error_account = "Account not found";
            $error = true;
        }
       else if($row['pin_code'] != $pin_code) {
            $error_pin_code = "Wrong Pin";
            $error = true;
        }
    }

    if($acc_type=='fdr'){
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM fdr
                      WHERE fdr_id = '$account'"));
        if (empty($row)) {
            $error_account = "Account not found";
            $error = true;
        }
       else if($row['pin_code'] != $pin_code) {
            $error_pin_code = "Wrong Pin";
            $error = true;
        }
    }
    if($acc_type=='loan'){
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM loan
                      WHERE loan_id = '$account'"));
        if (empty($row)) {
            $error_account = "Account not found";
            $error = true;
        }
       else if($row['pin_code'] != $pin_code) {
            $error_pin_code = "Wrong Pin";
            $error = true;
        }
    }

   

 

    if (!$error) {
        $_SESSION['login'] = true;
        $_SESSION['account'] = $account;
        switch ($acc_type) {
            case 'account':
                $_SESSION['user_type']="personal_account";
                header("Location: personal_account/dashboard.php");
                break;    
        }
    }
}
?>




<body>

    <form action="" method="post">

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="row border rounded-5 p-3 bg-white shadow box-area">

                <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #22a6b3;">
                    <div>
                        <img src="logo/loginlogo.png" class="img-fluid" style="width: 250px;">
                    </div>
                    <p class="text-white fs-2" style="font-family: Arial; font-weight: 600;">Secure Access</p>
                    <small class="text-white text-wrap text-center" style="width: 17rem;font-family: Arial;">Welcome to our secure banking portal, where managing your finances is just a login away.</small>
                </div>


                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2 style="text-align: center;">Customer Login</h2>
                        </div>

                        <div>
                            <input type="number" name="account" class="form-control form-control-lg bg-light fs-6" placeholder="Account No" value="<?php echo $account ?>">
                            <span><?php echo $error_account ?></span>
                        </div>

                        <div class="input-group mb-4">
                            <select class="form-control form-control-lg bg-light fs-6" name="acc_type">
                                <option value="account"  <?php if($acc_type=='account') echo 'selected'?>>Personal Accounts</option>
                            </select>

                        </div>

                        <div>
                            <input type="number" name="pin_code" class="form-control form-control-lg bg-light fs-6" placeholder="Pin Code" value="<?php echo $pin_code ?>">
                            <span><?php echo $error_pin_code ?></span>
                        </div>


                        <div class="input-group mb-3">
                            <input type="Submit" value="Login" name="login" class="btn btn-lg w-100 fs-6">
                        </div>

                        <div class="row">
                            <small>Don't have account? <a style="margin-left: 5px;" href="apply_nid.php">Apply New Account</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>



</body>

</html>