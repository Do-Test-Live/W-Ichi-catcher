<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();

$product_id = $_GET['product_id'];

include ('cart_backend.php');

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
    <title>Product Details | ICHI CATCHER</title>
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
                                        every signle day on Weekends.<strong class="ms-1">New Coupon Code: IchiCatcher24
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
                                <!--   <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="select-language">
                                       <li>
                                           <a class="dropdown-item" href="javascript:void(0)" id="english">
                                               <img src="assets/images/country/united-kingdom.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                               <span>English</span>
                                           </a>
                                       </li>
                                       <li>
                                           <a class="dropdown-item" href="javascript:void(0)" id="france">
                                               <img src="assets/images/country/germany.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                               <span>Germany</span>
                                           </a>
                                       </li>
                                       <li>
                                           <a class="dropdown-item" href="javascript:void(0)" id="chinese">
                                               <img src="assets/images/country/turkish.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                               <span>Turki</span>
                                           </a>
                                       </li>
                                   </ul>-->
                            </div>
                        </li>
                        <li class="right-nav-list">
                            <div class="dropdown theme-form-select">
                                <button class="btn dropdown-toggle" type="button" id="select-dollar"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>USD</span>
                                </button>
                                <!-- <ul class="dropdown-menu dropdown-menu-end sm-dropdown-menu"
                                     aria-labelledby="select-dollar">
                                     <li>
                                         <a class="dropdown-item" id="aud" href="javascript:void(0)">AUD</a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" id="eur" href="javascript:void(0)">EUR</a>
                                     </li>
                                     <li>
                                         <a class="dropdown-item" id="cny" href="javascript:void(0)">CNY</a>
                                     </li>
                                 </ul>-->
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
                                <!--  <li class="right-side">
                                      <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                          <i data-feather="bookmark"></i>
                                      </a>
                                  </li>-->
                                <!--  <li class="right-side">
                                      <div class="onhover-dropdown header-badge">
                                          <button type="button" class="btn p-0 position-relative header-wishlist">
                                              <i data-feather="shopping-cart"></i>
                                              <span class="position-absolute top-0 start-100 translate-middle badge">2
                                                      <span class="visually-hidden">unread messages</span>
                                                  </span>
                                          </button>

                                          <div class="onhover-div">
                                              <ul class="cart-list">
                                                  <li class="product-box-contain">
                                                      <div class="drop-cart">
                                                          <a href="product-left-thumbnail.html" class="drop-image">
                                                              <img src="assets/images/vegetable/product/1.png"
                                                                   class="blur-up lazyload" alt="">
                                                          </a>

                                                          <div class="drop-contain">
                                                              <a href="product-left-thumbnail.html">
                                                                  <h5>Fantasy Crunchy Choco Chip Cookies</h5>
                                                              </a>
                                                              <h6><span>1 x</span> $80.58</h6>
                                                              <button class="close-button close_button">
                                                                  <i class="fa-solid fa-xmark"></i>
                                                              </button>
                                                          </div>
                                                      </div>
                                                  </li>

                                                  <li class="product-box-contain">
                                                      <div class="drop-cart">
                                                          <a href="product-left-thumbnail.html" class="drop-image">
                                                              <img src="assets/images/vegetable/product/2.png"
                                                                   class="blur-up lazyload" alt="">
                                                          </a>

                                                          <div class="drop-contain">
                                                              <a href="product-left-thumbnail.html">
                                                                  <h5>Peanut Butter Bite Premium Butter Cookies 600 g
                                                                  </h5>
                                                              </a>
                                                              <h6><span>1 x</span> $25.68</h6>
                                                              <button class="close-button close_button">
                                                                  <i class="fa-solid fa-xmark"></i>
                                                              </button>
                                                          </div>
                                                      </div>
                                                  </li>
                                              </ul>

                                              <div class="price-box">
                                                  <h5>Total :</h5>
                                                  <h4 class="theme-color fw-bold">$106.58</h4>
                                              </div>

                                              <div class="button-group">
                                                  <a href="cart.html" class="btn btn-sm cart-button">View Cart</a>
                                                  <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color
                                                      text-white">Checkout</a>
                                              </div>
                                          </div>
                                      </div>
                                  </li>-->
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
<!-- Header End -->

