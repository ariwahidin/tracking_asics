<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tracking SPK</title>
    <link rel="icon" href="<?= base_url() ?>assets/svg/yusen.svg" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/taxi/assets/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/taxi/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/taxi/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/taxi/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/taxi/assets/css/media-query.css">
</head>

<body class="rides-body">
    <div class="site-content rides-main">
        <!-- Preloader start -->
        <!-- <div class="loader-mask">
            <div class="loading-window">
                <div class="car">
                    <div class="strike"></div>
                    <div class="strike strike2"></div>
                    <div class="strike strike3"></div>
                    <div class="strike strike4"></div>
                    <div class="strike strike5"></div>
                    <div class="car-detail spoiler"></div>
                    <div class="car-detail back"></div>
                    <div class="car-detail center"></div>
                    <div class="car-detail center1"></div>
                    <div class="car-detail front"></div>
                    <div class="car-detail wheel"></div>
                    <div class="car-detail wheel wheel2"></div>
                </div>
            </div>
        </div> -->
        <!-- Preloader end -->
        <!-- Header start -->
        <header id="top-header">
            <div class="header-wrap">
                <div class="header-back">
                    <a href="javascript:history.go(-1)">
                        <img src="<?= base_url() ?>/assets/taxi/assets/svg/back-btn-white.svg" alt="back-btn">
                    </a>
                </div>
                <div class="header-name">
                    <p><?= $this->input->get('spk'); ?></p>
                </div>
            </div>
            <div class="boder"></div>
        </header>
        <!-- Header end -->
        <!-- Rides screen content start-->
        <section id="rides-upcoming">
            <div class="rides-upcoming-wrap">
                <h1 class="d-none">Hidden</h1>
                <div class="tab-content container" id="pills-tabContent">
                    <div class="tab-pane active" id="upcoming" role="tabpanel" tabindex="0">
                        <div class="upcoming-tab-wrap mt-24">
                            <div class="active-ride-sec">
                                <div class="ride-details">
                                    <div class="driver-trip-first-sec-wrap">
                                        <div class="driver-details">
                                            <div class="driver-details-wrap">
                                                <div class="driver-name">
                                                    <p>PT. NAVYA INDONESIA MERDEKA RAYA</p>
                                                </div>
                                            </div>
                                            <p class="driver-title">IF-909090XXX</p>
                                        </div>
                                    </div>
                                    <div class="boder mt-16"></div>
                                    <div class="ride-track ride-track mt-24">
                                        <div class="ride-track1">
                                            <div class="black"></div>
                                        </div>
                                        <div class="ride-address">
                                            <p class="ride-txt1">Sampai Terminal</p>
                                            <p style="font-size: 11px; margin-left:12px; max-width: 380px;">Srengseng Junction, Jalan Srengseng Raya, RW 06, Srengseng, Kembangan, West Jakarta, Special Region of Jakarta, Java, 11630, Indonesia</p>
                                        </div>
                                        <div class="ride-track-time">
                                            <p style="position:absolute; font-size: 10px !important; margin-left: -107px;" class="ride-txt2"><?= date('Y-m-d H:i:s') ?></p>
                                        </div>
                                    </div>
                                    <div class="ride-track ride-track mt-24">
                                        <div class="ride-track1">
                                            <div class="black"></div>
                                        </div>
                                        <div class="ride-address">
                                            <p class="ride-txt1">Sampai Terminal</p>
                                            <p style="font-size: 11px; margin-left:12px; max-width: 380px;">Srengseng Junction, Jalan Srengseng Raya, RW 06, Srengseng, Kembangan, West Jakarta, Special Region of Jakarta, Java, 11630, Indonesia</p>
                                        </div>
                                        <div class="ride-track-time">
                                            <p style="position:absolute; font-size: 10px !important; margin-left: -107px;" class="ride-txt2"><?= date('Y-m-d H:i:s') ?></p>
                                        </div>
                                    </div>
                                    <div class="ride-track ride-track mt-24">
                                        <div class="ride-track1">
                                            <div class="black"></div>
                                        </div>
                                        <div class="ride-address">
                                            <p class="ride-txt1">Sampai Terminal</p>
                                            <p style="font-size: 11px; margin-left:12px; max-width: 380px;">Srengseng Junction, Jalan Srengseng Raya, RW 06, Srengseng, Kembangan, West Jakarta, Special Region of Jakarta, Java, 11630, Indonesia</p>
                                        </div>
                                        <div class="ride-track-time">
                                            <p style="position:absolute; font-size: 10px !important; margin-left: -107px;" class="ride-txt2"><?= date('Y-m-d H:i:s') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="<?= base_url() ?>/assets/taxi/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/taxi/assets/js/slick.min.js"></script>
    <script src="<?= base_url() ?>/assets/taxi/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/taxi/assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            alert('test')
            // $.post("<?= base_url('order/')?>", );
        })
    </script>
</body>

</html>