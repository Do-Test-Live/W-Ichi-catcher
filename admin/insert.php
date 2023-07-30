<?php
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");

if (isset($_POST["add_cat"])) {
    $name = $db_handle->checkValue($_POST['cat_name']);
    $name_cn = $db_handle->checkValue($_POST['cat_name_cn']);
    $image = '';
    if (!empty($_FILES['cat_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['cat_image']['name'];
        $file_size = $_FILES['cat_image']['size'];
        $file_tmp  = $_FILES['cat_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            $attach_files = '';
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/cat_img/" . $file_name);
            $image = "assets/cat_img/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `category`(`c_name`,`c_name_en`, `image`,  `inserted_at`) VALUES ('$name_cn','$name','$image','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Category';
                </script>";
}

if (isset($_POST["add_product"])) {
    $product_name = $db_handle->checkValue($_POST['product_name']);
    $product_name_en = $db_handle->checkValue($_POST['product_name_en']);
    $product_code = $db_handle->checkValue($_POST['product_code']);
    $product_weight = $db_handle->checkValue($_POST['product_weight']);
    $product_category = $db_handle->checkValue($_POST['product_category']);
    $selling_price = $db_handle->checkValue($_POST['selling_price']);
    $cost = $db_handle->checkValue($_POST['cost']);
    $product_status = $db_handle->checkValue($_POST['product_status']);
    $today_deal = $db_handle->checkValue($_POST['today_deal']);
    $product_description = $db_handle->checkValue($_POST['product_description']);
    $product_description_en = $db_handle->checkValue($_POST['product_description_en']);
    $inserted_at = date("Y-m-d H:i:s");

    $products_image='';
    $arr = array();
    if (!empty($_FILES['product_image']['tmp_name'][0])) {
        // At least one image is selected

        $dataFileName = []; // Array to store the file names

        // Loop through each uploaded image file
        foreach ($_FILES['product_image']['tmp_name'] as $index => $uploadedFile) {
            $originalFileName = $_FILES['product_image']['name'][$index];
            // Get the original image size and type
            list($originalWidth, $originalHeight, $imageType) = getimagesize($uploadedFile);

            // Create image resource from uploaded file based on image type
            switch ($imageType) {
                case IMAGETYPE_JPEG:
                    $image = imagecreatefromjpeg($uploadedFile);
                    break;
                case IMAGETYPE_PNG:
                    $image = imagecreatefrompng($uploadedFile);
                    break;
                case IMAGETYPE_GIF:
                    $image = imagecreatefromgif($uploadedFile);
                    break;
                default:
                    throw new Exception('Unsupported image type.');
            }

            // Resize the image to 250x250 and save it
            $newImage = imagecreatetruecolor(250, 250);
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, 250, 250, $originalWidth, $originalHeight);
            $RandomAccountNumber = mt_rand(1, 99999);
            imagejpeg($newImage, 'assets/products_image/250/' . $RandomAccountNumber . '_' . $originalFileName);

            // Resize the image to 650x650 and save it
            $newImage = imagecreatetruecolor(650, 650);
            imagecopyresampled($newImage, $image, 0, 0, 0, 0, 650, 650, $originalWidth, $originalHeight);
            imagejpeg($newImage, 'assets/products_image/650/' . $RandomAccountNumber . '_' . $originalFileName);

            $dataFileName[] = 'assets/products_image/650/' . $RandomAccountNumber . '_' . $originalFileName;

            // Free up memory
            imagedestroy($image);
            imagedestroy($newImage);
        }

        $databaseValue = implode(',', $dataFileName);
        $products_image = $databaseValue;
    } else {
        $products_image = '';
    }

    $insert = $db_handle->insertQuery("INSERT INTO `product` (`category_id`, `product_code`,`product_weight`, `p_name`,`p_name_en`,`product_price`, `description`,`description_en`, `p_image`,`status`, `inserted_at`,`cost`,`deal_today`) VALUES 
                ('$product_category','$product_code','$product_weight','$product_name','$product_name_en','$selling_price','$product_description','$product_description_en','$products_image','$product_status','$inserted_at','$cost','$today_deal')");
    if($insert){
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Product';
                </script>";
    }


}

if(isset($_POST['add_course'])){
    $course_name = $db_handle->checkValue($_POST['course_name']);
    $course_name_en = $db_handle->checkValue($_POST['course_name_en']);
    $course_type = $db_handle->checkValue($_POST['course_type']);
    $course_duration = $db_handle->checkValue($_POST['course_duration']);
    $course_price = $db_handle->checkValue($_POST['course_price']);
    $course_price_poor = $db_handle->checkValue($_POST['course_price_poor']);
    $course_description = $db_handle->checkValue($_POST['course_description']);
    $course_description_en = $db_handle->checkValue($_POST['course_description_en']);
    $inserted_at = date("Y-m-d H:i:s");

    $image = '';
    if (!empty($_FILES['course_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['course_image']['name'];
        $file_size = $_FILES['course_image']['size'];
        $file_tmp  = $_FILES['course_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/course/" . $file_name);
            $image = "assets/course/" . $file_name;
        }
    }

    $insert = $db_handle->insertQuery("INSERT INTO `course`(`course_name`,`course_name_en`, `course_duration`, `course_description`,`course_description_en`,`course_image`, `inserted_at`,`course_price`,`course_price_poor`,`course_type`) VALUES ('$course_name','$course_name_en','$course_duration','$course_description','$course_description_en','$image','$inserted_at','$course_price','$course_price_poor','$course_type')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Course';
                </script>";
}

if(isset($_POST['add_promo_code'])){
    $coupon_name = $db_handle->checkValue($_POST['coupon_name']);
    $coupon_code = $db_handle->checkValue($_POST['coupon_code']);
    $promo_type = $db_handle->checkValue($_POST['promo_type']);
    $coupon_amount = $db_handle->checkValue($_POST['coupon_amount']);
    $start_date = $db_handle->checkValue($_POST['start_date']);
    $expirey_date = $db_handle->checkValue($_POST['expirey_date']);
    $coupon_description = $db_handle->checkValue($_POST['coupon_description']);
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `promo_code`(`coupon_name`, `description`, `code`, `coupon_type`, `amount`, `start_date`, `expirey_date`, `inserted_at`) 
VALUES ('$coupon_name','$coupon_description','$coupon_code','$promo_type','$coupon_amount','$start_date','$expirey_date','$inserted_at')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Promo-Code';
                </script>";

}

if (isset($_POST["admin_insert"])) {
    $admin_name = $db_handle->checkValue($_POST['admin_name']);
    $admin_role = $db_handle->checkValue($_POST['admin_role']);
    $admin_email = $db_handle->checkValue($_POST['admin_email']);
    $password = $db_handle->checkValue($_POST['password']);
    $image = '';
    if (!empty($_FILES['admin_image']['name'])) {
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber . "_" . $_FILES['admin_image']['name'];
        $file_size = $_FILES['admin_image']['size'];
        $file_tmp  = $_FILES['admin_image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if ($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
            $attach_files = '';
            echo "<script>
                document.cookie = 'alert = 5;';
                window.location.href='Add-Category';
                </script>";

        } else {
            move_uploaded_file($file_tmp, "assets/admin/" . $file_name);
            $image = "assets/admin/" . $file_name;
        }
    }

    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `admin_login`(`name`, `image`, `email`, `password`, `role`) VALUES ('$admin_name','$image','$admin_email','$password',' $admin_role')");

    echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Admin';
                </script>";
}

if(isset($_POST['customer_signup'])){
    $customer_name = $db_handle->checkValue($_POST['customer_name']);
    $customer_email = $db_handle->checkValue($_POST['customer_email']);
    $password = $db_handle->checkValue($_POST['password']);
    $customer_number = $db_handle->checkValue($_POST['customer_number']);
    $membership_point = 200;
    $inserted_at = date("Y-m-d H:i:s");

    $insert = $db_handle->insertQuery("INSERT INTO `customer`(`customer_name`, `email`, `number`, `password`, `inserted_at`,`membership_point`) 
VALUES ('$customer_name','$customer_email','$customer_number','$password','$inserted_at','$membership_point')");

    if($insert){
            $email_to = $customer_email;
            $subject = '王家芝士寵工房 會員註冊';


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
                                                    王家芝士寵工房 會員註冊 </h3>
                                            </td>
                        
                                            <td style='display: block; margin-left: 20px;'>
                                                <p>
                                                    您已成功登記。現在可以使用您的電郵和密碼登錄。
                                                </p>
                                            </td>
                        
                                            <td style='display: block; margin-left: 20px'>
                                                <p>立即登入帳戶: <a href="https://rcrpetsworkshop.com/Login" target="_blank">https://rcrpetsworkshop.com/Login</a><br/><br/>
                                                    敬請留意我們的最新產品及資訊<br/><br/>
                                                </p>
                                                <h3>付款方法: </h3>
                                                <p>
                                                    付款方法可用轉數快、Payme 或八達通，<br/><br/>
                                                    收到轉賬後2-10天內發貨，<br/><br/>
                                                    請於付款後將入數資料whatsapp到52441954，<br/><br/>
                                                    買滿$600可享順豐智能櫃包郵，<br/><br/>
                                                    未滿$600則順豐到付。<br/><br/>
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
                alert('您的帳戶創建成功。享受購物!');
                document.cookie = 'alert = 3;';
                window.location.href='../login.php';
                </script>";
            }
    }
}


if(isset($_POST['add_quantity'])){
    $category_id = $db_handle->checkValue($_POST['category_id']);
    $product_id = $db_handle->checkValue($_POST['product_id']);
    $product_quantity = $db_handle->checkValue($_POST['product_quantity']);

    $inserted_at = date("Y-m-d H:i:s");

    $check_value = $db_handle->runQuery("SELECT `quantity` FROM `stock` WHERE category_id='$category_id' AND product_id='$product_id'");
    $row = $db_handle->numRows("SELECT `quantity` FROM `stock` WHERE category_id='$category_id' AND product_id='$product_id'");
    if($row > 0){
        for($i=0; $i<$row; $i++){
            $previous_quantity = $check_value[$i]['quantity'];
        }
        $updated_quantity = $product_quantity + $previous_quantity;
        $update = $db_handle ->insertQuery("UPDATE `stock` SET `quantity`='$updated_quantity',`inserted_at`='$inserted_at' WHERE category_id='$category_id' AND product_id='$product_id'");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Stock';
                </script>";
    }else{
        $insert_stock = $db_handle->insertQuery("INSERT INTO `stock`(`category_id`, `product_id`, `quantity`, `inserted_at`) VALUES ('$category_id','$product_id','$product_quantity','$inserted_at')");
        echo "<script>
                document.cookie = 'alert = 3;';
                window.location.href='Add-Stock';
                </script>";
    }
}