<!-- Breadcrumb Section Start -->
<section class="breadscrumb-section pt-0">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="breadscrumb-contain">
                    <?php
                    $product = $db_handle->runQuery("select * from product where id = '$product_id'");
                    ?>
                    <h2><?php echo $product[0]['p_name']; ?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active"><?php echo $product[0]['p_name'];?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Left Sidebar Start -->
<section class="product-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-9 col-xl-8 col-lg-7 wow fadeInUp">
                <div class="row g-4">
                    <div class="col-xl-6 wow fadeInUp">
                        <div class="product-left-box">
                            <div class="row">
                                <div class="col-xl-12 wow fadeInUp">
                                    <div class="product-left-box">
                                        <div class="row">
                                            <div class="col-xxl-10 col-lg-12 col-md-10 order-xxl-2 order-lg-1 order-md-2">
                                                <div class="product-main-2 no-arrow">
                                                    <?php
                                                    $image = explode(',', $product[0]['p_image']);
                                                    foreach ($image as $img) {
                                                        ?>
                                                        <div>
                                                            <div class="slider-image">
                                                                <img src="admin/<?php echo $img; ?>" id="img-1"
                                                                     class="img-fluid image_zoom_cls-0 blur-up lazyload"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-xxl-2 col-lg-12 col-md-2 order-xxl-1 order-lg-2 order-md-1">
                                                <div class="left-slider-image-2 left-slider no-arrow slick-top">
                                                    <?php
                                                    foreach ($image as $img) {
                                                        ?>
                                                        <div>
                                                            <div class="sidebar-image">
                                                                <img src="admin/<?php echo $img; ?>"
                                                                     class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="right-box-contain">
                            <h2 class="name"><?php echo $product[0]['p_name'];?></h2>

                            <div class="price-rating">
                                <div class="product-rating custom-rate">
                                    <?php
                                    $quantity = 0;
                                    $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                    $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");

                                    if (isset($fetch_quantity)) {
                                        $quantity = $fetch_quantity[0]['quantity'];
                                    }

                                    if ($fetch_quantity_no > 0 && $quantity > 0) {
                                        ?>
                                        <h6 class="theme-color"><?php echo '尚有存貨';?></h6>
                                        <?php
                                    } else {
                                        ?>
                                        <h6 class="theme-color"><?php echo '預購'; ?></h6>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <h2 class="theme-color">HK$ <?php  echo $product[0]['product_price'];?></h2>
                            </div>

                            <div class="procuct-contain">
                                <p><?php echo $product[0]['description'];?>
                                </p>
                            </div>
                            <form method="post"
                                  action="product_details.php?action=add&product_id=<?php echo $_GET['product_id']; ?>">
                                <div class="cart_qty qty-box product-qty">
                                    <div class="input-group">
                                        <button type="button" class="qty-left-minus" data-type="minus"
                                                data-field="">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                        <input class="form-control input-number qty-input" type="text"
                                               name="quantity" min="1" value="1">
                                        <button type="button" class="qty-right-plus" data-type="plus" data-field="">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $product[0]['product_price'];?>" name="price">
                                <button class="btn btn-md bg-dark cart-button text-white w-100 mt-3"
                                        type="submit"><?php echo '加入購物車';?>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-lg-5 d-none d-lg-block wow fadeInUp">
                <div class="right-sidebar-box">

                    <!-- Trending Product -->
                    <div class="pt-25">
                        <div class="category-menu">
                            <h3><?php echo '熱門產品';?></h3>

                            <ul class="product-list product-right-sidebar border-0 p-0">
                                <?php
                                $tranding_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                                $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");

                                for ($i = 0; $i < $row; $i++) {
                                    ?>
                                    <li>
                                        <div class="offer-product">
                                            <a href="product_details.php?product_id=<?php echo $tranding_product[$i]['id']; ?>"
                                               class="offer-image">
                                                <img src="admin/<?php echo str_replace("650", "250", strtok($tranding_product [$i]['p_image'], ',')); ?>"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="offer-detail">
                                                <div>
                                                    <a href="product_details.php?product_id=<?php echo $tranding_product[$i]['id']; ?>">
                                                        <h6 class="name"><?php echo $tranding_product[$i]['p_name']; ?></h6>
                                                    </a>
                                                    <h6 class="price theme-color">
                                                        HK$<?php echo $tranding_product [$i]['product_price']; ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Left Sidebar End -->

<!-- Releted Product Section Start -->
<section class="product-list-section section-b-space">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>
                <?php echo '相關產品';?>
            </h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-6_1 product-wrapper">
                    <?php
                    $cat_id = $product[0]['category_id'];
                    $related_products = $db_handle->runQuery("select * from product WHERE status= '1' and category_id = '$cat_id' order by rand() limit 20");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' and category_id = '$cat_id' order by rand() limit 20");
                    for ($i = 0; $i < $row; $i++) {
                        $product_id = $related_products[$i]['id'];
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="product_details.php?product_id=<?php echo $related_products [$i]['id']; ?>">
                                        <img src="admin/<?php echo str_replace("650", "250", strtok($related_products [$i]['p_image'], ',')); ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="product_details.php?product_id=<?php echo $related_products [$i]['id']; ?>">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="#" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product_details.php?product_id=<?php echo $related_products [$i]['id']; ?>">
                                        <h6 class="name">
                                            <?php echo $related_products [$i]['p_name']; ?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">HK$<?php echo $related_products [$i]['product_price']; ?></span>
                                    </h5>

                                    <div class="product-rating mt-2">
                                        <!--<ul class="rating">
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
                                        </ul>-->

                                        <?php
                                        $fetch_quantity_no = $db_handle->numRows("select quantity from stock where product_id = '$product_id'");
                                        $fetch_quantity = $db_handle->runQuery("select quantity from stock where product_id = '$product_id'");
                                        $quantity = $fetch_quantity[0]['quantity'];
                                        if ($fetch_quantity_no > 0 && $quantity > 0) {
                                            ?>
                                            <h6 class="theme-color"><?php echo '尚有存貨';?></h6>
                                            <?php
                                        } else {
                                            ?>
                                            <h6 class="theme-color"><?php echo '預購';?></h6>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="#">
                                            <button class="btn btn-add-cart addcart-button"><?php echo '查看詳情'; ?>
                                            </button>
                                        </a>
                                    </div>
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
</section>
<!-- Releted Product Section End -->

<!-- Footer Section Start -->
<footer class="section-t-space footer-section-2 footer-color-3 pt-3">
    <div class="container-fluid-lg">
        <div class="main-footer">
            <div class="row g-md-4 gy-sm-5">
                <div class="col-xxl-4 col-xl-6 col-sm-6" style="padding-top: 35px;">
                    <a href="#" class="foot-logo theme-logo">
                        <img src="assets/images/logo/logo-22.png" style="height: 52px;" class="img-fluid blur-up lazyload" alt="">
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

<!-- Tap to top start -->
<div class="theme-option theme-option-2">

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

<!-- sidebar open js -->
<script src="assets/js/filter-sidebar.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- Auto Height Js -->
<script src="assets/js/auto-height.js"></script>

<!-- Timer Js -->
<script src="assets/js/timer1.js"></script>

<!-- Fly Cart Js -->
<script src="assets/js/fly-cart.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity-2.js"></script>

<!-- WOW js -->
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/custom-wow.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<script>
    function changePrice(value, weight) {
        document.getElementById('price').innerHTML = value + '.00';
        document.getElementById('updateprice').value = value + '.00';
        document.getElementById('updateweight').value = weight;
    }
</script>

</body>

</html>
