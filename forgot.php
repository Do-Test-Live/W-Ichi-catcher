<?php
session_start();
if(isset($_SESSION['id'])){
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();

if(isset($_POST['forget_pass'])){
    $email = $db_handle->checkValue($_POST['email']);

    $fetch_customer = $db_handle->runQuery("SELECT * FROM `customer` WHERE email = '$email'");
    $fetch_customer_no = $db_handle->numRows("SELECT * FROM `customer` WHERE email = '$email'");

    if($fetch_customer_no == 1){
        $id = $fetch_customer[0]['id'];
        if($fetch_customer){
            $email_to = $email;
            $subject = '重設密碼';


            $headers = "From: Royal Cheese <" . $db_handle->from_email() . ">\r\n";
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";

            $message = <<<HTML
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
                                                    請點擊此<a href="https://rcrpetsworkshop.com/Reset-Password?id=$id;" target="_blank">連結</a>，並為您的帳戶設定新密碼。
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
 HTML;
            if (mail($email_to, $subject, $message, $headers)) {
                echo "<script>
                alert('一封包含進一步指示的電子郵件已發送至您的郵箱。請按照指示重設您的帳戶密碼。');
                </script>";
            }
        }

    }else{
        echo "<script>
alert('抱歉，您提供的電子郵件在我們的資料庫中找不到。')
</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Royal Cheese">
    <meta name="keywords" content="Royal Cheese">
    <meta name="author" content="Royal Cheese">
    <link rel="icon" href="assets/images/favicon/2.png" type="image/x-icon">
    <title>Forgot Password</title>

   <?php include ('include/css.php');?>
    <style>
        header .header-top .about-list .right-nav-list .theme-form-select .dropdown-toggle.hkd::before {
            content: " ";
            position: absolute;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    <?php
    include ('include/header.php');
    ?>
    <!-- Header End -->


    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2><?php if($_SESSION['language'] === 'CN') echo '忘記密碼'; else echo 'Forgot Password';?></h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.php">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active"><?php if($_SESSION['language'] === 'CN') echo '忘記密碼'; else echo 'Forgot Password';?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="assets/images/inner-page/forgot.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                <h3><?php if($_SESSION['language'] === 'CN') echo '歡迎來到 Royal Cheese'; else echo 'Welcome To Royal Cheese';?></h3>
                                <h4><?php if($_SESSION['language'] === 'CN') echo '忘記密碼了嗎'; else echo 'Forgot your password';?></h4>
                            </div>

                            <div class="input-box">
                                <form class="row g-4" action="" method="post">
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="<?php if($_SESSION['language'] === 'CN') echo '電子郵件地址'; else echo 'Email Address';?>">
                                            <label for="email"><?php if($_SESSION['language'] === 'CN') echo '電子郵件地址'; else echo 'Email Address';?></label>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <button class="btn btn-animation w-100" type="submit" name="forget_pass"><?php if($_SESSION['language'] === 'CN') echo '已發送郵件'; else echo 'Forgot Password';?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->

    <!-- Footer Section Start -->
    <?php
    include ('include/footer.php');
    ?>
    <!-- Footer Section End -->

    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Deal Box Modal Start -->
    <?php include ('include/deal.php');?>
    <!-- Deal Box Modal End -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="assets/js/feather/feather.min.js"></script>
    <script src="assets/js/feather/feather-icon.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick/slick.js"></script>
    <script src="assets/js/slick/slick-animation.min.js"></script>
    <script src="assets/js/slick/custom_slick.js"></script>

    <!-- Lazyload Js -->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>

    <!-- thme setting js -->
    <script src="assets/js/theme-setting.js"></script>
</body>
</html>
