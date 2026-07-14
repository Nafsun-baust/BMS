<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Notice</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 50%;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();

$notice_id = $_GET['notice_id'];
$query = "select * from notice where notice_id = '$notice_id'";
$table = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($table);



if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];



    if (!$error) {

        $name = $_FILES['pdf']['name'];
        $tmp_name = $_FILES['pdf']['tmp_name'];
        $store = "../photo/" . $name;
        move_uploaded_file($tmp_name, $store);

        if(empty($name)){
            $store = $row['pdf'];
        }





        $query_update = "UPDATE `notice` SET `title`='$title',`description`='$description',`pdf`='$store'
                         WHERE notice_id = '$notice_id'";
        mysqli_query($con, $query_update);
        $_SESSION['msg'] = "Updated Notice Information Successfully";
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

                <h2 class="d-flex justify-content-center mt-3 mb-4">Update Notice Information</h2>


                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Notice Id</label>
                        <input class="form-control" value="<?php echo $row['notice_id'] ?>" type="text" name="title" id="" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input class="form-control" value="<?php echo $row['title'] ?>" type="text" name="title" id="" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="" cols="30" rows="5"><?php echo $row['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">PDF</label>
                        <input class="form-control" type="file" name="pdf" id="pdf">
                    </div>

                    <div class="d-flex">
                        <input type="submit" class="btn btn-primary" value="Update" name="update" id="">
                        <a href="notice.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>









        </div>
        <!-- End -->

    </div>

</body>

</html>