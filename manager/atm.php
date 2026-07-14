<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atm Booth</title>
    <style>
        .cnt {
            width: 70%;
        }
        .main{
            display: flex;
            justify-content: center;
        }
        .new{
            border: none;
            border-radius: 4px;
            background-color: #22a6b3;
            margin: 10px 0 10px 0px;
            padding: 5px 8px;
            color: white;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();
$search= "";
if(isset($_POST['searchbtn'])){
    $search = $_POST['search'];
}
$query = "SELECT * FROM atm_booth where atm_id like '%$search%'";
$table = mysqli_query($con, $query);


?>

<body>

    <div>
        <?php include "manager_header.php" ?>
    </div>

    <div class="d-flex">
        <div>
            <?php include "manager_sidebar.php" ?>
        </div>
        <!-- Start -->
        <div class="main">

            <div class="cnt">
                <div class=" container">
                    <h2 class="d-flex justify-content-center mt-3 mb-3">All Atm Booth</h2>
                    <div>
                       <a href="add_atm.php"> <button class="new">New Atm</button></a>
                    </div>
                    <div>
                         <form action="" method="post">
                            <div>
                                 <input type="text" name="search" id="">
                                 <input type="submit" value="Search" name="searchbtn" id="">
                            </div>
                         </form>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Atm Id</th>
                            <th>Atm Name</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>


                        <?php
                        while ($row = mysqli_fetch_assoc($table)) {
                        ?>
                            <tr>
                                <td><?php echo $row['atm_id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td>
                                    <a href="delete_atm.php?atm_id=<?php echo $row['atm_id'] ?>"><button onclick=" return remove()">Delete</button></a>
                                    <a href="update_atm.php?atm_id=<?php echo $row['atm_id'] ?>"><button>Update</button></a>
                                </td>
                            </tr>

                        <?php } ?>

                    </table>

                </div>

            </div>







        </div>
        <!-- End -->
    </div>


</body>

</html>


<script>
    function remove(){
        return confirm("Are You sure?");
    }
</script>