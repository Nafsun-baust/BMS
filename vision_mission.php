<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vision and Mission</title>
    <style>
        .main2 {
            width: 100%;
            height: auto;
            background-color: #9ddde3;
            padding-bottom: 60px;
        }

        .main2 h1 {
            padding: 45px 0 0px 0;
            color: #066e78;
        }

        .photo {
            width: 45%;
            margin-top: 120px;
        }

        .text {
            width: 55%;
        }

        .vision img {
            height: 200px;
            width: 300px;
        }

        .mission img {
            height: 200px;
            width: 300px;
        }

        .vision {
            margin: 10px 0 0 80px;
            z-index: 10;
        }

        .mission {
            margin: -80px 0 0 280px;
            z-index: 1;
        }

        .vis p {
            font-size: 20px;
            color: #066e78;
           
        }

        .mis p {
            font-size: 20px;
            color: #066e78;
            margin-left: 5px;
            width: 90%;
            margin: -8px 0;
        }

        b {
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div>
        <?php include "header.php" ?>
    </div>
    <div class="main">
        <div class="main2">
            <h1 class="d-flex justify-content-center">Vision and Mission</h1>

            <div class="d-flex mt-5">
                <div class="photo">
                    <div class="vision">
                        <img src="logo/vision.jpg" alt="">
                    </div>
                    <div class="mission">
                        <img src="logo/mission.jpg" alt="">
                    </div>



                </div>


                <div class="text">
                    <div class="vis">
                        <h1>VISION</h1>
                        <p>Build a long-term sustainable financial institution through financial inclusion and deliver optimum value to all stakeholders with the highest level of compliance</p>
                    </div>
                    <div class="mis">
                        <h1>MISSION</h1>
                        <p><b>.</b> Long term sustainable growth – diversified business with robust risk management.</p>
                        <p><b>.</b> Financial inclusion – bring unbanked population into banking network through low cost and technology based service delivery.</p>
                        <p><b>.</b> Accountable to all stakeholders – customers, shareholders, employees and regulators.</p>
                        <p><b>.</b> Highest level of compliance and transparency at all levels of operation.</p>
                    </div>



                </div>

            </div>
        </div>


    </div>
    <div>
        <?php include "footer.php" ?>
    </div>

</body>

</html>