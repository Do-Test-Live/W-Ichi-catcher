<?php
session_start();
require_once("admin/include/dbController.php");
$db_handle = new DBController();
date_default_timezone_set("Asia/Hong_Kong");
$customer_id = 0;
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}

if (isset($_POST["placeOrder"])) {
    $f_name = $db_handle->checkValue($_POST['f_name']);
    $l_name = $db_handle->checkValue($_POST['l_name']);
    $phone = $db_handle->checkValue($_POST['phone_number']);
    $email = $db_handle->checkValue($_POST['email']);
    $address = $db_handle->checkValue($_POST['address']);
    $city = $db_handle->checkValue($_POST['city']);
    $zip_code = $db_handle->checkValue($_POST['zip_code']);
    $note = $db_handle->checkValue($_POST['note']);
    $discount = 0;
    $delivery_charge = 0;
    $addInfo = 0;
    $updated_at = date("Y-m-d H:i:s");
    $total_purchase = $_POST['total_value'];

    $insert_billing_details = $db_handle->insertQuery("INSERT INTO `billing_details`(`customer_id`, `f_name`, `l_name`, 
                              `email`, `phone`, `address`, `city`, `zip_code`, 
                              `discount`,`total_purchase`,`delivery_charges`,  `updated_at`,`note`) 
                              VALUES ('$customer_id','$f_name','$l_name','$email','$phone'
                              ,'$address','$city','$zip_code','$discount','$total_purchase','$delivery_charge','$updated_at','$note')");

    $billing_id = $db_handle->runQuery("SELECT * FROM billing_details order by id desc limit 1");
    $b_id = $billing_id[0]["id"];

    foreach ($_SESSION["cart_item"] as $item) {
        $name = $item["name"];
        $item_price = $item["quantity"] * $item["price"];
        $quantity = $item["quantity"];
        $unit_price = $item["price"];
        $product_id = $item['id'];

        $invoice = $db_handle->insertQuery("INSERT INTO `invoice_details`( `customer_id`, `billing_id`,`product_id`, `product_name`,`product_quantity`, `product_unit_price`,`product_total_price`, `updated_at`) VALUES ('$customer_id','$b_id','$product_id','$name','$quantity','$unit_price','$item_price', '$updated_at')");
    }

    if (isset($_SESSION) && $insert_billing_details) {
        session_unset();
        session_destroy();
    }

// Fetch data from the database
    $product_details = $db_handle->runQuery("SELECT * FROM `invoice_details` WHERE `billing_id` = '$b_id'");
    $no_product_details = $db_handle->numRows("SELECT * FROM `invoice_details` WHERE `billing_id` = '$b_id'");

// Prepare table HTML
    // Prepare table HTML
    $tableHtml = '<table style="border-collapse: collapse; width: 100%;">';
    $tableHtml .= '<tr>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Product Name</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Product Quantity</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Unit Price</th>
                    <th style="border: 1px solid #000; padding: 8px; text-align: center;">Total Price</th>
                </tr>';

        for($i = 0; $i < $no_product_details; $i++) {
            $tableHtml .= '<tr>';
            $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_name'] . '</td>';
            $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_quantity'] . '</td>';
            $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_unit_price'] . '</td>';
            $tableHtml .= '<td style="border: 1px solid #000; padding: 8px; text-align: center;">' . $product_details[$i]['product_total_price'] . '</td>';
            $tableHtml .= '</tr>';
        }

    $tableHtml .= '</table>';

        $fetch_customer = $db_handle->runQuery("SELECT `f_name`, `l_name`, `email`, `phone`, `address`, `city`, `zip_code`, `note`FROM `billing_details` WHERE id='$b_id'");
    $customer_data = '<p>Customer Name: ' . $fetch_customer[0]['f_name'] . ' ' . $fetch_customer[0]['l_name'] . '</p>';
    $customer_data .= '<p>Customer Email: ' . $fetch_customer[0]['email'] . '</p>';
    $customer_data .= '<p>Contact Number: ' . $fetch_customer[0]['phone'] . '</p>';
    $customer_data .= '<p>Address: ' . $fetch_customer[0]['address'] . '</p>';
    $customer_data .= '<p>Note: ' . $fetch_customer[0]['note'] . '</p>';




// Send email
    $to = 'rcrpetsworkshop@gmail.com';
    $subject = 'Database Table Data';
    $message = 'Hey! You have received a new order. Here is the details of the order received:<br><br>Customer Details:'.$customer_data.'<br><br> Order Details ' . $tableHtml;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: business@rcrpetsworkshop.com' . "\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "
    <script>
    alert('Your request is received. We will let you know the updates soon!');
    window.location.href = 'Home';
    </script>
    ";
    } else {
        echo "
    <script>
    alert('Something Went Wrong');
    window.location.href = 'Home';
    </script>
    ";
    }
}
