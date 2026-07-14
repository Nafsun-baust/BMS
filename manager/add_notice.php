<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Notice</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 50%;
        }

        .error_message {
            display: flex;
            justify-content: center;
        }

        .cnt span {
            color: red;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();

$error_message = "";
$error = false;
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
   
   

    $query_notice = "select * from notice where title='$title'";
    $table_notice = mysqli_query($con, $query_notice);
    $row_notice = mysqli_fetch_assoc($table_notice);

    if ($row_notice) {
        $error_message = "Duplicate Notice";
        $error = true;
    }

    if (!$error && isset($_FILES['pdf'])) {
        $name = $_FILES['pdf']['name'];
        $tmp_name = $_FILES['pdf']['tmp_name'];
        $store = "../photo/".$name;
        
        move_uploaded_file($tmp_name,$store);



        $query_insert = "INSERT INTO `notice`( `title`, `description`, `published_date`, `pdf`) 
                     VALUES ('$title','$description',CURDATE(),'$store')";
        mysqli_query($con, $query_insert);
        $_SESSION['msg'] = "Notice added successfully";
        header("Location: notice.php");
    }
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

                <h2 class="d-flex justify-content-center mt-3 mb-4">Add Notice</h2>
                <div class="error_message">
                    <span><?php echo $error_message ?></span>
                </div>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control" type="text" name="title" id="" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                         <textarea class="form-control" name="description" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PDF</label>
                        <input class="form-control" value="" type="file" name="pdf" id="pdf" required>
                    </div>
                   
                    <div class="d-flex">
                        <input type="submit" class="btn btn-success" value="Submit" name="submit" id="">
                        <a href="notice.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>









        </div>
        <!-- End -->

    </div>

</body>

</html>