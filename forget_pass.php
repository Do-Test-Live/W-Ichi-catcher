<?php
session_start();

include('admin/include/dbController.php');
$db_handle = new DBController();
include ('cart_backend.php');
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();

if (isset($_POST['verify'])) {
    $email = $db_handle->checkValue(strtolower($_POST['email']));
    $check_customer = $db_handle->numRows("select * from customer where email = '$email'");
    if ($check_customer == 1) {
        function generateVerificationCode()
        {
            // Define the character set for the verification code
            $charset = '0123456789';
            $code_length = 6;
            $code = '';

            // Generate the verification code
            for ($i = 0; $i < $code_length; $i++) {
                $random_index = rand(0, strlen($charset) - 1);
                $code .= $charset[$random_index];
            }

            return $code;
        }

        $verification_code = generateVerificationCode();
        $_SESSION['vcode'] = $verification_code;
        $email_to = $email;
        $mail->isSMTP();
        $mail->Host = 'mail.ngt.hk';  // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ichicatcher@ngt.hk';
        $mail->Password = '&@~(C16kb^3*';
        $mail->Port = 465;  // Specify the SMTP port
        $mail->SMTPSecure = 'ssl';  // Enable encryption, 'ssl' also possible

        // Email content
        $mail->setFrom('ichicatcher@ngt.hk', 'Ichi-Catcher');
        $mail->addAddress($email_to);  // Add recipient email
        $mail->Subject = 'Verify your email.';
        $mail->isHTML(true);
        $mail->Body = "
            <html>
                <body style='background-color: #eee; font-size: 16px;'>
                <div style='max-width: 600px; min-width: 200px; background-color: #ffffff; padding: 20px; margin: auto;'>
                
                    <p style='text-align: center;color:green;font-weight:bold'>Thank you for reaching out to us!</p>
                
                    <p style='color:black;text-align: center'>
                        6 digit authentication code for your email verification is: <strong>$verification_code</strong>
                    </p>
                </div>
                </body>
            </html>";

        // Send the email
        if ($mail->send()) {
            echo "<script>
alert('An email with verification code has sent to your email');
window.location.href = 'verify_email.php?email=$email';
</script>";
            exit;
        } else {
            echo "Something went wrong: " . $mail->ErrorInfo;
        }
    } else {
        echo "<script>
alert('Sorry! This email is not found in our server');
window.location.href = 'forget_pass.php';
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
    <link rel="icon" href="assets/images/favicon/f7.png" type="image/x-icon">
    <title>Forget Password - Enjoy</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="assets/css/animate.min.css"/>

    <!-- font-awesome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bulk-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="assets/css/style.css">
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
<?php include ('include/header.php');?>
<!-- Header End -->


<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <h2 class="mb-2"><?php echo '登錄';?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active"><?php echo '登錄';?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- log in section start -->
<section class="log-in-section background-image-2 section-b-space">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="log-in-box">
                    <div class="log-in-title">
                        <h3><?php echo '歡迎來到Enjoy'; ?></h3>
                        <h4><?php echo '忘記密碼';?></h4>
                    </div>

                    <div class="input-box">
                        <form class="row g-4" action="#" method="post">
                            <div class="col-12">
                                <div class="form-floating theme-form-floating log-in-form">
                                    <input type="email" class="form-control" id="email" placeholder="<?php echo '電子郵件地址';?>" name="email">
                                    <label for="email"><h4><?php echo '電子郵件地址';?></h4></label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-animation w-100 justify-content-center" name="verify" type="submit"><?php echo '登錄';?></button>
                            </div>
                        </form>
                    </div>

                    <div class="other-log-in">
                        <h6></h6>
                    </div>

                    <div class="sign-up-box">
                        <h4><?php echo '沒有帳戶？';?></h4>
                        <a href="sign-up.php"><?php echo '註冊';?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->

<!-- Footer Section Start -->
<?php include ('include/footer.php');?>
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
