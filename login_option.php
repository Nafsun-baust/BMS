<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Option</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div>
        <?php include "header.php" ?>
    </div>
    <style>
        .bank {
            width: 50%;
            background-color: #b7e4c7;
            display: flex;
            justify-content: center;
            
            /* align-items: center; */

        }

        .account {
            background-color: #d8f3dc;
            width: 50%;
            display: flex;
            justify-content: center;
            /* align-items: center; */

        }
        .bank2{
            width: 50%;
            margin-top: 25vh;
        }
        .a{
            text-align: center;
            color: #01a3a4;
            font-size: 35px;
        }
        .b{
            text-align: center;
            margin-bottom: 30px;
        }
        .c{
            background-color: #22a6b3;
            border: none;
            border-radius: 4px;
            height: 45px;
            font-size: 20px;
            width: 130px;
            font-weight: bold;
            color: #f8edeb;
            
            
        }
        a{
            text-decoration: none;
            font-weight: bold;
        }
    </style>
    <div class="main d-flex">

        <div class="bank">
            <div class="bank2">
                <p class="a"> For Bankers</p>
                <p class="b">We are the premier platform for banking professionals, offering seamless access to essential tools and resources for efficient banking operations.</p>
                 <div class="d-flex justify-content-center">
                 <a href="banker_login.php"><button class="c">Login</button></a>
                 </div>
                 
            </div>




        </div>

        <div class="account">
        <div class="bank2">
                <p class="a"> For Customers</p>
                <p class="b">Welcome to our secure banking portal. Experience seamless access to your accounts and manage your finances efficiently.</p>
                 <div class="d-flex justify-content-center">
                 <a href="customer_login.php"><button class="c">Login</button></a>
                 </div>
                 <p class="b mt-4">Dont have an account?</p>
                 <div style="margin-top: -30px;" class="d-flex justify-content-center">
                 <a  href="apply_nid.php">Apply New Account</a>
                 </div>
                
               
                
                 
                 
            </div>

        </div>





    </div>

    <div>
        <?php include "footer.php" ?>
    </div>
</body>

</html>