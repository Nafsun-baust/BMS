<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board Of Director</title>
    <style>
        .main {
            min-height: 100vh;
        }

        .textbod {
            background-image: url(logo/bod9.jpg);
            height: 80vh;
            width: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;

        }

        .tinbox {
            height: 25vh;
            width: 50%;
            background-color: #22a6b3;
            opacity: 0.8;
            position: absolute;
            top: 30%;
            left: 5%;

        }

        .mbod {
            position: absolute;
            top: 30%;
            left: 10%;
            color: white;
            font-weight: 600;
        }

        .bod_intro {
            width: 100%;
            height: auto;
            background-color: #a9e5eb;
            padding-bottom: 100px;

        }

        .bod_info {
            width: 100%;
            height: 2000vh;
            background-color: #a9e5eb;

        }

        .ch_pic {
            height: 210px;
            width: 256px;
        }

        .chairman_text {
            background-color: #22a6b3;
            color: white;
            height: 70px;
            width: 40%;
            padding: 5px 0px;
            border-radius: 3px;
            text-align: center;
            margin-top: 155px;
        }

        .vice_chairman_text {
            background-color: #22a6b3;
            color: white;
            height: 70px;
            width: 50%;
            padding: 5px 0px;
            border-radius: 3px;
            text-align: center;
            margin-top: 155px;
        }

        .chairman,
        .vice_chairman {
            background-color: white;
            height: 400px;
            width: 280px;
            border-style: ridge;
            border-width: 12px;
            position: absolute;
        }

        .view {
            background-color: #22a6b3;
            border: none;
            border-radius: 3px;
            color: white;
            text-align: center;
            position: absolute;
            right: 10px;
            bottom: 15px;
            height: auto;
            width: auto;
            padding: 10px 20px;
        }

        .name {
            font-weight: bold;
            margin-top: 10px;
            margin-left: 5px;
        }

        .qual {
            margin-left: 5px;
            color: gray;
        }
    </style>
</head>

<body>

    <div>
        <?php include "header.php" ?>
    </div>

    <?php
    include('database.php');
    $query1 = "SELECT * FROM board_of_director 
                  WHERE position = 1";
    $query2 = "SELECT * FROM board_of_director 
                  WHERE position = 2";
    $chair = mysqli_fetch_assoc(mysqli_query($con, $query1));
    $vchair = mysqli_fetch_assoc(mysqli_query($con, $query2));

    ?>





    <div class="main">

        <div  class="textbod">
            <div class="tinbox">
                <p class="mbod fs-1">Meet Our Board of Directors</p>
            </div>
        </div>


        <div  class="bod_intro">
            <div class="tbod navbar justify-content-center fs-1 mb-3 pt-4">
                Board of Directors
            </div>

            <div class="container">
                <div class="row">
                    <div class="col ">
                        <p style="text-align: justify;">The Board of Directors is the supreme authority in the bank’s affairs. The Board of Trust Bank Limited is committed to the bank to achieve superior financial performance and long-term prosperity while meeting stakeholder’s expectations of sound corporate governance. It handles the bank’s affairs and ensures that the organization and its operation are at all times in correct and appropriate order. The Board is responsible for ensuring that the bank is led within a framework of effective control. </p>

                    </div>
                    <div class="col">
                        <p style="text-align: justify;">Among other responsible for setting business objectives, strategies, business plan and formulating policies. The Board approves the business budget and reviews the business plan from time to time to give direction as per changing economic and market environment. The Board also reviews the policies and guidelines issued by Bangladesh Bank and thereby gives directions for due compliance. Furthermore, Board of Directors develops and reviews corporate governance framework as well </p>

                    </div>

                    <div class="col">
                        <p style="text-align: justify;">as recommends to shareholders to appoint external auditor. The Board of Trust Bank Limited consists of 12(Twelve) members including the Managing Director and CEO as ex-officio member of the Board. As per the guideline of Bangladesh Bank and in compliance with the Bangladesh Securities and Exchange Commission’s corporate governance guideline , the Board consists of 02(two) Independent Directors.</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="bod_info" style="">

            <div class="d-flex" style="width: 100%; height:400px;">
                <div class="d-flex justify-content-center" style="width: 40%;">
                    <div class="chairman_text">
                        <p class=" fs-2">Chairman</p>
                    </div>
                </div>

                <div class="d-flex justity-content-center" style="width: 60%;">
                    <div class="chairman">
                        <div>
                            <img class="ch_pic" src="<?php if ($chair['picture'] == "") {
                                                            if ($chair['gender'] == 'male') {
                                                                echo 'logo/men.jpg';
                                                            } else {
                                                                echo 'logo/women.png';
                                                            }
                                                        } else {
                                                            echo $chair['picture'];
                                                        } ?> " alt="">
                        </div>
                        <div>
                            <label class="name"><?php echo $chair['name'] ?></label>
                            <label class="qual"><?php echo $chair['qualification'] ?></label>
                            </p>
                        </div>
                        <form action="" method="post">
                            <input class="view fs-5" type="submit" value="View Profile" name="view" id="">
                        </form>
                    </div>

                </div>

            </div>

            <div class="d-flex" style="width: 100%; height:400px; margin-top:40px;">
                <div class="d-flex justity-content-center" style="width: 20%; margin-left:40%;">
                    <div class="vice_chairman">
                        <div>
                            <img class="ch_pic" src="<?php if ($vchair['picture'] == "") {
                                                            if ($vchair['gender'] == 'male') {
                                                                echo 'logo/men.jpg';
                                                            } else {
                                                                echo 'logo/women.png';
                                                            }
                                                        } else {
                                                            echo $vchair['picture'];
                                                        } ?> " alt="">
                        </div>

                        <div>
                            <label class="name"><?php echo $vchair['name'] ?></label>
                            <label class="qual"><?php echo $vchair['qualification'] ?></label>
                            </p>
                        </div>
                        <form action="" method="post">
                            <input class="view fs-5" type="submit" value="View Profile" name="view" id="">
                        </form>
                    </div>
                </div>

                <div class="d-flex justify-content-center" style="width: 40%;">
                    <div class="vice_chairman_text">
                        <p class=" fs-2">Vice Chairman</p>
                    </div>
                </div>
            </div>

            <style>
                .director {

                }
            </style>










        </div>



        </main>
        <!-- End -->
        <div>
            <?php include "footer.php" ?>
        </div>
</body>

</html>