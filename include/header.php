<header class="">
    <div class="header-top">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 d-xxl-block d-none">
                    <div class="top-left-header">
                        <img src="assets/images/country/HK.png"
                             class="img-fluid blur-up lazyload" alt="" style="width: 20px;">
                        <span class="text-white">Hong Kong</span>
                    </div>
                </div>

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1">歡迎來到 Enjoy!</strong>
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
                                    <span>HKD</span>
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
                                        <h5>選單</h5>
                                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.php">產品</a>
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
                                <?php
                                if(isset($_SESSION['id'])){
                                    $customer_id = $_SESSION['id'];
                                    $fetch_customer = $db_handle->runQuery("select * from customer where id = '$customer_id'");
                                    ?>
                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>你好，</h6>
                                                <h5><?php echo $fetch_customer[0]['customer_name'];?></h5>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="profile.php">個人資料</a>
                                                </li>
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="logout.php">登出</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                    <?php
                                } else {
                                    ?>
                                    <li class="right-side onhover-dropdown">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>你好，</h6>
                                                <h5>客人</h5>
                                            </div>
                                        </div>

                                        <div class="onhover-div onhover-div-login">
                                            <ul class="user-box-name">
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <a href="login.php">登入</a>
                                                </li>

                                                <li class="product-box-contain">
                                                    <a href="sign-up.php">註冊</a>
                                                </li>
                                            </ul>
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

    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">

                        <div class="category-dropdown">
                            <div class="category-title">
                                <h5>類別</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">
                                <div class="onhover-category-box">
                                    <?php
                                    $fetch_cat = $db_handle->runQuery("select * from category where status = '1'");
                                    $no_fetch_cat = $db_handle->numRows("select * from category where status = '1'");
                                    for($i=0; $i<$no_fetch_cat; $i++){
                                        $cat_id = $fetch_cat[$i]['id'];
                                        ?>
                                        <div class="list-1 mt-3">
                                            <div class="category-title-box">
                                                <h5><?php echo $fetch_cat[$i]['c_name'];?></h5>
                                            </div>
                                            <?php
                                            $fetch_sub_cat = $db_handle->runQuery("select * from sub_cat where cat_id = '$cat_id'");
                                            $no_fetch_sub_cat = $db_handle->numRows("select * from sub_cat where cat_id = '$cat_id'");
                                            for($j=0; $j<$no_fetch_sub_cat; $j++){
                                                ?>
                                                <ul>
                                                    <li>
                                                        <a href="index.php?subcat=<?php echo $fetch_sub_cat[$j]['id'];?>"><?php echo $fetch_sub_cat[$j]['sub_cat_name']?></a>
                                                    </li>
                                                </ul>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart" style="background:#000000;padding-top:17px;padding-bottom: 17px">
    <ul>
        <li class="">
            <a href="index.php">
                <i class="fa-solid fa-house text-white" style="font-size: 18px"></i>
            </a>
        </li>

        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="fa-solid fa-border-all text-white" style="font-size: 18px"></i>
            </a>
        </li>
        <li>
            <a href="#" class="search-box" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-magnifying-glass text-white" style="font-size: 18px"></i>
            </a>
        </li>
        <li>
            <a href="cart.php">
                <i class="fa-solid fa-cart-shopping text-white" style="font-size: 18px"></i>
            </a>
        </li>
    </ul>
</div>
<!-- mobile fix menu end -->