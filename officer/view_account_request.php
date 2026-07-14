<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Account Request</title>
    <style>
        .btndiv {
            display: flex;
            margin-left: 80px;
            margin-top: 20px;
        }

        .ad,
        .cd {
            border: none;
            height: 40px;
            width: 200px;
            background-color: #ced6e0;
            color: #2f3542;
            font-weight: bold;
        }

        .ad:hover,
        .cd:hover {
            background-color: #70a1ff;
            color: white;
        }

        .cd {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .ad {
            border-left: 1px solid black;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;

        }

        .container {
            margin-top: 20px;


        }

        .container div {
            width: 630px;
            display: flex;
            height: 35px;
        }

        .f_label {
            border-left: 2px solid;
            border-right: 2px solid;
            border-top: 2px solid;
            width: 130px;
            padding-left: 10px;
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .s_input {
            border: none;
            border-right: 2px solid;
            border-top: 2px solid;
            width: 500px;
            padding-left: 10px;
        }

        .s_label {
            border-right: 2px solid;
            border-top: 2px solid;
            width: 500px;
            padding-left: 10px;
            display: flex;
            align-items: center;
        }

        .btndiv span {
            margin-left: 20px;
            margin-top: 5px;
            font-size: 15px;
            color: red;
        }
    </style>
</head>

<body>


    <?php
    include("../database.php");
    session_start();
    $account_no = $_GET['account_no'];




    $error_message = "";
    $error = false;

    if (isset($_POST["accept"])) {
        $debit_card_no = $_POST['debit_card_no'];
        $debit_exp_date = $_POST['debit_exp_date'];
        $cvv = $_POST['cvv'];

        if (empty($debit_card_no) || empty($debit_exp_date) || empty($cvv)) {
            $error_message = "Enter Card No, Expire Date and CVV";
        } else {
            $query2 = "UPDATE account 
                       SET status = 'active', 
                       opening_date = CURRENT_DATE(),
                       debit_card_no = '$debit_card_no',
                       debit_exp_date = '$debit_exp_date',
                       cvv = '$cvv'
                       WHERE account_no = '$account_no'";
            mysqli_query($con, $query2);
            $_SESSION['msg']="Accept account Successfull";
            header("Location: account_request.php");
        }
    }



    
    if (isset($_POST['reject'])) {
        $query2 = "DELETE FROM account 
                    WHERE account_no = '$account_no'";
        mysqli_query($con, $query2);
        $_SESSION['msg']="Reject account Successfull";
        header("Location: account_request.php");
    }


    ?>

    <div>
        <?php include "officer_header.php" ?>
    </div>

    <div class="d-flex">
        <div>
            <?php include "officer_sidebar.php" ?>
        </div>
        <!-- Start -->
        <div class="main ">


            <?php
            $query = "SELECT * 
                      FROM account
                      INNER JOIN customer
                      USING(customer_id)
                      INNER JOIN acc_type
                      USING(at_code)
                      WHERE account_no = '$account_no'";

            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_assoc($result);


            ?>




            <div class="btndiv">
                <button class="cd" id="cd">Customer Details</button>
                <button class="ad" id="ad">Account Details</button>
            </div>

            <form method="post">
                <div class="container" id="customer_div">
                    <div>
                        <label class="f_label">Name</label>
                        <label class="s_label"><?php echo $row['first_name'] . " " . $row['last_name'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Customer Id</label>
                        <label class="s_label"><?php echo $row['customer_id'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Nid</label>
                        <label class="s_label"><?php echo $row['nid'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Phone</label>
                        <label class="s_label"><?php echo $row['phone'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Email</label>
                        <label class="s_label"><?php echo $row['email'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Gender</label>
                        <label class="s_label"><?php echo $row['gender'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Division</label>
                        <label class="s_label"><?php echo $row['division'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">District</label>
                        <label class="s_label"><?php echo $row['district'] ?></label>
                    </div>
                    <div style="border-bottom: 2px solid;">
                        <label class="f_label">Address</label>
                        <label class="s_label"><?php echo $row['address'] ?></label>
                    </div>
                </div>





                <div class="container" id="account_div" style="display: none;">
                    <div>
                        <label class="f_label">Account No</label>
                        <label class="s_label"><?php echo $row['account_no'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Account Type</label>
                        <label class="s_label"><?php echo $row['acc_name'] ?></label>
                    </div>
                    <div>
                        <label class="f_label">Debit Card No</label>
                        <input class="s_input" type="number" name="debit_card_no" id="">

                    </div>
                    <div>
                        <label class="f_label">Expire Date</label>
                        <input class="s_input" type="date" name="debit_exp_date" id="">
                    </div>
                    <div style="border-bottom: 2px solid;">
                        <label class="f_label">CVV</label>
                        <input class="s_input" type="number" name="cvv" id="">
                    </div>
                </div>


                <div class="container btndiv">
                    <input class="btn btn-success" type="submit" value="Accept" name="accept" id="">
                    <input style="margin-left:10px;" class="btn btn-danger" type="submit" value="Reject" name="reject" id="">
                    <span><?php echo $error_message ?></span>
                </div>
            </form>


        </div>
        <!-- End -->
    </div>


    <script>
        let ad = document.getElementById("ad");
        let cd = document.getElementById("cd");
        let account_div = document.getElementById("account_div");
        let customer_div = document.getElementById("customer_div");

        ad.addEventListener("click", () => {
            account_div.style.display = "block";
            customer_div.style.display = "none";
        })

        cd.addEventListener("click", () => {
            account_div.style.display = "none";
            customer_div.style.display = "block";
        })
    </script>


</body>

</html>