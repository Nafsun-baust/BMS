<?php 
 include"database.php";

 $value = 10;
 mysqli_query($con,"UPDATE student_tution_fee set due=due+".$value." where student_id=220201033");
 


?>