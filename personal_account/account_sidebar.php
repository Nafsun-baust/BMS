<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        ::after,
        ::before {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .sidebar-item a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        h1 {
            font-weight: 600;
            font-size: 1.5rem;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            display: flex;
            min-height: calc(100vh - 70px);
            margin-right: 2px;
        }


        #sidebar {
            width: 190px;
            min-width: 190px;
            z-index: 1000;
            transition: all .25s ease-in-out;
            background-color: #f5f6fa;
            display: flex;
            flex-direction: column;
            

        }





        .sidebar-nav {
            padding: 2rem 0;
            flex: 1 1 auto;
        }

        a.sidebar-link {
            padding: .625rem 1.625rem;
            color: black;
            display: block;
            font-size: 16px;
            white-space: nowrap;
            border-left: 3px solid transparent;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: .65rem;
        }

        a.sidebar-link:hover {
            background-color: rgba(255, 255, 255, .075);
            border-left: 3px solid #3b7ddd;
        }

        .sidebar-item {
            position: relative;
        }


        .main {
            height: calc(100vh - 70px);
            /* width: calc(100% - 190px); */
            width: 100%;
            overflow: scroll;
            padding: 15px;
           
           

        }
        #bank_name {
            font-size: 15px;
            margin-left: 2%;
            color: black;
        }
        #logo {
            margin: 20px 0 0 15px;
            height: 20px;
            width: 20px;
        }
        .bankname{
            font-size: 20px;
            font-weight: bold;
            font-family:Arial, Helvetica, sans-serif;
            margin: 30px 0 0 15px;
        }
    </style>
</head>

<body>




    <div class="wrapper">
        <aside id="sidebar">

       





            <ul class="sidebar-nav">


                <li class="sidebar-item">
                    <a href="dashboard.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Dashboard</span>
                    </a>
                </li>





                <li class="sidebar-item">
                    <a href="fund_transfer.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Fund Transfer</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="bill_payment.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Bill Payment</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="transaction.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Transaction</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="complain.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Complain</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="../index.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Log Out</span>
                    </a>
                </li>

                <!-- 
                <li class="sidebar-item">
                    <a href="" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Demo</span>
                    </a>
                </li> -->



                <!-- <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                        <i class="lni lni-protection"></i>
                        <span>Dropdown</span>
                    </a>
                    <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Demo</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">Demo</a>
                        </li>
                    </ul>
                </li> -->








            </ul>








        </aside>


    </div>






</body>

</html>