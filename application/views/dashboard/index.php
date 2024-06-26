<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikit">
    <meta name="keywords" content="multikit">
    <title>Multikit - Multi-purpose Html Template</title>
    <link rel="icon" href="<?= base_url() ?>assets/svg/yusen.svg" type="image/x-icon">
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="multikit">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Google font css link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">

    <!-- Loader Normalize css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/normalize.min.css">

    <!-- Bootstrap css -->
    <!-- <link id="rtl-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css"> -->
    <link id="" rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">

    <!-- Swiper css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/swiper/swiper-bundle.min.css">

    <!-- Remix Icon css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/remixicon.css">

    <!-- Style css -->
    <!-- <link id="change-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
</head>

<body class="grocery-color public-san-body">
    <!-- Loader Box Start -->
    <div class="min-loader-wrapper">
        <img src="<?= base_url() ?>assets/svg/yusen.svg" class="img-fluid loader" alt="">
        <div class="loader-section grocery-color section-left"></div>
        <div class="loader-section grocery-color section-right"></div>
    </div>
    <!-- Loader Box End -->

    <!-- header Start -->
    <header class="header-style-6">
        <div class="left-header">
            <button type="button" class="btn menu-btn" data-bs-toggle="offcanvas" data-bs-target="#sideMenu">
                <i class="ri-menu-2-line"></i>
            </button>
            <a href="index.html">
                <img src="<?= base_url() ?>assets/svg/yusen.svg" class="img-fluid" alt="" style="width:85px !important;">
            </a>
        </div>

        <div class="right-header">
            <a href="address.html" class="btn location-btn">
                <i class="ri-map-pin-2-line"></i> <span id="spanDistrict"></span>, <span id="spanCountry"></span></a>
            <a href="account.html" class="profile-image">
                <img src="<?= base_url() ?>assets/images/grocery/dp.jpg" class="img-fluid" alt="">
            </a>
        </div>
    </header>
    <!-- header End -->

    <!-- Mobile Section Start -->
    <div class="mobile-style-6">
        <ul>
            <li class="active">
                <a href="index.html" class="mobile-box">
                    <i class="ri-home-line"></i>
                    <h6>Home</h6>
                </a>
            </li>

            <li>
                <a href="category.html" class="mobile-box">
                    <i class="ri-file-copy-line"></i>
                    <h6>Category</h6>
                </a>
            </li>

            <li>
                <a href="search.html" class="mobile-box">
                    <i class="ri-search-line"></i>
                    <h6>Search</h6>
                </a>
            </li>

            <li>
                <a href="cart.html" class="mobile-box">
                    <i class="ri-shopping-cart-line"></i>
                    <h6>Cart</h6>
                </a>
            </li>

            <li>
                <a href="account.html" class="mobile-box">
                    <i class="ri-user-3-line"></i>
                    <h6>Profile</h6>
                </a>
            </li>
        </ul>
    </div>
    <!-- Mobile Section End -->

    <!-- Search Section Start -->
    <section>
        <div class="custom-container">
            <form class="form-style-7">
                <div class="form-box search-box mb-19">
                    <input type="search" class="form-control" placeholder="Search here..">
                    <i class="ri-search-line"></i>
                    <i class="ri-mic-line mic-icon"></i>
                </div>
            </form>
        </div>
    </section>
    <!-- Search Section End -->

    <!-- Category Section Start -->
    <section>
        <div class="title mb-10 px-15">
            <h4>Category</h4>
        </div>

        <div class="swiper px-15 grocery-category-slider grocery-category-box">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="shop.html">
                        <img src="<?= base_url() ?>assets/images/grocery/product/1.png" class="img-fluid" alt="">
                        <span>Fruits</span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop.html">
                        <img src="<?= base_url() ?>assets/images/grocery/product/2.png" class="img-fluid" alt="">
                        <span>Vegetables</span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop.html">
                        <img src="<?= base_url() ?>assets/images/grocery/product/3.png" class="img-fluid" alt="">
                        <span>Fishes</span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="shop.html">
                        <img src="<?= base_url() ?>assets/images/grocery/product/1.png" class="img-fluid" alt="">
                        <span>Breads</span>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="category.html">
                        <span>View All</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->

    <!-- Banner Section Start -->
    <section class="section-t-space-4 grocery-banner-section">
        <div class="swiper banner-slider px-15">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-box">
                        <img src="<?= base_url() ?>assets/images/grocery/banner/1.jpg" class="img-fluid" alt="">
                        <div class="banner-content p-center-left">
                            <div>
                                <h4>Farm Fresh Veggies</h4>
                                <h5>Get instant delivery</h5>
                                <a href="shop.html" class="btn grocery-btn theme-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-box">
                        <img src="<?= base_url() ?>assets/images/grocery/banner/2.jpg" class="img-fluid" alt="">
                        <div class="banner-content p-center-left">
                            <div>
                                <h4>Stock Up Now</h4>
                                <h5>Get instant delivery</h5>
                                <a href="shop.html" class="btn grocery-btn theme-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Lowest Price Section Start -->
    <section class="section-t-space-4">
        <div class="title title-2 px-15">
            <h4>Lowest Price</h4>
            <a href="shop.html" class="theme-color">See all</a>
        </div>

        <div class="swiper slider-2-3 product-slider px-15">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/10.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/11.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/1.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/4.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lowest Price Section End -->

    <!-- Everyday Essentials Section Start -->
    <section class="section-t-space-4">
        <div class="title title-2 px-15">
            <h4>Everyday Essentials</h4>
            <a href="shop.html" class="theme-color">See all</a>
        </div>

        <div class="swiper slider-2-3 product-slider px-15">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/10.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/3.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/4.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/5.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html" class="name">
                                    <h5>Grapes - Bangalore Blue with Seed</h5>
                                </a>
                                <h6>500g</h6>
                                <div class="price-box">
                                    <h5>$25.00</h5>
                                    <div class="add-quantity add-cart btn">
                                        <span class="add-btn">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span class="remove-minus count-decrease">-</span>
                                        <input class="countdown-remove" type="number" value="0">
                                        <span class="count-increase">+</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Everyday Essentials Section End -->

    <!-- Banner Section Start -->
    <section class="section-t-space-4 grocery-banner-section">
        <div class="custom-container">
            <div class="banner-box">
                <img src="<?= base_url() ?>assets/images/grocery/banner/3.jpg" class="img-fluid" alt="">
                <div class="banner-content p-center justify-content-between w-100">
                    <div>
                        <h4 class="text-white">Bigger</h4>
                        <h4 class="text-white mb-0">Discounts</h4>
                    </div>
                    <div>
                        <a href="shop.html" class="btn grocery-btn white-btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Offer Section Start -->
    <section class="section-t-space-4">
        <div class="custom-container">
            <div class="title d-flex align-items-center justify-content-between">
                <h4>Say hello to Offers!</h4>
                <a href="shop.html" class="theme-color h5">See all</a>
            </div>

            <ul class="product-offer-list">
                <li>
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/15.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html">
                                    <h5 class="name">Assorted Capsicum Combo</h5>
                                </a>
                                <h5 class="category">Fruit</h5>
                                <h5 class="price">$25.00 <span>/kg</span></h5>
                            </div>
                            <div>
                                <div class="add-quantity btn">
                                    <span class="add-btn">
                                        <i class="ri-add-line"></i>
                                    </span>
                                    <span class="remove-minus count-decrease">-</span>
                                    <input class="countdown-remove" type="number" value="0">
                                    <span class="count-increase">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/12.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html">
                                    <h5 class="name">Assorted Capsicum Combo</h5>
                                </a>
                                <h5 class="category">Fruit</h5>
                                <h5 class="price">$25.00 <span>/kg</span></h5>
                            </div>
                            <div>
                                <div class="add-quantity btn">
                                    <span class="add-btn">
                                        <i class="ri-add-line"></i>
                                    </span>
                                    <span class="remove-minus count-decrease">-</span>
                                    <input class="countdown-remove" type="number" value="0">
                                    <span class="count-increase">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="product-box">
                        <a href="product.html" class="product-image">
                            <img src="<?= base_url() ?>assets/images/grocery/product/13.png" class="img-fluid" alt="">
                        </a>
                        <div class="product-content">
                            <div>
                                <a href="product.html">
                                    <h5 class="name">Assorted Capsicum Combo</h5>
                                </a>
                                <h5 class="category">Fruit</h5>
                                <h5 class="price">$25.00 <span>/kg</span></h5>
                            </div>
                            <div>
                                <div class="add-quantity btn">
                                    <span class="add-btn">
                                        <i class="ri-add-line"></i>
                                    </span>
                                    <span class="remove-minus count-decrease">-</span>
                                    <input class="countdown-remove" type="number" value="0">
                                    <span class="count-increase">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Offer Section End -->

    <!-- space box start -->
    <div class="grocery-bottom-spacing"></div>
    <!-- space box end -->

    <!-- Side Menu Offcanvas Start -->
    <div class="offcanvas offcanvas-start grocery-sidemenu" tabindex="-1" id="sideMenu">
        <div class="offcanvas-body">
            <div class="profile-box">
                <a href="profile.html" class="profile-img">
                    <img src="<?= base_url() ?>assets/images/grocery/dp.jpg" class="img-fluid" alt="">
                </a>
                <div class="profile-content">
                    <h4>Paige Turner</h4>
                    <h5>paigeturner@gmail.com</h5>
                </div>
            </div>

            <ul class="menu-list">
                <li>
                    <a href="order.html"><i class="ri-file-list-2-line"></i> Orders</a>
                </li>
                <li>
                    <a href="wishlist.html"><i class="ri-heart-line"></i> Your Wishlist</a>
                </li>
                <li>
                    <a href="payment.html"><i class="ri-bank-card-line"></i> Payment</a>
                </li>
                <li>
                    <a href="save-address.html"><i class="ri-map-pin-5-line"></i> Saved Address</a>
                </li>
                <li>
                    <a href="language.html"><i class="ri-file-list-2-line"></i> Language</a>
                </li>
                <li>
                    <a href="notification.html"><i class="ri-notification-4-line"></i> Notification</a>
                </li>
                <li>
                    <a href="setting.html"><i class="ri-settings-3-line"></i> Settings</a>
                </li>
            </ul>

            <a href="<?=base_url('auth/index')?>" class="sidebar-btn grocery-btn white-btn">Logout</a>
        </div>
    </div>
    <!-- Side Menu Offcanvas End -->

    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>assets/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- swiper js -->
    <script src="<?= base_url() ?>assets/js/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom_swiper.js"></script>

    <!-- quantity js -->
    <script src="<?= base_url() ?>assets/js/quantity.js"></script>

    <!-- Loader js -->
    <script src="<?= base_url() ?>assets/js/loader.js"></script>

    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>

    <!-- Jquery -->
    <script src="<?= base_url() ?>assets/js/jquery-3.7.0.js"></script>

    <!-- Custome js-->
    <script src="<?= base_url() ?>assets/js/custom_template.js"></script>
</body>

</html>