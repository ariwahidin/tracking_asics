<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PYID Tracking Order">
    <meta name="keywords" content="PYID Tracking Order">
    <title>Tracking Order</title>
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="multikit">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url() ?>assets/svg/yusen.svg" type="image/x-icon">

    <!-- Google font css link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">

    <!-- Bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/vendors/bootstrap.css">

    <!-- Loader Normalize css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/normalize.min.css">

    <!-- Remix Icon css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/remixicon.css">

    <!-- Style css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/style.css">
    <style>
        /* Tambahkan beberapa gaya untuk animasi loading */
        #loading {
            display: none;
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            position: fixed;
            /* Gunakan fixed untuk memposisikan elemen relatif terhadap viewport */
            top: 50%;
            left: 46.5%;

            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="grocery-color public-san-body">
    <div id="loading"></div>

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
            <a href="#">
                <img src="<?= base_url() ?>assets/svg/yusen.svg" class="img-fluid" alt="" style="width: 65px !important;">
            </a>
        </div>

        <div class="right-header">
            <a href="#" class="profile-image">
                <img src="<?= base_url() ?>/assets/images/grocery/user.png" class="img-fluid" alt="">
            </a>
        </div>
    </header>
    <!-- header End -->

    <!-- Search Section Start -->
    <section>
        <div class="custom-container">
            <form class="form-style-7">
                <div class="form-box search-box mb-19">
                    <input type="text" class="form-control" id="search" placeholder="Search DN/SPK/Customer">
                    <i class="ri-search-line"></i>
                    <!-- <i class="ri-mic-line mic-icon"></i> -->
                </div>
            </form>
        </div>
    </section>
    <!-- Search Section End -->


    <!-- Offer Section Start -->
    <section>
        <div class="title mb-10 px-15">
            <h4>Result : <span id="spResult">0</span></h4>
        </div>
        <div class="custom-container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" role="tabpanel" tabindex="0" id="divOrder">

                </div>
            </div>
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
                <a href="#" class="profile-img">
                    <img src="<?= base_url() ?>/assets/images/grocery/user.png" class="img-fluid" alt="">
                </a>
                <div class="profile-content">
                    <h4>Guest</h4>
                    <!-- <h5>paigeturner@gmail.com</h5> -->
                </div>
            </div>

            <ul class="menu-list">
                <li>
                    <a href="<?= base_url('order') ?>"><i class="ri-file-list-2-line"></i> Orders</a>
                </li>
                <li>
                    <a href="<?= base_url('order/scan') ?>"><i class="ri-qr-scan-2-line"></i></i> Scan SPK</a>
                </li>
                <!-- <li>
                    <a href="wishlist.html"><i class="ri-heart-line"></i> Your Wishlist</a>
                </li> -->
                <!-- <li>
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
                </li> -->
            </ul>

            <!-- <a href="sign-in.html" class="sidebar-btn grocery-btn white-btn">Logout</a> -->
        </div>
    </div>
    <!-- Side Menu Offcanvas End -->



    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>/assets/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- quantity js -->
    <script src="<?= base_url() ?>/assets/js/quantity.js"></script>

    <!-- Loader js -->
    <script src="<?= base_url() ?>/assets/js/loader.js"></script>

    <!-- Theme js-->
    <script src="<?= base_url() ?>/assets/js/script.js"></script>

    <!-- Jquery -->
    <script src="<?= base_url() ?>assets/js/jquery-3.7.0.js"></script>

    <script>
        $(document).ready(function() {

            let typingTimer; // Timer identifier
            const typingInterval = 1000; // Waktu dalam milidetik (3 detik)

            // getOrder()

            function getOrder(search = null) {
                $('#loading').show()
                $.post("<?= base_url('order/getorder') ?>", {
                    search
                }, function(response) {
                    $('#divOrder').html(response.content);
                    $('#spResult').text(response.rows)
                    $('#loading').hide();
                }, 'json');
            }

            $('#search').on('keyup', function() {
                let search = $(this).val();
                if (search.length > 3) {
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(getOrder(search), typingInterval);
                }
            });
        })
    </script>
</body>


</html>