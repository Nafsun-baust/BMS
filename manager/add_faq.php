<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert FAQ</title>
    <style>
        .main {
            display: flex;
            justify-content: center;
        }

        .cnt {
            width: 50%;
        }

        .cnt span {
            color: red;
        }
    </style>
</head>

<?php
include "../database.php";
session_start();

$error_question = "";
$error_answer = "";
$error = false;
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $answer = $_POST['answer'];
    if (empty($question)) {
        $error_question = "Enter a question";
        $error = true;
    } 
     if (empty($answer)) {
        $error_answer = "Enter a Answer";
        $error = true;
    }

    if (!$error) {
        $row_faq = mysqli_fetch_assoc(mysqli_query($con, "SELECT * from faq where question='$question'"));


        if ($row_faq) {
            $error_question = "This Faq already exists";
            $error = true;
        } else {

            mysqli_query($con,"INSERT INTO `faq`( `question`, `answer`, `create_date`) 
            VALUES ('$question','$answer',CURDATE())");
             $_SESSION['msg'] = "FAQ added successfully";
             header("Location: faq.php");

        }
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

                <h2 class="d-flex justify-content-center mt-3 mb-4">Add FAQ</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <input class="form-control" type="text" name="question" id=""><br>
                        <span><?php echo $error_question ?></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Answer</label>
                        <textarea class="form-control" name="answer" id="" cols="30" rows="5"></textarea>
                        <span><?php echo $error_answer ?></span>
                    </div>

                    <div class="d-flex">
                        <input type="submit" class="btn btn-success" value="Submit" name="submit" id="">
                        <a href="faq.php" style="margin-left: 15px;"><label class="btn btn-danger">Back</label></a>
                    </div>

                </form>

            </div>









        </div>
        <!-- End -->

    </div>

</body>

</html>