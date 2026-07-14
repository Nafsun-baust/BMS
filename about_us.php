<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        .first {
            width: 100%;
            height: 80vh;
            background-image: url('logo/bank3.jpg');
            background-size: cover;
            padding: 120px 0 0 80px;
        }

        .f {
            opacity: 0.8;
            height: 250px;
            width: 70%;
            background-color: #22a6b3;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
        }

        .f h1,
        .f h3 {
            text-align: center;
        }

        .f h1 {
            color: white;
        }

        .f h3 {
            color: #574b90;
        }

        .second {
            background-color: #22a6b3;
            width: 100%;
            height: 25px;
            opacity: 0.8;
        }

        .third {
            height: auto;
            width: 100%;
            background-color: #9ddde3;
            padding-top: 15px;
            color: #066e78;
            padding-bottom: 50px;
        }

        .one,.two,.three,.four,.five {
            margin: 20px 50px;
            font-size: 20px;
            text-align: justify;
        }
        .img img{
            margin: 0 30px 0 0;
            height: 600px;
        }
    </style>
</head>

<body>

    <div>
        <?php include "header.php" ?>
    </div>
    <div class="main">

        <div class="first">
            <div class="f">
                <div>
                    <h1>ABOUT US</h1>
                    <h3><i>A Bank for Financial Inclusion</i></h3>
                </div>
            </div>
        </div>
        <div class="second">
        </div>
        <div class="third">
            <h1 class="d-flex justify-content-center">About Us</h1>
            <p class="one">Nexus Capital Bank Limited is one of the leading private commercial banks having a spread network of  64 ATM Booths and above 500 POS across Bangladesh and plans to open more branches to cover the important commercial areas in Dhaka, Chittagong, Sylhet and other areas. The bank, sponsored by the Army Welfare Trust (AWT), is first of its kind in the country. With a wide range of modern corporate and consumer financial products Trust Bank has been operating in Bangladesh since 1999 and has achieved public confidence as a sound and stable bank.</p>
            <div class="d-flex">
                <div>
                    <p class="two">In 2001, the bank introduced automated banking system to increase efficiency and improve customer service. In the year 2005, the bank moved one step further and introduced ATM services for its customers.</p>
                    <p class="three">Since bank’s business volume increased over the years and the demands of the customers enlarged in manifold, our technology has been upgraded to manage the growth of the bank and meet the demands of our customers.</p>
                    <p class="four">In January 2007, Nexus Capital Bank successfully launched Online Banking Services which facilitate Any Branch Banking, ATM Banking, Phone Banking, SMS Banking, & Internet Banking to all customers.  Customers can now deposit or withdraw money from any Branch of Trust Bank nationwide without needing to open multiple accounts in multiple Branches.</p>
                    <p class="five">Via Online Services and Visa Electron (Debit Card), ATMs now allow customers to retrieve 24x7 hours Account information such as account balance checkup through mini-statements and cash withdrawals.  Trust Bank has successfully introduced Visa Credit Cards to serve it’s existing and potential valued customers.  Credits cards can now be used at shops & restaurants all around Bangladesh and even internationally. </p>

                </div>
                <div class="img">
                     <img src="logo/image.png" alt="">
                </div>

            </div>
        </div>

    </div>
    <div>
        <?php include "footer.php" ?>
    </div>

</body>

</html>