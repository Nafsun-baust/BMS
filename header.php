<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" type="text/css" href="CSS/header.css">
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
   <!-- <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" /> -->
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
    <link rel="stylesheet" href="bootstrap/bootstrap_css.css">
    <script src="bootstrap/bootstrap_js.js"></script>
   <style>
      header {
         background-color: #0e2238;
         /* background-color: #22a6b3; */
         font-family: Arial, Helvetica, sans-serif;
         font-weight: bold;
      }


      #bank_name {
         font-size: 25px;
         margin-left: 2%;
         color: white;
      }

      #logo {
         width: 50px;
         height: 50px;
         margin-top: 5px;
         margin-left: 5px;
      }

      .nav-link {

         color: white;
         letter-spacing: 0.5px;
         padding: 0 10px;

      }

      .nav-link:hover {
         padding: 2px 0;
         color: Black;
         background-color: white;
         border-radius: 5px;
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



      .navbar-toggler {
         color: white;
         background-color: white;
      }
      .main{
         min-height: 600px;
      }
   </style>

</head>

<body>

   <header>
      <!-- Navbar Using bootstrap -->
      <nav class="navbar navbar-expand-md  header">
         <div class="container-fluid">
            <a href="" id="bank_name" class="navbar-brand"><img id="logo" src="logo/logo.png" alt="">
               Bank Management System</a>
            <span class="navbar-toggler-icon"></span>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#NavID">

            </button>
            <div class="collapse navbar-collapse" id="NavID">
               <ul class="navbar-nav ms-auto ">
                  <li class="nav-item">
                     <a href="index.php" class="nav-link">Home</a>
                  </li>

                  <li class="nav-item dropdown">
                     <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About</a>
                     <ul class="dropdown-menu ">
                        <li><a href="about_us.php" class="dropdown-item"> About Us</a></li>
                        <li><a href="board_of_director.php" class="dropdown-item"> Board of Director </a></li>
                        <li><a href="vision_mission.php" class="dropdown-item"> Vision/Mission</a></li>
                        <li><a href="" class="dropdown-item"> ATM/Branch List</a></li>
                     </ul>
                  </li>
                  
                  <li class="nav-item">
                     <a href="" class="nav-link">Service</a>
                  </li>

                  <li class="nav-item">
                     <a href="" class="nav-link">Notice</a>
                  </li>

                  <li class="nav-item">
                     <a href="apply_nid.php" class="nav-link">Apply</a>
                  </li>

                  <li class="nav-item">
                     <a href="login_option.php" class="nav-link">Login</a>
                  </li>
                  
               </ul>
            </div>
         </div>
      </nav>

      <!-- End Navbar Using bootstrap -->



   </header>

</body>

</html>