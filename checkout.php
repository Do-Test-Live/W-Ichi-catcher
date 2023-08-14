<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();

if (!isset($_SESSION["cart_item"])) {
    echo "<script>
            window.location.href='Cart';
        </script>";
}

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
    <title>Checkout | ICHI CATCHER</title>

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
                                        every signle day on Weekends.<strong class="ms-1">New Coupon Code:IchiCatcher24
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
                        <a href="index.php" class="web-logo nav-logo">
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
                    <h2><?php echo '查看';?></h2>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="index.php">
                                    <i class="fa-solid fa-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo '查看';?></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout section Start -->
<section class="checkout-section-2 section-b-space">
    <div class="container-fluid-lg">
        <form action="payment.php" method="post">
            <div class="row g-sm-4 g-3">
                <div class="col-lg-8">
                    <div class="left-sidebar-checkout">
                        <div class="checkout-detail-box">
                            <ul>
                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                   trigger="loop-on-hover"
                                                   colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                   class="lord-icon">
                                        </lord-icon>
                                    </div>
                                    <div class="checkout-box" style="height: 100%;">
                                        <div class="checkout-title">
                                            <h4><?php echo '郵寄地址';?></h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4">
                                                <div class="col-xxl-12">
                                                    <div class="delivery-address-box">
                                                        <div class="row">
                                                            <div class="form-group col-md-6 mb-3">
                                                                <input type="text" class="form-control" name="f_name"
                                                                       value="" placeholder="<?php echo '名';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-6 mb-3">
                                                                <input type="text" class="form-control" name="l_name"
                                                                       value="" placeholder="<?php echo '姓';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="email"
                                                                       value="" placeholder="<?php echo '電子郵件';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="phone_number"
                                                                       value="" placeholder="<?php echo '電話號碼';?>" maxlength="8"
                                                                       minlength="8" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="address"
                                                                       value="" placeholder="<?php echo '街道地址';?>" required="">
                                                            </div>
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="city" value=""
                                                                       placeholder="<?php echo '城市';?>" required="">
                                                            </div>
                                                                <input type="hidden" class="form-control" name="zip_code"
                                                                       value="" placeholder="<?php echo '郵政編碼';?>"
                                                                       required="">
                                                            <div class="form-group col-md-12 mb-3">
                                                                <input type="text" class="form-control" name="note"
                                                                       value="" placeholder="<?php echo '備註:';?>">
                                                            </div>
                                                                <input class="form-check-input card-class" name="addInfo" type="hidden"
                                                                       value="0" id="flexCheckChecked">

                                                                <?php
                                                                if(isset($_GET['discount'])){
                                                                    ?>
                                                                    <input name="discount" type="hidden" value="<?php echo $_GET['discount']; ?>">
                                                                    <?php
                                                                }
                                                                ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="checkout-icon">
                                        <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                   trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a"
                                                   class="lord-icon">
                                        </lord-icon>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-side-summery-box">
                        <div class="summery-box-2">
                            <div class="summery-header">
                                <h3><?php echo '訂單摘要';?></h3>
                            </div>

                            <ul class="summery-contain">
                                <?php
                                $total_quantity_new = 0;
                                $total_price_new = 0;
                                $total_weight = 0;
                                if (isset($_SESSION["cart_item"])) {
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        $item_price = $item["quantity"] * $item["price"];
                                        ?>
                                        <li>
                                            <img src="admin/<?php echo str_replace("650", "250", strtok($item['image'],',')); ?>"
                                                 class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                            <h4><?php echo $item["name"];?> <span>X <?php echo $item["quantity"]; ?></span></h4>
                                            <h4 class="price"><?php echo "HK$ " . number_format($item_price, 2); ?></h4>
                                        </li>
                                        <?php
                                        $total_quantity_new += $item["quantity"];
                                        $total_price_new += ($item["price"] * $item["quantity"]);
                                    }
                                }
                                ?>
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4><?php echo '小計';?></h4>
                                    <h4 class="price"><?php echo "HKD " . number_format($total_price_new, 2); ?></h4>
                                </li>
                                <li class="list-total">
                                    <h4><?php echo '全部的 (HKD)';?></h4>
                                    <h4 class="price"><?php echo "HKD " . number_format($total_price_new, 2); ?></h4>
                                </li>
                            </ul>
                            <input type="hidden" name="total_value" value="<?php echo $total_price_new; ?>">
                        </div>
                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold" name="placeOrder" type="submit">
                            <?php echo '下訂單';?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout section End -->

<!-- Footer Section Start -->
<footer class="section-t-space footer-section-2 footer-color-3 pt-3">
    <div class="container-fluid-lg">
        <div class="main-footer">
            <div class="row g-md-4 gy-sm-5">
                <div class="col-xxl-4 col-xl-6 col-sm-6" style="padding-top: 35px;">
                    <a href="#" class="foot-logo theme-logo">
                        <img src="assets/images/logo/logo-22.png" style="height: 52px;" class="img-fluid blur-up lazyload" alt="">
                    </a>
                    <p class="information-text information-text-2">Discover the Finest Collection at our Figure and Toys Store.</p>
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
                                <div class="inform-box">
                                    <i data-feather="phone"></i>
                                    <p>Whatsapp/Phone:  +852 44020266</p>
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

<!-- Lordicon Js -->
<script src="assets/js/lusqsztk.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap/popper.min.js"></script>
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>
<script src="assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Delivery Option js -->
<script src="assets/js/delivery-option.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Quantity js -->
<script src="assets/js/quantity.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>
</body>
</html>
