<?php 
     $server = "localhost";
     $user= "root";
     $password="";
     $name = "bms_db";
     try{
        $con = mysqli_connect($server,$user,$password,$name);
     }
     catch(mysqli_sql_exception){
          echo"Not Connected";
     }
?>
