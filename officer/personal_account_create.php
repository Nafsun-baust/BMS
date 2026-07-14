<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Create Personal Account</title>
     <style>
          .main {
               background-color: #e1e9e1;

          }
          .btndiv { 
               display: flex;
               margin: 10px 20px;  
          }

          .btndiv button {
               height: 40px;
               font-weight: bold;
          }

          .dps {
               background-color: #c8ccc8;
               width: 150px;
               border-left: 2px solid #878c87;
               border-top: 2px solid #878c87;
               border-bottom: 2px solid #878c87;
               border-right: 1px solid #878c87;

          }

          .fdr {
               background-color: #c8ccc8;
               width: 150px;
               border-left: 1px solid #878c87;
               border-top: 2px solid #878c87;
               border-bottom: 2px solid #878c87;
               border-right: 2px solid #878c87;
               border-bottom-right-radius: 5px;
          }

          .loan {
               background-color: #c8ccc8;
               width: 150px;
               border-left: 1px solid #878c87;
               border-top: 2px solid #878c87;
               border-bottom: 2px solid #878c87;
               border-right: 2px solid #878c87;
               border-bottom-right-radius: 5px;
          }

          .pa {
               border: none;
               background-color: #e1e9e1;
               width: 250px;
               border-top: 2px solid #878c87;
              

          }
          .p{
               border: none;
               border-left: 2px solid #878c87;
               width: 42%;
               height: 40px;
               border-bottom: 2px solid #878c87;
               border-bottom-left-radius: 5px;
              

          }
          .p2{
              
              width: 1%;
              height: 40px;
              border-bottom: 2px solid #878c87;
             

         }
     </style>
</head>

<?php 
include"../database.php";
session_start();

?>

<body>
     <div>
          <?php include "officer_header.php" ?>
     </div>
     <div class="d-flex">
          <div>
               <?php include "officer_sidebar.php" ?>
          </div>
          <div class="main">
               <div class="btndiv">
                    <p class="p2"></p>
                    <a href="dps_create.php"> <button class="dps">DPS</button></a>
                    <a href="fdr_create.php"> <button class="fdr">FDR</button></a>
                    <a href="personal_account_create.php"> <button class="pa">Personal Account</button></a>
                    <p class="p"></p>

               </div>


          </div>

     </div>

</body>

</html>