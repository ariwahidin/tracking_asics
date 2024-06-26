<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.net/multikit/grocery/address.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Jun 2024 14:17:27 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="multikit">
    <meta name="keywords" content="multikit">
    <title>Multikit - Multi-purpose Html Template</title>
    <!-- <link rel="manifest" href="https://themes.pixelstrap.net/multikit/manifest.json"> -->
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="multikit">
    <meta name="msapplication-TileImage" content="https://themes.pixelstrap.net/multikit/assets/images/favicon/1.svg">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url() ?>assets/svg/yusen.svg" type="image/x-icon">
    <!-- <link rel="shortcut icon" href="https://themes.pixelstrap.net/multikit/" type="image/x-icon"> -->

    <!-- Google font css link  -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap">

    <!-- Bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/vendors/bootstrap.css">

    <!-- Loader Normalize css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/normalize.min.css">

    <!-- Map link -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/leaflet.css">
    <script src="<?= base_url() ?>assets/js/leaflet.js"></script>

    <!-- <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->

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

    <!-- header Start -->
    <header class="header-style-6 header-absolute">
        <a href="index.html" class="arrow-box">
            <i class="ri-arrow-left-s-line"></i>
        </a>

        <a href="javascript:void(0)" class="arrow-box" id="btnCenter">
            <i class="ri-focus-3-line"></i>
        </a>
    </header>
    <!-- header End -->

    <!-- map section start -->
    <section class="map-section">
        <div id="map"></div>
    </section>
    <!-- map section end -->

    <!-- Location Box Section Start -->
    <div class="grocery-location-box">

        <div class="custom-container">
            <!-- <form class="form-style-7 search-box">
                <div class="form-box mb-19">
                    <input type="email" class="form-control" placeholder="Email Address">
                    <i class="ri-search-line"></i>
                    <i class="ri-mic-line mic-icon"></i>
                </div>
            </form> -->

            <!-- <a href="new-address.html" class="find-address-box">
                <div class="icon">
                    <i class="ri-navigation-line"></i>
                </div>
                <h4>Use current location</h4>
            </a> -->

            <div class="delivery-time">
                <i class="ri-truck-line"></i>
                <h5>
                    SPK : SPK0987878
                    <br>
                    Dest : PT. Asics Indonesia
                </h5>
            </div>

            <ul class="choose-address-list">
                <li>
                    <div class="address-box">
                        <div class="top-address">
                            <i class="ri-map-pin-line"></i>
                            <h5><span id="spanCountry"></span></h5>
                        </div>
                        <p><span id="spanFullAddress"></span></p>
                    </div>
                </li>
            </ul>



            <a href="javascript:void(0)" class="grocery-btn theme-btn mb-15">Truck sampai ditujuan</a>
            <a href="javascript:void(0" class="grocery-btn theme-btn mb-15">Barang dibongkar</a>
            <a href="javascript:void(0)" class="grocery-btn theme-btn mb-15">POD kembali ke Yusen</a>
            <a href="javascript:void(0)" class="grocery-btn theme-btn mb-15">POD kembali ke Asics</a>
        </div>
    </div>
    <!-- Location Box Section End -->

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

            <a href="sign-in.html" class="sidebar-btn grocery-btn white-btn">Logout</a>
        </div>
    </div>
    <!-- Side Menu Offcanvas End -->

    <!-- Theme Option Setting Box End -->

    <!-- Jquery -->
    <script src="<?= base_url() ?>assets/js/jquery-3.7.0.js"></script>

    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>assets/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Map js -->

    <!-- <script src="<?= base_url() ?>assets/js/custom-map.js"></script> -->

    <!-- Loader js -->
    <script src="<?= base_url() ?>assets/js/loader.js"></script>

    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>

    <script>
        $(document).ready(function() {

            var map, marker, userLat, userLon;



            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }

            $('#btnCenter').on('click', function() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            });


            function initializeMap(lat, lon) {
                if (!map) {
                    // Initialize the map
                    map = L.map('map').setView([lat, lon], 13); // 13 is the zoom level

                    // Add the OpenStreetMap tiles
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    // Add a marker to the map
                    marker = L.marker([lat, lon]).addTo(map);
                } else {
                    map.setView([lat, lon], 13);
                    marker.setLatLng([lat, lon]);
                }
            }

            function showPosition(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                // console.log(lat);
                // console.log(lon);

                initializeMap(lat, lon);

                var geocodeURL = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;

                $.getJSON(geocodeURL, function(data) {
                    if (data && data.address) {
                        // console.log(data.address);

                        var address = data.address;
                        var city = address.city || address.town || address.village;
                        var city_district = address.city_district;
                        var country = address.country;
                        var country_code = address.country_code;
                        var industrial = address.industrial;
                        var region = address.region;
                        var postcode = address.postcode;
                        var address_name = data.display_name;

                        $('#spanCountry').text(city_district + ', ' + country);
                        $('#spanFullAddress').text(address_name);

                        // Update marker popup with address
                        marker.bindPopup(`<b>Address:</b> ${data.display_name}`).openPopup();

                        // Adjust the map view to center slightly above the marker position
                        var offsetLat = lat - 0.025; // Adjust this value to move the map center
                        map.setView([offsetLat, lon], 13);
                    } else {
                        alert("Geocode was not successful for the following reason: " + data.error);
                    }
                });
            }

            function showError(error) {
                switch (error.code) {
                    case error.PERMISSION_DENIED:
                        alert("User denied the request for Geolocation.");
                        break;
                    case error.POSITION_UNAVAILABLE:
                        alert("Location information is unavailable.");
                        break;
                    case error.TIMEOUT:
                        alert("The request to get user location timed out.");
                        break;
                    case error.UNKNOWN_ERROR:
                        alert("An unknown error occurred.");
                        break;
                }
            }
        });
    </script>
</body>


</html>