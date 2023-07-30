<?php
session_start();
if (isset($_SESSION['id'])) {
    $customer_id = $_SESSION['id'];
}
include('admin/include/dbController.php');
$db_handle = new DBController();
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
    <title>RCR Pets Workshop </title>
    <?php include('include/css.php'); ?>
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

<body class="theme-color-1">

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
include('include/header.php');
?>
<!-- Header End -->
<!-- Home Section Start -->
<section class="home-section-2 home-section-bg pt-0 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="slider-animate">
                    <div>
                        <div class="home-contain rounded-0 p-0">
                            <img src="assets/images/banner/67311_Websitebannermiddle.jpg"
                                 class="img-fluid bg-img blur-up lazyload" alt="">
                            <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                <div class="container-fluid-lg">
                                    <div>
                                        <?php
                                        $banner_1 = $db_handle->runQuery("select * from banner where id = '2'");
                                        ?>
                                        <h6 class="ls-expanded theme-color text-uppercase"><?php echo $banner_1[0]['heading_one'];?>
                                        </h6>
                                        <h1 class="heding-2"><?php echo $banner_1[0]['heading_two'];?></h1>
                                        <h2 class="content-2"><?php echo $banner_1[0]['heading_three'];?></h2>
                                        <h5 class="text-content"><?php echo $banner_1[0]['details'];?>
                                        </h5>
                                        <button
                                                class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                                onclick="location.href = '<?php echo $banner_1[0]['link_one'];?>';">Shop Now <i
                                                    class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->


