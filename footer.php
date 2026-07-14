<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/footer.css">

    <!-- <link rel="stylesheet" type="text/css" href="footer.css"> -->
    <title>Document</title>

    <style>
       
    </style>
</head>

<body>

    <p style="margin-bottom:190px"></p>

    <footer>

        <?php
        include('database.php');
        $query = "SELECT address,Phone,Email,Fax,Call_Center,Facebook,Linkedin,Twitter,Youtube FROM bank";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>


            <div class="about">
                <p style="text-align: center; font-size: 22px">About BMS</p>
                <p style="margin-bottom: 30px;">This
                    Bank is committed to delivering reliable financial services, fostering economic growth, and building lasting relationships with our customers. Trust us with your financial needs and experience excellence in banking.</p>

                <a href="<?php echo $row["Facebook"] ?>" target="_blank"><img src="logo/facebook.png" alt=""></a>
                <a href="<?php echo $row["Twitter"] ?>" target="_blank"><img src="logo/twitter.png" alt=""></a>
                <a href="<?php echo $row["Linkedin"] ?>" target="_blank"><img src="logo/linkedin.png" alt=""></a>
                <a href="<?php echo $row["Youtube"] ?>" target="_blank"><img src="logo/youtube.png" alt=""></a>
            </div>


            <div class="contact">
                <p class="contact_us">Contact Us</p>
                <p class="head_office">Head Office</p>
                <p><?php echo $row["address"] ?></p>
            </div>

            <div class="contact2">
                <p class="tel"><?php echo "Tel: " . $row["Phone"] ?></p>
                <p class="fax"><?php echo "Fax: " . $row["Fax"] ?></p>
                <p class="call_center"> <?php echo "Call-Center: " . $row["Call_Center"] ?> </p>
                <p class="email"><?php echo "Email: " . $row["Email"] ?></p>
            </div>



        <?php } ?>
    </footer>
</body>

</html>