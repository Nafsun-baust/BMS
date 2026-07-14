<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Employee </title>
    <style>
        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 80%;
        }

        .l1 {
            background-color: #3498db;
            border: none;
            color: white;
            padding: 8px 10px;
            border-radius: 5px;
            margin: 0 0 10px 0;
        }

        .fa-pen-to-square {
            color: black;
            font-size: 20px;
            margin-top: 3px;
        }

        .material-icons {
            font-size: 45px;
            margin-left: 5px;
        }

        .tt {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .new {
            margin-bottom: 10px;
        }

        .new button {
            padding: 6px 10px;
            background-color: #22a6b3;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hdiv {
            position: relative;
        }

        .searchdiv {
            margin-bottom: 10px;
            position: absolute;
            right: 10px;
        }

        .fc {
            margin-left: 15px;
            height: 38px;
            width: 250px;
            border-radius: 5px;

        }

        .btnn {
            margin-left: 10px;
            padding: 6px 10px;
            background-color: #22a6b3;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;

        }

        .male_avatar {
            height: 70px;
            width: 70px;
            border-radius: 50%;
            margin-right: 10px;
        }

        td {
            height: 80px;
            background-color: green;

        }

        td p {
            margin-top: 20px;
        }
    </style>
</head>


<?php
include "../database.php";
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}

$search = "";

if (isset($_POST['searchbtn'])) {
    $search = $_POST['searchinput'];
}

$designation = NULL;
if (isset($_POST['designation'])) {
    $designation = $_POST['designation'];
    if($designation=='faka'){
        $designation = NULL;
    }
}

$result ="";

if ($designation == NULL) {
    $result = mysqli_query($con, "SELECT * FROM employee
                                WHERE employee_id LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%'
                                ORDER BY employee_id DESC");
}
else{
    $result = mysqli_query($con, "SELECT * FROM employee
                            WHERE designation='$designation' && (employee_id LIKE '%$search%' OR first_name LIKE '%$search%' OR last_name LIKE '%$search%')
                            ORDER BY employee_id DESC");
}






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
                <div class="container">
                    <h2 class="mt-3 mb-3 d-flex justify-content-center">All Employee</h2>

                    <?php
                    if (isset($_SESSION['msg'])) {
                        $msg =  $_SESSION['msg'];
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                        unset($_SESSION['msg']);
                    }
                    ?>




                    <div class="d-flex hdiv">
                        <div class="new">
                            <a href="add_employee.php"><button>New Employee</button></a>

                        </div>

                        <?php
                        $designation_table = mysqli_query($con, "SELECT DISTINCT designation
                                                                       FROM employee");

                        ?>
                        <style>
                            .sel{
                                height: 30px;
                                width: 200px;
                                padding-left: 10px;
                            }
                        </style>

                        <div class="searchdiv d-flex">
                            <form action="" method="post">
                                <div class="d-flex">
                                    <select class="sel" name="designation" id="" onchange="this.form.submit()">
                                        <option value="faka" <?php if ($designation == NULL) echo 'selected' ?>>Designation</option>
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($designation_table)) {
                                        ?>
                                            <option <?php if ($row2['designation'] == $designation) echo 'selected' ?> value="<?php echo $row2['designation'] ?>"><?php echo $row2['designation'] ?></option>
                                        <?php } ?>

                                    </select>
                                    <input class="form-control fc" style=" border: 2px solid #95a5a6;" type="text" name="searchinput" id="">
                                    <input class="btnn" type="submit" value="Search" name="searchbtn" id="">
                                </div>

                            </form>

                        </div>
                    </div>

                    <table class="table table-hover text-center">
                        <tr class="table-dark">
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                            <tr>
                                <td>
                                    <p><?php echo $row['employee_id'] ?></p>
                                </td>
                                <td>
                                    <img class="male_avatar" src="<?php
                                                                    if ($row['picture'] == null) {
                                                                        if ($row['gender'] == 'Male') {
                                                                            echo '../logo/male_avatar.png';
                                                                        } else {
                                                                            echo '../logo/female_avatar.png';
                                                                        }
                                                                    } else {
                                                                        echo $leave['picture'];
                                                                    }


                                                                    ?>" alt="">
                                    <?php echo $row['first_name'] . " " . $row['last_name']  ?>
                                </td>
                                <td>
                                    <p><?php echo $row['designation'] ?></p>
                                </td>
                                <td class="tt">
                                    <div>
                                        <a href="edit_employee.php?employee_id=<?php echo $row['employee_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    </div>

                                    <div>
                                        <label class="link-dark"><i onclick="deletecheck(<?php echo $row['employee_id'] ?>)" class="material-icons">delete</i></label>
                                        <!-- <a class="link-dark" name='delete' href=""><i onclick="deletecheck(<?php echo $row['employee_id'] ?>)" class="material-icons">delete</i></a> -->
                                    </div>

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
    function deletecheck(value) {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("Poof! Your file has been deleted!", {
                    // 	icon: "success",
                    // });
                    window.location.href = 'delete_employee.php?employee_id=' + value;
                } else {
                    swal("Your file is safe!");
                }
            });
    }
</script>