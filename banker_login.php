<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <link rel="stylesheet" href="bootstrap/bootstrap_css.css">
    <script src="bootstrap/bootstrap_js.js"></script>
    <title>Bankers Login</title>

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
$error_password = "";
$error = false;

$account = "";
$password = "dr";


if (isset($_POST['login'])) {
    $account = $_POST['account'];
    $password = $_POST['password'];


    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM employee
                      WHERE employee_id = '$account'"));
    if (empty($row)) {
        $error_account = "Account not found";
        $error = true;
    } else if ($row['password'] != $password ) {
        $error_password = "Wrong Password";
        $error = true;
    }




    if (!$error) {
        $_SESSION['login'] = true;
        $_SESSION['account'] = $account;
        switch ($row['employee_type']) {
            case 1:
                $_SESSION['user_type']="manager";
                header("Location: manager/dashboard.php");
                break;
            case 2:
                $_SESSION['user_type']="officer";
                header("Location: officer/dashboard.php");
                break;
            case 3:
                $_SESSION['user_type']="junior_officer";
                header("Location: junior_officer/dashboard.php");
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
                    <small class="text-white text-wrap text-center" style="padding-bottom: 30px; width: 17rem;font-family: Arial;">Welcome to our secure banking portal, where managing your finances is just a login away.</small>
                </div>


                <div class="col-md-6 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2 style="text-align: center;">Banker Login</h2>
                        </div>

                        <div>
                            <input type="number" name="account" class="form-control form-control-lg bg-light fs-6" placeholder="Banker Id" value="<?php echo $account ?>">
                            <span><?php echo $error_account ?></span>
                        </div>


                        <div>
                            <input type="number" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" value="<?php echo $password ?>">
                            <span><?php echo $error_password ?></span>
                        </div>


                        <div class="input-group mb-3">
                            <input type="Submit" value="Login" name="login" class="btn btn-lg w-100 fs-6">
                        </div>

                       
                    </div>
                </div>
            </div>
        </div>

    </form>



</body>

</html>