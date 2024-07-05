<?php
$this->load->view('layouts/header');
?>

<!-- Map link -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/leaflet.css">
<script src="<?= base_url() ?>assets/js/leaflet.js"></script>



<section>
    <div class="map-section">
        <div style="max-height: 400px;" id="map"></div>
    </div>
</section>
<section>
    <div style="margin-top: 10px;" class="custom-container">
        <form class="form-style-7">
            <div style="margin-bottom:5px;" class="form-box search-box">
                <input type="text" class="form-control" id="search" placeholder="Masukan nama tempat">
                <i class="ri-search-line"></i>
            </div>
        </form>
    </div>
    <div class="title mb-10 px-15">
        <h5>Result : <span id="spResult">0</span></h5>
    </div>
    <div style="min-height: 100px;
    max-height: 200px;
    overflow: scroll;" class="custom-container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" tabindex="0" id="divResult">

            </div>
        </div>
    </div>
</section>

<!-- <section class="map-section">

</section> -->

<?php
$this->load->view('layouts/sidemenu');
?>


<script>
    $(document).ready(function() {
        let debounceTimer;
        $('#search').on('keyup', function() {
            clearTimeout(debounceTimer); // Menghapus timer sebelumnya
            debounceTimer = setTimeout(function() {
                let keywords = $('#search').val();
                if (keywords.length > 5) {
                    keywords = keywords.replace(/ /g, "+");
                    $.get("https://nominatim.openstreetmap.org/search.php?q=" + keywords + "&format=jsonv2", {}, function(response) {

                        $('#spResult').text(response.length);
                        $('#divResult').empty();
                        $('#divResult').append(`<ul class="product-offer-list">`);
                        response.forEach(function(item) {
                            let li = `
                                        <li class="address-item" data-lat="${item.lat}" data-lng="${item.lon}">
                                            <div class="product-box" style="font-size: 10px !important;">
                                                <div class="product-content">
                                                    <div>
                                                        <h5 style="font-size:12px;" class="name"> ${item.display_name}</h5>
                                                        <span><i class="ri-map-pin-line"></i> Lat : ${item.lat} </span><span>&nbsp; Lon : ${item.lon}</span>
                                                        <hr style="margin-top:5px; margin-bottom:5px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </li
                                
                            `;
                            $('#divResult').append(li);
                        })
                        $('#divResult').append(`</ul>`);
                    }, 'json');
                }
            }, 300); // Menjalankan fungsi setelah 300 milidetik
        });



        // var map, marker, userLat, userLon, userAddress;

        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(showPosition, showError);
        // } else {
        //     alert("Geolocation is not supported by this browser.");
        // }

        // $('#btnCenter').on('click', function() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(showPosition, showError);
        //     } else {
        //         alert("Geolocation is not supported by this browser.");
        //     }
        // });

        // function initializeMap(lat, lon) {
        //     if (!map) {
        //         // Initialize the map
        //         map = L.map('map').setView([lat, lon], 13); // 13 is the zoom level

        //         // Add the OpenStreetMap tiles
        //         L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //             attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        //         }).addTo(map);

        //         // Add a marker to the map
        //         marker = L.marker([lat, lon]).addTo(map);
        //     } else {
        //         map.setView([lat, lon], 13);
        //         marker.setLatLng([lat, lon]);
        //     }
        // }

        // function showPosition(position) {
        //     var lat = position.coords.latitude;
        //     var lon = position.coords.longitude;

        //     initializeMap(lat, lon);

        //     var geocodeURL = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&zoom=18&addressdetails=1`;

        //     $.getJSON(geocodeURL, function(data) {
        //         if (data && data.address) {
        //             var address = data.address;
        //             var city = address.city || address.town || address.village;
        //             var city_district = address.city_district;
        //             var country = address.country;
        //             var country_code = address.country_code;
        //             var industrial = address.industrial;
        //             var region = address.region;
        //             var postcode = address.postcode;
        //             var address_name = data.display_name;

        //             userAddress = data.display_name;
        //             userLon = data.lon;
        //             userLat = data.lat;

        //             $('#spanCountry').text(city_district + ', ' + country);
        //             $('#spanFullAddress').text(address_name);

        //             // Update marker popup with address
        //             marker.bindPopup(`<b>Your location :</b> ${data.display_name}`).openPopup();

        //             // Adjust the map view to center slightly above the marker position
        //             var offsetLat = lat - 0; // Adjust this value to move the map center
        //             map.setView([offsetLat, lon], 13);
        //         } else {
        //             alert("Geocode was not successful for the following reason: " + data.error);
        //         }
        //     });
        // }

        // function showError(error) {
        //     switch (error.code) {
        //         case error.PERMISSION_DENIED:
        //             alert("Pengguna menolak permintaan Geolokasi.");
        //             break;
        //         case error.POSITION_UNAVAILABLE:
        //             alert("Location information is unavailable.");
        //             break;
        //         case error.TIMEOUT:
        //             alert("The request to get user location timed out.");
        //             break;
        //         case error.UNKNOWN_ERROR:
        //             alert("An unknown error occurred.");
        //             break;
        //     }
        // }



    });


    $(document).ready(function() {
        // Inisialisasi peta
        var map = L.map('map').setView([-6.12885785, 106.87079323031739], 13);

        // Tambahkan layer tile dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Variabel untuk menyimpan marker dan koordinat
        var singleMarker;
        var lat, lng;

        // Fungsi untuk memindahkan marker
        function moveMarker(lat, lng) {
            // Hapus marker yang ada jika sudah ada
            if (singleMarker) {
                map.removeLayer(singleMarker);
            }


            var geocodeURL = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18&addressdetails=1`;

            $.getJSON(geocodeURL, function(data) {
                if (data && data.address) {

                    // Tambahkan marker baru
                    singleMarker = L.marker([lat, lng]).addTo(map)
                        .bindPopup(data.display_name)
                        .openPopup();

                    // Simpan koordinat pada variabel
                    console.log("Koordinat tersimpan: Latitude = " + lat + ", Longitude = " + lng);

                    // Pindahkan peta ke koordinat baru
                    map.setView([lat, lng], 13);

                } else {
                    alert("Geocode was not successful for the following reason: " + data.error);
                }
            });


        }

        // Event listener untuk klik pada daftar alamat
        $('#divResult').on('click', '.address-item', function() {
            lat = $(this).data('lat');
            lng = $(this).data('lng');
            moveMarker(lat, lng);
        });

        // Tambahkan marker awal saat peta diklik
        map.on('click', function(e) {
            lat = e.latlng.lat;
            lng = e.latlng.lng;
            moveMarker(lat, lng);
        });
    });
</script>