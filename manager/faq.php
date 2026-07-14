<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <title>FAQ </title>
    <style>
        .main {
            background-color: #e1e9e1;
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 80%;
        }



        .wrapper2>p,
        .wrapper2>h1 {
            margin: 1.5rem 0;
            text-align: center;
        }

        .wrapper2>h1 {
            letter-spacing: 3px;
        }

        .accordion {
            background-color: white;
            color: rgba(0, 0, 0, 0.8);
            cursor: pointer;
            font-size: 1.2rem;
            width: 100%;
            padding: 2rem 2.5rem;
            border: none;
            outline: none;
            transition: 0.4s;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        .accordion i {
            font-size: 1.6rem;
        }

        .active,
        .accordion:hover {
            background-color: #f1f7f5;
        }

        .pannel {
            padding: 0 2rem 2.5rem 2rem;
            background-color: white;
            overflow: hidden;
            background-color: #f1f7f5;
            display: none;
        }

        .pannel p {
            color: rgba(0, 0, 0, 0.7);
            font-size: 1.2rem;
            line-height: 1.4;
        }

        .faq {
            border: 1px solid rgba(0, 0, 0, 0.2);
            margin: 10px 0;
        }

        .faq.active {
            border: none;
        }

        .fa-pen-to-square {
            color: black;
            font-size: 20px;
            margin-right: 5px;
        }

        .out {
            position: relative;
        }

        .in {
            position: absolute;
            right: 0;
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
    </style>
</head>


<?php
include "../database.php";
session_start();

$faq = mysqli_query($con, "SELECT * FROM faq order by faq_id desc");



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
                    <h2 class="mt-3 mb-3 d-flex justify-content-center">Frequently Asked Questions</h2>
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


                    <div class="new">
                        <a href="add_faq.php"><button>New FAQ</button></a>

                    </div>

                    <div class="wrapper2">

                        <?php
                        while ($row = mysqli_fetch_assoc($faq)) {
                        ?>

                            <div class="faq">
                                <button class="accordion">
                                    <?php echo $row['question'] ?>
                                    <i class="fa-solid fa-chevron-down"></i>
                                </button>
                                <div class="pannel">
                                    <p>
                                        <?php echo $row['answer'] ?>
                                    </p>
                                    <div class="out">
                                        <div class="in">
                                            <a href="update_faq.php?faq_id=<?php echo $row['faq_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a class="link-dark" name='delete'><i onclick="deletecheck(<?php echo $row['faq_id'] ?>)" class="material-icons">delete</i></a>
                                        </div>

                                    </div>


                                </div>
                            </div>


                        <?php
                        }
                        ?>







                    </div>

                </div>
            </div>



        </div>
        <!-- End -->
    </div>


    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                this.parentElement.classList.toggle("active");

                var pannel = this.nextElementSibling;

                if (pannel.style.display === "block") {
                    pannel.style.display = "none";
                } else {
                    pannel.style.display = "block";
                }
            });
        }

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
                        window.location.href = 'delete_faq.php?faq_id='+value;
                    } else {
                        swal("Your file is safe!");
                    }
                });
        }
    </script>

</body>

</html>