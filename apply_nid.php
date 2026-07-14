<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .main {
            display: flex;
            justify-content: center;
            background: linear-gradient(45deg, #c7ecee, dodgerblue);
        }

        .crd {
            height: 250px;
            width: 400px;
            background-color: #eaeae9;
            margin-top: 100px;
            border-radius: 7px;
        }

        .next {
            background-color: #22a6b3;
            border: none;
            height: 40px;
            width: 80px;
            border-radius: 5px;
            color: white;
            font-size: 20px;
            margin: -55px 40px;
        }

        .input-field {
            position: relative;
            margin: 20px 30px;
        }

        .input-field input {
            width: 300px;
            height: 45px;
            border-radius: 6px;
            font-size: 18px;
            padding: 0 15px;
            border: 2px solid #2C3A47;
            background: transparent;
            color: black;
            outline: none;
        }

        .input-field label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: black;
            font-size: 19px;
            pointer-events: none;
            transition: 0.3s;
        }

        .input-field input:focus {
            border: 3px solid #778ca3;
        }

        .input-field input:focus~label,
        .input-field input:valid~label {
            top: 0;
            left: 15px;
            font-size: 14px;
            padding: 0 2px;
            background: #eaeae9;


        }

        .error {
            color: red;
            margin-left: 5px;
            font-size: 13px;
        }
    </style>
</head>

<?php
include("database.php");
session_start();

$error_nid = "";
$nid = "";
if (isset($_POST['next'])) {
    $nid = $_POST['nid'];
    if (strlen($nid) < 15) {
        $error_nid = "Enter a valid NID";
    } else {
        $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer
                                                      WHERE nid = '$nid'"));
        $_SESSION['nid'] = $nid;
        if (empty($row)) {
            $_SESSION['has']= false;
          
            echo "<script> window.location.href='apply_customer.php'; </script>";
            // header("Location: apply_customer.php");

        } else {
            $_SESSION['has']= true;

            echo "found";
           
            // header("Location: apply_account.php");
            echo "<script> window.location.href='apply_account.php'; </script>";

        }
    }
}


?>

<body>
    <div>
        <?php include("header.php") ?>
    </div>
    <div class="main">
        <div class="crd">
            <h3 class="navbar d-flex justify-content-center ">New Account</h3>
            <form action="" method="post">
                <div class="input-field">
                    <input type="number" required spellcheck="false" name="nid" value="<?php echo $nid?>">
                    <label>Enter NID</label>
                    <span class="error"><?php echo $error_nid ?></span>
                </div>

                <br><input type="submit" value="Next" name="next" class="next">

            </form>
        </div>
    </div>

    <div>
        <?php include("footer.php") ?>
    </div>

</body>

</html>