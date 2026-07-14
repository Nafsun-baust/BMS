<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" /> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="../bootstrap/bootstrap_css.css">
    <script src="../bootstrap/bootstrap_js.js"></script>
    <title>D</title>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        #logo {
            height: 50px;
            width: 50px;
        }

        .header {
            width: 100%;
            height: 70px;
            background-color: #0e2238;
        }

        #bank_name {
            font-size: 25px;
            margin-left: 2%;
            color: white;
        }

        .nav-link {
            margin-right: 50px;
            color: white;
            letter-spacing: 0.5px;
            padding: 0 10px;
        }

        .avatar {
            height: 50px;
            width: 50px;
            border-radius: 30px;
        }

        .dropdown-item {
            text-align: center;
            color: black;
            background-color: white;
        }

        .dropdown-item:hover {
            padding: 5px 0;
            color: white;
            background-color: #0e2238;
            border-radius: 10px;
        }

        .logout {
            border: none;
            background-color: white;
        }

        .dropdown-item:hover .logout {
            background-color: #0e2238;
            color: white;
        }

        .officer_text {
            color: white;
            font-weight: bold;
            font-size: 28px;
            margin-right: 20px;
            margin-top: 5px;
        }
    </style>
</head>


<?php 


?>


<?php
include"../database.php";
if (isset($_POST['logout'])) {
    $_SESSION['login'] = false;
    echo "<script>window.location.href='../index.php'</script>";
    // header("Location: ../index.php");
}
$row = mysqli_fetch_assoc(mysqli_query($con,"SELECT bank_name FROM bank"));

?>

<body>


    <header>
        <!-- Navbar Using bootstrap -->
        <nav class="navbar navbar-expand-md  header">
            <div class="container-fluid">
                <a href="" id="bank_name" class="navbar-brand"><img id="logo" src="../logo/logo.png" alt="">
                    <?php echo $row['bank_name']?></a>





                <div class="collapse navbar-collapse" id="NavID">
                    <ul class="navbar-nav ms-auto ">
                        <p class="officer_text">Officer</p>


                        <li class="nav-item dropdown">

                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><img class="avatar" src="../logo/male_avatar.png" alt=""></a>
                            <ul class="dropdown-menu ">
                                <form action="" method="post">
                                    <li><a href="profile.php" class="dropdown-item">Profile</a></li>
                                    <li><a href="" class="dropdown-item">Settings</a></li>
                                    <li><a href="" class="dropdown-item"> <input type="submit" value="Log Out" name="logout" class="logout"></a></li>
                                </form>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- End Navbar Using bootstrap -->



    </header>









</body>

</html>