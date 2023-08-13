<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();

include ('cart_backend.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enjoy">
    <meta name="keywords" content="Enjoy">
    <meta name="author" content="Enjoy">
    <link rel="icon" href="assets/images/favicon/f7.png" type="image/x-icon">
    <title>Shop | ICHI CATCHER</title>

    <!-- Google font -->
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
</head>

<body>
<header class="">
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 d-xxl-block d-none">
                    <div class="top-left-header">
                        <span class="text-white">Hong Kong</span>
                    </div>
                </div>

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1">Welcome to Ichi-Catcher!</strong>Wrap new offers/gift
                                        every signle day on Weekends.<strong class="ms-1">New Coupon Code: Ichicatcher24
                                        </strong>

                                    </h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>Something you love is now on sale!
                                        <a href="#" class="text-white">Buy Now
                                            !</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <ul class="about-list right-nav-about">
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-language"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="assets/images/country/HK.png"
                                         class="img-fluid blur-up lazyload" alt="">
                                    <span>CN</span>
                                </button>
                            </div>
                        </li>
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>USD</span>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button me-2" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                        </button>
                        <a href="index.html" class="web-logo nav-logo">
                            <img src="assets/images/logo/logo-1.png" style="height: 52px;" class="img-fluid blur-up lazyload" alt="">
                        </a>

                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php">Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <a href="cart.php" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge"><?php echo $total_quantity; ?>
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                        </a>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>Hello,</h6>
                                            <h5>My Account</h5>
                                        </div>
                                    </div>

                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="#">Log In</a>
                                            </li>

                                            <li class="product-box-contain">
                                                <a href="#">Register</a>
                                            </li>

                                            <li class="product-box-contain">
                                                <a href="#">Forgot Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Start -->


<!-- Header End -->


<!-- Poster Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="slider-1 slider-animate product-wrapper no-arrow">
                    <div>
                        <div class="banner-contain-2 hover-effect">
                            <img src="assets/images/grocery/banner/1.jpg" class="bg-img rounded-3 blur-up lazyload"
                                 alt="">
                            <div style="height:250px">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Poster Section End -->

<!-- Shop Section Start -->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-custome-3">
                <div class="left-box wow fadeInUp">
                    <div class="shop-left-sidebar">
                        <div class="back-button">
                            <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                        </div>

                        <div class="accordion custome-accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                        <span>Categories</span>
                                    </button>
                                </h2>
                            </div>

                            <?php
                            $fetch_cat = $db_handle->runQuery("select * from category where status = '1'");
                            $no_fetch_cat = $db_handle->numRows("select * from category where status = '1'");
                            for ($i = 0; $i < $no_fetch_cat; $i++) {
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?php echo $fetch_cat[$i]['id']; ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse<?php echo $fetch_cat[$i]['id']; ?>"
                                                aria-expanded="true"
                                                aria-controls="collapse<?php echo $fetch_cat[$i]['id']; ?>">
                                            <span><?php echo $fetch_cat[$i]['c_name']; ?></span>
                                        </button>
                                    </h2>
                                    <div id="collapse<?php echo $fetch_cat[$i]['id']; ?>"
                                         class="accordion-collapse collapse show"
                                         aria-labelledby="heading<?php echo $fetch_cat[$i]['id']; ?>">
                                        <div class="accordion-body">
                                            <?php
                                            $cat_id = $fetch_cat[$i]['id'];
                                            $fetch_sub_cat = $db_handle->runQuery("select * from sub_cat where cat_id = '$cat_id'");
                                            $no_fetch_sub_cat = $db_handle->numRows("select * from sub_cat where cat_id = '$cat_id'");
                                            for ($j = 0; $j < $no_fetch_sub_cat; $j++) {
                                                ?>
                                                <ul class="category-list custom-padding custom-height">
                                                    <li><a href="index.php?subcat=<?php echo $fetch_sub_cat[$j]['id'];?>"><?php echo $fetch_sub_cat[$j]['sub_cat_name'];?></a></li>
                                                </ul>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET['catId'])) {
                $id = $_GET['catId'];
                $fetch_cat_name = $db_handle->runQuery("select * from category where id = '$id'");
                $cat_name = $fetch_cat_name[0]['c_name'];
                $cat_name_en = $fetch_cat_name[0]['c_name_en'];
                ?>
                <div class="col-custome-9">
                    <h2><?php echo $cat_name; ?>
                    </h2>
                    <div class="row g-sm-4 g-3 row-cols-xxl-4 mt-3 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        <?php
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // calculate the offset for the SQL query
                        $offset = ($current_page - 1) * 8;
                        $fetch_products = $db_handle->runQuery("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' AND product.category_id = '$id' limit 8 OFFSET $offset");
                        $num_rows = $db_handle->numRows("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' AND product.category_id = '$id' limit 8 OFFSET $offset");
                        for ($i = 0; $i < $num_rows; $i++) {
                            ?>
                            <div class="search_content">
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                <img src="admin/<?php
                                                echo str_replace("650", "250", strtok($fetch_products [$i]['p_image'], ','));
                                                ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="#"
                                                       class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name"><?php echo $fetch_products[$i]['c_name']; ?></span>
                                            <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                <h5 class="name"><?php echo $fetch_products[$i]['p_name']; ?></h5>
                                            </a>
                                            <!--<div class="product-rating mt-2">
                                                <ul class="rating">
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star" class="fill"></i>
                                                    </li>
                                                    <li>
                                                        <i data-feather="star"></i>
                                                    </li>
                                                </ul>
                                            </div>-->
                                            <h5 class="price"><span
                                                        class="theme-color">
                                                     HK$<?php echo $fetch_products [$i]['product_price'] ?>
                                                        </span>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>"
                                                   class="btn btn-add-cart addcart-button"><?php echo '查看詳情'; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="index.php?catId=<?php echo $id; ?>&page=1" tabindex="-1"
                                   aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <?php
                            if (isset($_GET['page']) && $_GET['page'] > 1) {
                                $c_page = $_GET['page'];
                                $n_page = $c_page - 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="index.php?catId=<?php echo $id; ?>&page=<?php echo $n_page; ?>"
                                       tabindex="-1" aria-disabled="true">
                                        Previous
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            // calculate the total number of pages
                            $new = $db_handle->runQuery("SELECT COUNT(id) as c FROM `product` WHERE category_id = '$id'");
                            $no_new = $db_handle->numRows("SELECT COUNT(id) as c FROM `product` WHERE category_id = '$id'");

                            $total_pages = ceil($new[0]['c'] / 8);
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            for ($i = $page; $i <= $total_pages; $i++) {
                                if ($i == $page + 5) {
                                    echo "......";
                                    $i = $total_pages;
                                }

                                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="index.php?catId=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                            }
                            if (!isset($_GET['page']) || $_GET['page'] < $i - 1) {
                                if (!isset($_GET['page']))
                                    $n_page = 2;
                                else
                                    $n_page = $_GET['page'] + 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="index.php?catId=<?php echo $id; ?>&page=<?php echo $n_page; ?>">
                                        Next
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link"
                                   href="index.php?catId=<?php echo $id; ?>&page=<?php echo $i - 1; ?>">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
            }elseif (isset($_GET['subcat'])) {
                $id = $_GET['subcat'];
                $fetch_sub_cat_name = $db_handle->runQuery("select * from sub_cat where id = '$id'");
                $sub_cat_name = $fetch_sub_cat_name[0]['sub_cat_name'];
                ?>
                <div class="col-custome-9">
                    <h2><?php echo $sub_cat_name; ?>
                    </h2>
                    <div class="row g-sm-4 g-3 row-cols-xxl-4 mt-3 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        <?php
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // calculate the offset for the SQL query
                        $offset = ($current_page - 1) * 8;
                        $fetch_products = $db_handle->runQuery("SELECT * FROM sub_cat,`product` WHERE product.status = '1' and product.subcat_id = sub_cat.id limit 8 OFFSET $offset");
                        $num_rows = $db_handle->numRows(" SELECT * FROM sub_cat,`product` WHERE product.status = '1' and product.subcat_id = sub_cat.id limit 8 OFFSET $offset");
                        for ($i = 0; $i < $num_rows; $i++) {
                            ?>
                            <div class="search_content">
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                <img src="admin/<?php
                                                echo str_replace("650", "250", strtok($fetch_products [$i]['p_image'], ','));
                                                ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="#"
                                                       class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name"><?php echo $fetch_products[$i]['sub_cat_name']; ?></span>
                                            <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                <h5 class="name"><?php echo $fetch_products[$i]['p_name']; ?></h5>
                                            </a>
                                            <h5 class="price"><span
                                                        class="theme-color">
                                                     HK$<?php echo $fetch_products [$i]['product_price'] ?>
                                                        </span>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>"
                                                   class="btn btn-add-cart addcart-button"><?php echo '查看詳情'; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="index.php?catId=<?php echo $id; ?>&page=1" tabindex="-1"
                                   aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <?php
                            if (isset($_GET['page']) && $_GET['page'] > 1) {
                                $c_page = $_GET['page'];
                                $n_page = $c_page - 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="index.php?subcat=<?php echo $id; ?>&page=<?php echo $n_page; ?>"
                                       tabindex="-1" aria-disabled="true">
                                        Previous
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            // calculate the total number of pages
                            $new = $db_handle->runQuery("SELECT COUNT(id) as c FROM `product` WHERE subcat_id = '$id'");
                            $no_new = $db_handle->numRows("SELECT COUNT(id) as c FROM `product` WHERE subcat_id = '$id'");

                            $total_pages = ceil($new[0]['c'] / 8);
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            for ($i = $page; $i <= $total_pages; $i++) {
                                if ($i == $page + 5) {
                                    echo "......";
                                    $i = $total_pages;
                                }

                                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="index.php?subcat=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                            }
                            if (!isset($_GET['page']) || $_GET['page'] < $i - 1) {
                                if (!isset($_GET['page']))
                                    $n_page = 2;
                                else
                                    $n_page = $_GET['page'] + 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="index.php?subcat=<?php echo $id; ?>&page=<?php echo $n_page; ?>">
                                        Next
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link"
                                   href="index.php?subcat=<?php echo $id; ?>&page=<?php echo $i - 1; ?>">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
            }
            else {
                ?>
                <div class="col-custome-9">

                    <div class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                        <?php
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        // calculate the offset for the SQL query
                        $offset = ($current_page - 1) * 8;
                        $fetch_products = $db_handle->runQuery("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' limit 12 OFFSET $offset;");
                        $num_rows = $db_handle->numRows("SELECT * FROM category,`product` WHERE product.status = '1' and product.category_id = category.id AND category.status = '1' limit 12 OFFSET $offset;");
                        for ($i = 0; $i < $num_rows; $i++) {
                            ?>
                            <div class="search_content">
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                <img src="admin/<?php
                                                echo str_replace("650", "250", strtok($fetch_products [$i]['p_image'], ','));
                                                ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#view">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="#"
                                                       class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name"><?php echo $fetch_products[$i]['c_name']; ?></span>
                                            <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                <h5 class="name"><?php echo $fetch_products[$i]['p_name']; ?></h5>
                                            </a>

                                            <h5 class="price"><span
                                                        class="theme-color">
                                                        HK$<?php echo $fetch_products [$i]['product_price']; ?>
                                                       </span>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>"
                                                   class="btn btn-add-cart addcart-button"><?php echo '查看詳情'; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <nav class="custome-pagination">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="index.php?catId=1&page=1" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <?php
                            if (isset($_GET['page']) && $_GET['page'] > 1) {
                                $c_page = $_GET['page'];
                                $n_page = $c_page - 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $n_page; ?>" tabindex="-1"
                                       aria-disabled="true">
                                        Previous
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <?php
                            // calculate the total number of pages
                            $new = $db_handle->runQuery("SELECT COUNT('id') as c FROM product");
                            $no_new = $db_handle->numRows("SELECT COUNT('id') as c FROM product");

                            $total_pages = ceil($new[0]['c'] / 8);
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }
                            for ($i = $page; $i <= $total_pages; $i++) {
                                if ($i == $page + 5) {
                                    echo "......";
                                    $i = $total_pages;
                                }
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php
                            }
                            if (!isset($_GET['page']) || $_GET['page'] < $i - 1) {
                                if (!isset($_GET['page']))
                                    $n_page = 2;
                                else
                                    $n_page = $_GET['page'] + 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?page=<?php echo $n_page; ?>">
                                        Next
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="index.php?page=<?php echo $i - 1; ?>">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<!-- Footer Section Start -->
<footer class="section-t-space footer-section-2 footer-color-3 pt-3">
    <div class="container-fluid-lg">
        <div class="main-footer">
            <div class="row g-md-4 gy-sm-5">
                <div class="col-xxl-4 col-xl-6 col-sm-6" style="padding-top: 35px;">
                    <a href="#" class="foot-logo theme-logo">
                        <img src="assets/images/logo/logo-22.png" style="height: 52px;"
                             class="img-fluid blur-up lazyload" alt="">
                    </a>
                    <p class="information-text information-text-2">it is a long established fact that a reader will<br>
                        be distracted by the readable content.</p>
                    <ul class="social-icon">
                        <li class="light-bg">
                            <a href="#" class="footer-link-color">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="light-bg">
                            <a href="#"
                               class="footer-link-color">
                                <i class="fab fa-google"></i>
                            </a>
                        </li>
                        <li class="light-bg">
                            <a href="#" class="footer-link-color">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="light-bg">
                            <a href="#" class="footer-link-color">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="light-bg">
                            <a href="#" class="footer-link-color">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xxl-4 col-xl-6 col-sm-6 mx-auto">
                </div>

                <div class="col-xxl-4 col-xl-6 col-sm-6" style="padding-top: 35px;">
                    <div class="footer-title pt-3">
                        <h4 class="text-white">Store infomation</h4>
                    </div>
                    <ul class="footer-address footer-contact">
                        <li>
                            <a href="javascript:void(0)" class="light-text">
                                <div class="inform-box flex-start-box">
                                    <i data-feather="map-pin"></i>
                                    <p>Location</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" class="light-text">
                                <div class="inform-box">
                                    <i data-feather="phone"></i>
                                    <p>Call us:  +852 44020266</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" class="light-text">
                                <div class="inform-box">
                                    <i data-feather="mail"></i>
                                    <p>Email Us: Business@ichi-catcher.com</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="sub-footer sub-footer-lite section-b-space section-t-space">
            <div class="left-footer">
                <p class="light-text">2023 Copyright By Ichi-Catcher <br/> Powered By NGT</p>
            </div>

            <ul class="payment-box">
                <li>
                    <img src="assets/images/icon/paymant/visa.png" class="blur-up lazyload" alt="">
                </li>
                <li>
                    <img src="assets/images/icon/paymant/discover.png" alt="" class="blur-up lazyload">
                </li>
                <li>
                    <img src="assets/images/icon/paymant/american.png" alt="" class="blur-up lazyload">
                </li>
                <li>
                    <img src="assets/images/icon/paymant/master-card.png" alt="" class="blur-up lazyload">
                </li>
                <li>
                    <img src="assets/images/icon/paymant/giro-pay.png" alt="" class="blur-up lazyload">
                </li>
            </ul>
        </div>
    </div>
</footer>
<!-- Footer Section End -->


<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57
                                        <del>57.62</del>
                                        <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<div class="add-cart-box">
    <div class="add-iamge">
        <img src="assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload" alt="">
    </div>

    <div class="add-contain">
        <h6>Added to Cart</h6>
    </div>
</div>
<!-- Add to cart Modal End -->

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

<!-- jquery ui-->
<script src="assets/js/jquery-ui.min.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Price Range Js -->
<script src="assets/js/ion.rangeSlider.min.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity-2.js"></script>

<!-- sidebar open js -->
<script src="assets/js/filter-sidebar.js"></script>

<!-- WOW js -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>


<script>
    $(document).ready(function () {
        $("#search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".search_content .product-box-3").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
</body>
</html>
