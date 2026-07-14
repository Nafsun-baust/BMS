<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDR Scheme</title>
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

$query_fdr = "select * from fdr_scheme where scheme_id like '%$search%' or tenure like '%$search%'";
$table_fdr = mysqli_query($con, $query_fdr);
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
                <h2 class="d-flex justify-content-center mt-3">All FDR Scheme</h2>

               
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
                        <a href="add_fdr_scheme.php"><button>New Scheme</button></a>

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
                            <th>Scheme Id</th>
                            <th>Tenure</th>
                            <th>Interest Rate</th>
                            <th>Action</th>
                        </tr>

                        <?php
                        while ($row = mysqli_fetch_assoc($table_fdr)) {
                        ?>

                            <tr>
                                <td><?php echo $row['scheme_id'] ?></td>
                                <td><?php echo $row['tenure'] . " Month" ?></td>
                                <td><?php echo $row['interest_rate'] . "%" ?></td>
                                <td>
                                    <a href="update_fdr_scheme.php?scheme_id=<?php echo $row['scheme_id'] ?>"><button>Update</button></a>
                                    <a href="delete_fdr_scheme.php?scheme_id=<?php echo $row['scheme_id'] ?>"><button onclick="return checkdelete()">Delete</button></a>
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
        return confirm("Are you Sure to delete this scheme?");
    }
</script>