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
    <title>Enjoy</title>

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

<!-- Loader Start -->
<!--<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>-->
<!-- Header Start -->
<?php include ('include/header.php');?>
<!-- Header End -->


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
                                $cat_id = $fetch_cat[$i]['id'];
                                $fetch_sub_cat = $db_handle->runQuery("select * from sub_cat where cat_id = '$cat_id'");
                                $no_fetch_sub_cat = $db_handle->numRows("select * from sub_cat where cat_id = '$cat_id'");
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?php echo $fetch_cat[$i]['id']; ?>">
                                        <?php
                                        if($no_fetch_sub_cat > 0){
                                            ?>
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse<?php echo $fetch_cat[$i]['id']; ?>"
                                                    aria-expanded="true"
                                                    aria-controls="collapse<?php echo $fetch_cat[$i]['id']; ?>"></button>
                                            <?php
                                        }
                                        ?>
                                            <a href="shop.php?catId=<?php echo $fetch_cat[$i]['id']; ?>" style="font-size: 20px;color: #222;text-decoration: none;"><?php echo $fetch_cat[$i]['c_name']; ?></a>
                                    </h2>
                                    <div id="collapse<?php echo $fetch_cat[$i]['id']; ?>"
                                         class="accordion-collapse collapse show"
                                         aria-labelledby="heading<?php echo $fetch_cat[$i]['id']; ?>">
                                        <div class="accordion-body">
                                            <?php
                                            for ($j = 0; $j < $no_fetch_sub_cat; $j++) {
                                                ?>
                                                <ul class="category-list custom-padding custom-height">
                                                    <li><a href="shop.php?subcat=<?php echo $fetch_sub_cat[$j]['id'];?>"><?php echo $fetch_sub_cat[$j]['sub_cat_name'];?></a></li>
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
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="查看">
                                                    <a href="product_details.php?product_id=<?php echo $fetch_products[$i]['id']; ?>">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="願望清單">
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
                                <a class="page-link" href="shop.php?catId=<?php echo $id; ?>&page=1" tabindex="-1"
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
                                       href="shop.php?catId=<?php echo $id; ?>&page=<?php echo $n_page; ?>"
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
                                       href="shop.php?catId=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                                       href="shop.php?catId=<?php echo $id; ?>&page=<?php echo $n_page; ?>">
                                        Next
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link"
                                   href="shop.php?catId=<?php echo $id; ?>&page=<?php echo $i - 1; ?>">
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
                                <a class="page-link" href="shop.php?catId=<?php echo $id; ?>&page=1" tabindex="-1"
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
                                       href="shop.php?subcat=<?php echo $id; ?>&page=<?php echo $n_page; ?>"
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
                                       href="shop.php?subcat=<?php echo $id; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                                       href="shop.php?subcat=<?php echo $id; ?>&page=<?php echo $n_page; ?>">
                                        Next
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link"
                                   href="shop.php?subcat=<?php echo $id; ?>&page=<?php echo $i - 1; ?>">
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
                                <a class="page-link" href="shop.php?catId=1&page=1" tabindex="-1" aria-disabled="true">
                                    <i class="fa-solid fa-angles-left"></i>
                                </a>
                            </li>
                            <?php
                            if (isset($_GET['page']) && $_GET['page'] > 1) {
                                $c_page = $_GET['page'];
                                $n_page = $c_page - 1;
                                ?>
                                <li class="page-item">
                                    <a class="page-link" href="shop.php?page=<?php echo $n_page; ?>" tabindex="-1"
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
                                    <a class="page-link" href="shop.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
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
                                    <a class="page-link" href="shop.php?page=<?php echo $n_page; ?>">
                                        Next
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                            <li class="page-item">
                                <a class="page-link" href="shop.php?page=<?php echo $i - 1; ?>">
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
<?php include ('include/footer.php');?>
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
<div class="bg-overlay">

</div>
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

<!-- thme setting js -->
<script src="assets/js/theme-setting.js"></script>

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
