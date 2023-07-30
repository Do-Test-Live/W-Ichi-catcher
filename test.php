<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$customer_id = 0;
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
$id = 2;
?>

<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <style type="text/css">
        /* Paste the CSS styles from your original HTML template here */
        body {
            text-align: center;
            margin: 0 auto;
            width: 650px;
            font-family: 'Public Sans', sans-serif;
            background-color: #e2e2e2;
            display: block;
        }

        .mb-3 {
            margin-bottom: 30px;
        }

        ul {
            margin: 0;
            padding: 0;
        }

        li {
            display: inline-block;
            text-decoration: unset;
        }

        a {
            text-decoration: none;
        }

        h5 {
            margin: 10px;
            color: #777;
        }

        .text-center {
            text-align: center
        }

        .header-menu ul li + li {
            margin-left: 20px;
        }

        .header-menu ul li a {
            font-size: 14px;
            color: #252525;
            font-weight: 500;
        }

        .password-button {
            background-color: #ffcc18;
            border: none;
            color: #000;
            padding: 14px 26px;
            font-size: 18px;
            border-radius: 6px;
            font-weight: 700;
            font-family: 'Nunito Sans', sans-serif;
        }

        .footer-table {
            position: relative;
        }

        .footer-table::before {
            position: absolute;
            content: "";
            background-position: top right;
            top: 0;
            left: -71%;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: contain;
            opacity: 0.3;
        }

        .footer-table::after {
            position: absolute;
            content: "";
            background-position: top right;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            z-index: -1;
            background-size: contain;
            opacity: 0.3;
        }

        .theme-color {
            color: #ffcc18;
        }
        table.customTable {
            width: 100%;
            background-color: #FFFFFF;
            border-collapse: collapse;
            border-width: 2px;
            border-color: #ffcc18;
            border-style: solid;
            color: #000000;
        }
        table.customTable td, table.customTable th {
            border-width: 1px;
            border-color: #ffcc18;
            border-style: solid;
            padding: 5px;
        }

        table.customTable thead {
            background-color: #ffcc18;
        }
    </style>
</head>

<body style="margin: 20px auto;">
<table align="center" border="0" cellpadding="0" cellspacing="0"
       style="background-color: white; width: 100%; box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);-webkit-box-shadow: 0px 0px 14px -4px rgba(0, 0, 0, 0.2705882353);">
    <!-- Paste the rest of your HTML template code here -->
    <tbody>
    <tr>
        <td>
            <table class="header-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr class="header"
                    style="background-color: #f7f7f7;display: flex;align-items: center;justify-content: space-between;width: 100%;">
                    <td class="header-logo" style="padding: 10px 32px;">
                        <a href="#" style="display: block; text-align: left;">
                            <img src="https://rcrpetsworkshop.com/assets/images/logo/2.png" class="main-logo" alt="logo" style="width: 120px">
                        </a>
                    </td>
                </tr>
            </table>

            <table class="contant-table" style="margin-bottom: -6px;" align="center" border="0" cellpadding="0"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <td>
                        <img src="https://wayshk.ngt.hk/assets/images/welcome-poster.jpg" alt="">
                    </td>
                </tr>
                </thead>
            </table>

            <table class="contant-table" style="margin-top: 40px;" align="center" border="0" cellpadding="0"
                   cellspacing="0" width="100%">
                <thead>
                <tr style="display: block;">
                    <td style="display: block;">
                        <h3 style="font-weight: 700; font-size: 20px; margin: 0; text-transform: uppercase; padding: 10px">
                            Reset Password. </h3>
                    </td>

                    <td style='display: block; margin-left: 20px;'>
                        <p>
                            Please visit this <a href="https://rcrpetsworkshop.com/Reset-Password?id=<?php echo $id;?>" target="_blank">link</a> and set new password for your account.
                        </p>
                    </td>
                </tr>
                </thead>
            </table>

            <table class="text-center footer-table" align="center" border="0" cellpadding="0" cellspacing="0"
                   width="100%"
                   style="background-color: #282834; color: white; padding: 24px; overflow: hidden; z-index: 0; margin-top: 30px;">
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" class="footer-social-icon text-center"
                               align="center" style="margin: 8px auto 11px;">
                            <tr>
                                <td>
                                    <h4 style="font-size: 19px; font-weight: 700; margin: 0; color: #FFFFFF">聯絡我們</h4><br/>
                                </td>
                            </tr>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="width: 100%; text-align: center;">
                                    <h5 style="font-size: 13px; text-transform: uppercase; margin: 10px 0 0; color:#ddd;
                                                        letter-spacing:1px; font-weight: 500;">產品訂購或查詢: WhatsApp <a href="https://wa.me/85252441954" target="_blank" style="color: #ffcd1c;">+852 52441954</a></h5>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>

</html>