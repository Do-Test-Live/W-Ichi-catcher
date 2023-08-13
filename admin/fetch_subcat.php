<?php
// ajax-handler.php

// Include your database connection or any required files
session_start();
require_once("include/dbController.php");
$db_handle = new DBController();
if (!isset($_SESSION['userid'])) {
    header("Location: Login");
}


if(isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];

    // Fetch subcategories based on the selected category
    $subCategories = $db_handle->runQuery("SELECT * FROM `sub_category` WHERE `category_id` = $categoryId");

    echo json_encode($subCategories);
} else {
    echo json_encode(['error' => 'categoryId not provided']);
}