<!-- Product Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row g-3">
            <div class="col-xxl-9 col-xl-8">
                <div class="title section-t-space">
                    <h2>
                        <?php
                            echo '你的日常必需品';
                        ?>
                    </h2>
                </div>

                <div class="product-box-slider-2 no-arrow">
                    <?php
                    $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 20");
                    $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 20");
                    for ($i = 0; $i < $row; $i = $i + 2) {
                        $product_id = $fetch_product[$i]['id'];
                        ?>
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp">
                                <div class="product-image">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="Wish-List?id=<?php echo $fetch_product [$i]['id']; ?>" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                        <h6 class="name">
                                            <?php echo $fetch_product [$i]['p_name'];?>
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content">
                                        <span class="theme-color price">
                                        HK$<?php echo substr($fetch_product [$i]['product_price'], 0, strpos($fetch_product [$i]['product_price'], ',')) ?>/
                                        <?php echo substr($fetch_product [$i]['product_weight'], 0, strpos($fetch_product [$i]['product_weight'], ',')) ?>g
                                        </span>
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
                                            <h6 class="theme-color"><?php echo '尚有存貨'; ?></h6>
                                            <?php
                                        } else {
                                            ?>
                                            <h6 class="theme-color"><?php echo '預購'; ?></h6>
                                            <?php
                                        }
                                        ?>
                                    </div>

                                    <div class="add-to-cart-box bg-white">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <button class="btn btn-add-cart addcart-button"><?php echo '查看詳情'; ?>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if ($i + 1 < $row) {
                                $product_id = $fetch_product[$i + 1]['id'];
                                ?>
                                <div class="product-box product-box-bg wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-image">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <img src="admin/<?php
                                            echo str_replace("650", "250", strtok($fetch_product [$i + 1]['p_image'], ','));
                                            ?>"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </a>
                                        <ul class="product-option">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                                    <i data-feather="eye"></i>
                                                </a>
                                            </li>

                                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                <a href="Wish-List?id=<?php echo $fetch_product [$i + 1]['id']; ?>" class="notifi-wishlist">
                                                    <i data-feather="heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="product-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                            <h6 class="name">
                                                <?php echo $fetch_product [$i + 1]['p_name']; ?>
                                            </h6>
                                        </a>

                                        <h5 class="sold text-content">
                                            <span class="theme-color price">
                                                HK$<?php echo substr($fetch_product [$i+1]['product_price'], 0, strpos($fetch_product [$i+1]['product_price'], ',')) ?>/
                                                <?php echo substr($fetch_product [$i+1]['product_weight'], 0, strpos($fetch_product [$i+1]['product_weight'], ',')) ?>g
                                            </span>
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
                                                <h6 class="theme-color"><?php echo '尚有存貨'; ?></h6>
                                                <?php
                                            } else {
                                                ?>
                                                <h6 class="theme-color"><?php echo '預購'; ?></h6>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="add-to-cart-box bg-white">
                                            <a href="Product-Details?product_id=<?php echo $fetch_product [$i + 1]['id']; ?>" target="_blank">
                                                <button class="btn btn-add-cart"><?php if ($_SESSION['language'] === 'CN') echo '查看詳情'; else echo 'Add'; ?>
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                <div class="position-sticky top-0">
                    <div class="ratio_209 rounded wow fadeIn">
                        <div class="banner-contain-2 rounded hover-effect">
                            <?php
                            $first_add = $db_handle->runQuery("select * from banner where id = '5'");
                            ?>
                            <img src="<?php echo $first_add[0]['banner_img']; ?>" class="bg-img blur-up lazyload"
                                 alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Start -->
<section>
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="home-contain hover-effect">
                    <?php
                    $banner_middle = $db_handle->runQuery("select * from banner where id = '7'");
                    ?>
                    <img src="<?php echo $banner_middle[0]['banner_img']; ?>" class="bg-img blur-up lazyload" alt="">
                    <div class="home-detail p-center position-relative text-center">
                        <div>
                            <h2 class="home-name text-uppercase"> <?php if ($_SESSION['language'] === 'CN') echo $banner_middle[0]['heading_three_cn']; else echo $banner_middle[0]['heading_three']; ?></h2>
                            <h3 class="text-pacifico fw-normal text-content text-center">
                                <?php echo $banner_middle[0]['details_cn']; ?>
                            </h3>
                            <p class="banner_text">付款方法可用轉數快、Payme 或八達通<p>
                               <p class="banner_text">收到轉賬後2-10天內發貨，<p>
                               <p class="banner_text">請於付款後將入數資料whatsapp到52441954，<p>
                                <p class="banner_text">買滿$600可享順豐智能櫃包郵，
                                未滿$600則順豐到付</p>
                            <ul class="social-icon">
                                <li>
                                    <a href="https://www.instagram.com/royal_cheese.ragdoll/?igshid=NTc4MTIwNjQ2YQ%3D%3D">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://www.facebook.com/">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="http://wa.me/">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Top Selling Section Start -->
<section class="top-selling-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
                                        echo '最暢銷';
                                    ?>
                                </h3>
                            </div>
                            <?php
                            $fetch_product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank"
                                       class="top-selling-image">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product [$i]['id']; ?>" target="_blank">
                                            <h5><?php echo $fetch_product [$i]['p_name'];?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                            <span>(34)</span>
                                        </div>-->
                                        <h6>
                                            HK$<?php echo substr($fetch_product [$i]['product_price'], 0, strpos($fetch_product [$i]['product_price'], ',')) ?>/
                                            <?php echo substr($fetch_product [$i]['product_weight'], 0, strpos($fetch_product [$i]['product_weight'], ',')) ?>g
                                        </h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
                                        echo '熱門產品';
                                    ?>
                                </h3>
                            </div>
                            <?php
                            $product = $db_handle->runQuery("select * from product WHERE status= '1' order by rand() limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by rand() limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="Product-Details?product_id=<?php echo $product [$i]['id']; ?>" target="_blank"
                                       class="top-selling-image">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($product [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-Details?product_id=<?php echo $product [$i]['id']; ?>">
                                            <h5><?php echo $product [$i]['p_name']; ?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                            <span>(34)</span>
                                        </div>-->
                                        <h6>
                                            HK$<?php echo substr($fetch_product [$i]['product_price'], 0, strpos($fetch_product [$i]['product_price'], ',')) ?>/
                                            <?php echo substr($fetch_product [$i]['product_weight'], 0, strpos($fetch_product [$i]['product_weight'], ',')) ?>g

                                        </h6>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="top-selling-box">
                            <div class="top-selling-title">
                                <h3>
                                    <?php
                                        echo '最新產品';
                                    ?>
                                </h3>
                            </div>

                            <?php
                            $fetch_product3 = $db_handle->runQuery("select * from product WHERE status= '1' order by id desc limit 3");
                            $row = $db_handle->numRows("select * from product WHERE status= '1' order by id desc limit 3");
                            for ($i = 0; $i < $row; $i++) {
                                ?>
                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="Product-Details?product_id=<?php echo $fetch_product3 [$i]['id']; ?>" target="_blank"
                                       class="top-selling-image">
                                        <img src="admin/<?php
                                        echo str_replace("650", "250", strtok($fetch_product3 [$i]['p_image'], ','));
                                        ?>"
                                             class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="Product-Details?product_id=<?php echo $fetch_product3 [$i]['id']; ?>">
                                            <h5><?php echo $fetch_product3 [$i]['p_name'];?></h5>
                                        </a>
                                        <!--<div class="product-rating">
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
                                            <span>(34)</span>
                                        </div>-->
                                        <h6>
                                            HK$<?php echo substr($fetch_product [$i]['product_price'], 0, strpos($fetch_product [$i]['product_price'], ',')) ?>/
                                            <?php echo substr($fetch_product [$i]['product_weight'], 0, strpos($fetch_product [$i]['product_weight'], ',')) ?>g
                                        </h6>
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
    <?php
    /*                            }
                                */ ?>
</section>
<!-- Top Selling Section End -->

<!-- Newsletter Section Start -->
<?php
include('include/newsletter.php');
?>
<!-- Newsletter Section End -->

<!-- Footer Section Start -->
<?php
include('include/footer.php');
?>
<!-- Footer Section End -->

<!-- Deal Box Modal Start -->
<?php include('include/deal.php'); ?>
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

</body>
</html>
