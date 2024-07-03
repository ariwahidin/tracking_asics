<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PYID Tracking Order">
    <meta name="keywords" content="PYID Tracking Order">
    <title>PYID Tracking Order</title>
    <meta name="theme-color" content="#ff8d2f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PYID Tracking Order">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/svg/yusen.svg">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url() ?>assets/svg/yusen.svg" type="image/x-icon">

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

<style>
    /* CSS untuk latar belakang hitam transparan */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        /* Warna hitam dengan opasitas 0.7 */
        z-index: 9999;
        /* Menempatkan latar belakang di atas konten */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Kode CSS untuk animasi spinner yang Anda sebutkan sebelumnya */
    .lds-roller {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 40px 40px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #fff;
        margin: -4px 0 0 -4px;
    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 63px;
        left: 63px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 68px;
        left: 56px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 71px;
        left: 48px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 72px;
        left: 40px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 71px;
        left: 32px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 68px;
        left: 24px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 63px;
        left: 17px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 56px;
        left: 12px;
    }

    /* Sisipkan sisa kode CSS untuk animasi spinner di sini */

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }


    #reader {
        width: 300px;
        margin: 20px auto;
        display: none;
        /* Hide by default */
    }

    /* video {
        width: 100%;
        border-radius: 5%;
    } */
</style>



<div class="pLoading" style="display: none;">
    <div class="overlay">
        <div class="lds-roller">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<script>
    function stopLoading() {
        var divLoading = document.querySelector(".pLoading");
        divLoading.style.display = "none";
    }

    function startLoading() {
        var divLoading = document.querySelector(".pLoading");
        divLoading.style.display = "block";
    }
</script>

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
        <!-- <a href="#" class="arrow-box">
            <i class="ri-arrow-left-s-line"></i>
        </a> -->

        <a href="javascript:void(0)" class="arrow-box" id="btnCenter">
            <i class="ri-focus-3-line"></i>
        </a>
        <a href="javascript:void(0)" class="arrow-box" id="btnScan">
            <i class="ri-qr-scan-2-line"></i>
        </a>
    </header>
    <!-- header End -->

    <!-- map section start -->
    <section class="map-section">
        <div id="map"></div>
    </section>
    <!-- map section end -->

    <section id="scan-section">
        <div class="modal fade delete-modal theme-modal" id="modalScan">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div id="reader"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="order-section">
    </section>



    <!-- delete modal start -->
    <div class="modal fade delete-modal theme-modal" id="modalArrival">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-conf">
            </div>
        </div>
    </div>

    <div class="modal fade theme-modal delete-modal-2" id="exampleModalToggle2">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Done</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Updating status order successfully</h5>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-theme btn-light" data-bs-dismiss="modal">Done</button>
                </div>
            </div>
        </div>
    </div>


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

            var map, marker, userLat, userLon, userAddress;

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

                initializeMap(lat, lon);

                var geocodeURL = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;

                $.getJSON(geocodeURL, function(data) {
                    if (data && data.address) {
                        // console.log(data)
                        // console.log(data.address)
                        var address = data.address;
                        var city = address.city || address.town || address.village;
                        var city_district = address.city_district;
                        var country = address.country;
                        var country_code = address.country_code;
                        var industrial = address.industrial;
                        var region = address.region;
                        var postcode = address.postcode;
                        var address_name = data.display_name;

                        userAddress = data.display_name;
                        userLon = data.lon;
                        userLat = data.lat;

                        $('#spanCountry').text(city_district + ', ' + country);
                        $('#spanFullAddress').text(address_name);

                        // Update marker popup with address
                        marker.bindPopup(`<b>Your location :</b> ${data.display_name}`).openPopup();

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

            $('#order-section').on('click', '.btnTrack', function() {
                let order_id = $(this).data('order-id');
                let ship_to = $(this).data('ship-to');
                let cust_name = $(this).data('cust-name');
                let cust_addr = $(this).data('cust-addr');
                let delivery_no = $(this).data('delivery-no');

                let driverName = '';
                if (localStorage.getItem('t_driverName')) {
                    driverName = localStorage.getItem('t_driverName');
                }


                $('#modal-conf').empty();
                let elem = `
                <form id="formUpdateTrack">
                <div class="modal-header">
                    <h4 class="modal-title">Update order status:</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="delete-list" id="conf-cust">
                        <li>
                            <h5>
                                <a href="#">${cust_name}</a>
                            </h5>
                            <h6>${delivery_no}</h6>
                            <h6>${cust_addr}</h6>
                        </li>
                        <li>
                            <div class="mt-3 chatting-form-control">
                                <label>Barang sampai di :</label>
                                <input type="text" class="form-control form-control-border" placeholder="Terminal/Pelabuhan/Bandara etc.." id="lokasi_terkini" value="" required autocomplete="off">
                            </div>
                        </li>
                        <li>
                            <div class="mt-3 chatting-form-control">
                                <label>Nama petugas :</label>
                                <input type="hidden" id="in_spk" value="${order_id}">
                                <input type="hidden" id="in_ship_to" value="${ship_to}">
                                <input type="hidden" id="delivery_no" value="${delivery_no}">
                                <input type="text" class="form-control form-control-border" placeholder="Masukan nama anda/petugas/driver" id="user_name" value="${driverName}" required autocomplete="off">
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-theme btn-light btnSubmit" data-submit="on the way">Update Perjalanan</button>
                    <button type="submit" class="btn btn-theme btn-light btnSubmit" data-submit="goods arrived">Barang Sampai</button>
                    <button type="submit" class="btn btn-theme btn-light btnSubmit" data-submit="goods unloading">Barang Dibongkar</button>
                </div>
                </form>`;
                $('#modal-conf').html(elem);
                $('#modalArrival').modal('show');
            })

            var lastClickedButton;
            $('#modal-conf').on('click', '.btnSubmit', function() {
                lastClickedButton = $(this);
            });
            $('#modal-conf').on('submit', '#formUpdateTrack', function(e) {
                e.preventDefault();
                if (lastClickedButton) {
                    var status = lastClickedButton.data('submit');

                    let dataToPost = {
                        user_address: userAddress,
                        user_lat: userLat,
                        user_lon: userLon,
                        user_name: $('#user_name').val(),
                        spk: $('#in_spk').val(),
                        ship_to: $('#in_ship_to').val(),
                        delivery_no: $('#delivery_no').val(),
                        lokasi_terkini: $('#lokasi_terkini').val(),
                        status: status
                    }
                    startLoading();
                    $.post("<?= base_url('address/updateStatusOrder') ?>", dataToPost, function(response) {
                        if (response.success == true) {
                            $('#modalArrival').modal('hide');
                            $('#exampleModalToggle2').modal('show');
                            getBoxOrder();
                            stopLoading();
                        } else {
                            $('#modalArrival').modal('hide');
                            getBoxOrder();
                            stopLoading();
                        }
                    }, 'json');
                }
            })


            getBoxOrder();

            function getBoxOrder() {
                let spk = "<?= $_GET['spk'] ?>";
                $.get("<?= base_url('address/getBoxOrder') ?>", {
                    spk: spk
                }, function(response) {

                    console.log(response)

                    $('#order-section').empty();
                    $('#order-section').html(response.box);

                }, 'json');
            }

            var reader = document.getElementById('reader');

            $('#btnScan').on('click', function() {
                window.location.href = "<?= base_url('order/scan') ?>";
            });

        });
    </script>
</body>


</html>