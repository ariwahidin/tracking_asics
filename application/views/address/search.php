<?php
$this->load->view('layouts/header');
?>

<!-- Map link -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/leaflet.css">
<script src="<?= base_url() ?>assets/js/leaflet.js"></script>



<section>
    <div class="map-section">
        <div style="max-height: 350px;" id="map"></div>
    </div>
</section>
<section>
    <div style="margin-top: 10px;" class="custom-container">
        <form class="form-style-7" id="formSearch">
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

<div class="mobile-style-6">
    <ul style="justify-content: center">
        <li>
            <a href="javascript:void(0)" class="mobile-box">
                <i class="ri-map-pin-add-line"></i>
                <h6>Add Location</h6>
            </a>
        </li>

        <!-- <li>
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
        </li> -->
    </ul>
</div>

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
                    getAddress(keywords);
                }
            }, 300); // Menjalankan fungsi setelah 300 milidetik
        });

        function getAddress(keywords) {
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

        $('#formSearch').on('submit', function(e) {
            e.preventDefault();
            let keywords = $('#search').val();
            if (keywords.length > 5) {
                getAddress(keywords);
            }
        })

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