<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <style>
        a button {
            padding: 2px 3px;
            font-size: 15px;
        }


        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 80%;
        }


        .new {
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 60px;
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
            margin-top: 20px;
            margin-bottom: 10px;
            position: absolute;
            right: 100px;
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
    </style>
</head>

<?php
include "../database.php";
session_start();

$search = "";
if (isset($_POST['searchbtn'])) {
    $search = $_POST['searchinput'];
}

$query_notice = "select * from notice where notice_id like '%$search%' or title like '%$search%' order by notice_id desc";
$table_notice = mysqli_query($con, $query_notice);
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

            <div class="cnt ">
                <h2 class="d-flex justify-content-center mt-3">All Notice</h2>

               
                    <?php
                    if (isset($_SESSION["msg"])) {
                        $msg = $_SESSION["msg"];
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   ' . $msg . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                     unset($_SESSION['msg']);
                    }
                    ?>
              


                <div class="d-flex hdiv">
                    <div class="new">
                        <a href="add_notice.php"><button>Add Notice</button></a>

                    </div>

                    <div class="searchdiv d-flex">
                        <form action="" method="post">
                            <div class="d-flex">
                                <input class="form-control fc" style=" border: 2px solid #95a5a6;" type="text" name="searchinput" id="">
                                <input class="btnn" type="submit" value="Search" name="searchbtn" id="">
                            </div>

                        </form>

                    </div>
                </div>

                <div class="container">
                    <table class="table table-hover text-center">
                        <tr class="table-dark">
                            <th>Notice Id</th>
                            <th>Title</th>
                            <th>Published On</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($table_notice)) {
                        ?>

                            <tr>
                                <td><?php echo $row['notice_id'] ?></td>
                                <td><?php echo $row['title'] ?></td>
                                <td><?php echo $row['published_date'] ?></td>
                                <td style="width: 250px;">
                                    <a href="update_notice.php?notice_id=<?php echo $row['notice_id'] ?>"><button>Update</button></a>
                                    <a href="view_notice.php?notice_id=<?php echo $row['notice_id'] ?>"><button>View Pdf</button></a>
                                    <a href="delete_notice.php?notice_id=<?php echo $row['notice_id'] ?>"><button onclick="return checkdelete()">Delete</button></a>
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
    function checkdelete() {
        return confirm("Are you Sure to delete this Record?");
    }
</script>