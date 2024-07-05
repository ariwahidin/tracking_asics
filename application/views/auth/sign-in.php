<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.net/multikit/grocery/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2024 14:17:14 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikit">
    <meta name="keywords" content="multikit">
    <title>Sign In - My TMS</title>
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url() ?>assets/svg/yusen.svg" type="image/x-icon">
    <link rel="manifest" href="<?= base_url() ?>/manifest.json">

    <!-- Google font css link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">

    <!-- Bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">

    <!-- Loader Normalize css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/normalize.min.css">

    <!-- Remix Icon css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/remixicon.css">

    <!-- Style css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/style.css">
</head>

<body class="grocery-color public-san-body">
    <!-- Loader Box Start -->
    <div class="min-loader-wrapper">
        <img src="<?= base_url() ?>assets/svg/yusen.svg" class="img-fluid loader" alt="">
        <div class="loader-section grocery-color section-left"></div>
        <div class="loader-section grocery-color section-right"></div>
    </div>
    <!-- Loader Box End -->

    <!-- authentication start -->
    <div style="background-image: none !important;" class="grocery-authentication">
        <div class="custom-container">
            <div class="logo-content">
                <img src="<?= base_url() ?>assets/svg/yusen.svg" class="img-fluid logo" alt="">
                <p>Smart Solutions for Your Delivery Management, Control Your Deliveries at Your Fingertips, Bringing Transparency to Every Step.</p>
            </div>
            <div class="auth-box">
                <div class="auth-title">
                    <h4>Login Account</h4>
                </div>

                <?php if ($this->session->flashdata('error')) : ?>
                    <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>

                <form class="form-style-7" action="<?php echo base_url('auth/authenticate'); ?>" method="post">
                    <div class="form-box mb-19">
                        <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?php echo set_value('username', $this->session->flashdata('username')); ?>" required>
                        <i class="ri-user-line"></i>
                    </div>
                    <div class="form-box mb-2">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password" value="<?php echo set_value('password', $this->session->flashdata('password')); ?>" required>
                        <i class="ri-lock-line"></i>
                    </div>
                    <!-- <h6 class="forgot-text text-end fw-normal mb-19">
                        <a href="forgot-password.html" class="content-color">Forgot password?</a>
                    </h6> -->
                    <!-- <a href="<?= base_url('welcome/index') ?>" class="grocery-btn theme-btn">Sign in</a> -->
                    <button type="submit" class="grocery-btn theme-btn">Login</button>
                    <!-- <h5 class="text-center mt-3">
                        <a href="sign-up.html" class="content-color">If you are new, Create Now</a>
                    </h5> -->
                </form>

                <h5 class="guest-button">
                    <a href="index.html">Continue as guest</a>
                </h5>
            </div>
        </div>
    </div>
    <!-- authentication end -->



    <!-- spacing start -->
    <div class="grocery-bottom-spacing"></div>
    <!-- spacing end -->

    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>assets/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Loader js -->
    <script src="<?= base_url() ?>assets/js/loader.js"></script>

    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>

    <!-- Jquery -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.7.0.js"></script>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('<?= base_url() ?>service-worker.js')
                .then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                }).catch(function(error) {
                    console.log('Service Worker registration failed:', error);
                });
        }
    </script>

</body>

</html>