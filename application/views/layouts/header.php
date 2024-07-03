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

    <link rel="manifest" href="<?= base_url() ?>/manifest.json">

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
            left: 48%;

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