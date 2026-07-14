<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/apply_customer.css">
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
    height: 670px;
    width: 600px;
    background-color: #eaeae9;
    margin: 50px 0 100px;
    border-radius: 7px;
}

.next {
    background-color: #22a6b3;
    border: none;
    height: 40px;
    width: 90px;
    border-radius: 5px;
    color: white;
    font-size: 20px;
    margin: 10px 20px 10px 40px;
}

.back {
    background-color: #b33939;
    border: none;
    height: 40px;
    width: 80px;
    border-radius: 5px;
    color: white;
    font-size: 20px;
    margin: 10px 10px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.input-field {
    position: relative;
    margin: 20px 30px;
}

.input-field input {
    width: 300px;
    height: 45px;
    /* border-radius: 6px; */
    font-size: 18px;
    padding: 0 15px;
    border: none;
    border-bottom: 2px solid #40407a;
    background: transparent;
    color: black;
    outline: none;
}

.input-field label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: black;
    font-size: 19px;
    pointer-events: none;
    transition: 0.3s;
}

.input-field input:focus {
    border-bottom: 3px solid #34ace0;
}

.input-field input:focus~label,
.input-field input:valid~label {
    top: 0;
    left: 15px;
    font-size: 14px;
    padding: 0 2px;
    background: #eaeae9;


}



.first div input {
    width: 200px;
    height: 40px;
}

.first {
    margin-bottom: -15px;
}

.file {
    display: flex;
    align-items: center;
    height: 40px;
    width: 420px;
    padding: 0 30px;
    margin-top: 20px;
}

.file label {
    margin-left: 5px;
    font-size: 20px;
    margin-bottom: 0px;
}

.file input {
    border: 1px solid gray;
    margin-left: 15px;
}

.radio-toolbar {
    margin: 10px 30px;
}

.radio-toolbar input[type="radio"] {
    opacity: 0;
    position: fixed;
    width: 0;
}

.gender {
    margin-left: 5px;
    font-size: 20px;

}

.male,
.female {
    display: inline-block;
    background-color: #ddd;
    padding: 3px 5px;
    font-size: 16px;
    border: 2px solid #57606f;
    border-radius: 4px;
    margin-left: 5px;
}

.radio-toolbar label:hover {
    background-color: #9AECDB;
}

.radio-toolbar input[type="radio"]:focus+label {
    border: 2px solid #444;
}

.radio-toolbar input[type="radio"]:checked+label {
    background-color: #7ed6df;
    border-color: #16a085;
    color: #130f40;
    font-weight: bold;
    border-width: 3px;
}
.input-field span{
   color: red;
   font-size: 15px;
   margin-left: 20px;
}
    </style>
</head>

<?php
   session_start();
    $error_email = "";
    $error = false;
    $first_name = "";
    $last_name = "";
    $email2 = "";
    $phone = "";
    $gender = "";
    $dob = "";
    $division = "";
    $district = "";
    $address = "";
 
if (isset($_POST['next'])) {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $email2 = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $division = $_POST['division'];
    $district = $_POST['district'];
    $address = $_POST['address'];


    if(empty($email)){
        $error_email = "invalid email";
        $error = true;
    }

    if(!$error){
        $filename = $_FILES['picture']['name'];
        $tempname = $_FILES['picture']['tmp_name'];
        $folder = 'photo/'.$filename;

        $_SESSION['first_name'] =  $first_name;
        $_SESSION['last_name'] =  $last_name;
        $_SESSION['email'] =  $email;
        $_SESSION['phone'] =  $phone;
        $_SESSION['gender'] =  $gender;
        $_SESSION['dob'] =  $dob;
        $_SESSION['division'] =  $division;
        $_SESSION['district'] =  $district;
        $_SESSION['address'] =  $address;
        $_SESSION['filename'] =  $filename;
        $_SESSION['tempname'] =  $tempname;
        $_SESSION['folder'] =  $folder;

        move_uploaded_file($tempname, $folder);
                       
      echo "<script> window.location.href='apply_account.php'; </script>";

    }

}
?>




<body>
    <div>
        <?php include("header.php") ?>
    </div>
    <div class="main">

        <div class="crd">
            <h3 class="navbar d-flex justify-content-center mt-2">Customer Registration</h3>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="d-flex first">
                    <div class="input-field">
                        <input type="text" name="first_name" required spellcheck="false" value="<?php echo $first_name?>">
                        <label>First Name</label>
                    </div>

                    <div class="input-field">
                        <input type="text" name="last_name" required spellcheck="false" value="<?php echo $last_name?>">
                        <label>Last Name</label>
                    </div>

                </div>

                <div class="input-field">
                    <input type="text" name="email" required spellcheck="false" value="<?php echo $email2?>">
                    <label>Email</label>
                     <span><?php echo $error_email?></span>
                </div>
                <div class="input-field">
                    <input type="number" name="phone" required spellcheck="false" value="<?php echo $phone?>">
                    <label>Phone</label>
                </div>

                <div class="file mb-3">
                    <label class="form-label">Picture</label>
                    <input class="form-control" name="picture"  type="file">
                </div>



                <div class="radio-toolbar">
                    <label class="gender">Gender</label>
                    <input checked type="radio" id="male" name="gender" value="Male">
                    <label class="male" for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="Female">
                    <label class="female" for="female">Female</label>
                </div>
                <div class="file mb-3">
                    <label class="form-label">Dob</label>
                    <input class="form-control" name="dob"  type="date">
                </div>

                <div style="margin-top: -15px;" class="d-flex first">
                    <div class="input-field">
                        <input type="text" name="division" required spellcheck="false" value="<?php echo $division?>">
                        <label>Division</label>
                    </div>

                    <div class="input-field">
                        <input type="text" name="district" required spellcheck="false" value="<?php echo $district?>">
                        <label>District</label>
                    </div>

                </div>
                <div class="input-field">
                    <input style="width: 460px;" name="address" type="text" required spellcheck="false" value="<?php echo $address?>">
                    <label>Address</label>
                </div>

                <div class="d-flex">
                    <input type="submit" value="Next" name="next" class="next">
                    <a style="text-decoration: none;" href="apply_nid.php">
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



