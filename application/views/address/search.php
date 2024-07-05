<?php
$this->load->view('layouts/header');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            <a href="javascript:void(0)" id="addLocation" class="mobile-box" data-bs-toggle="offcanvas" data-bs-target="#editOffcanvas">
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


<!-- <div class="modal fade delete-modal theme-modal" id="modalAddLocation">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-track-spk">
            <div class="modal-header">
                <h5 class="modal-title" id="">Add Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="modal-body" style="overflow: auto; max-height: 300px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme btn-light btnSelectCustomer">Choose Customer</button>
            </div>
        </div>
    </div>
</div> -->

<div class="offcanvas offcanvas-bottom h-auto" tabindex="-1" id="editOffcanvas">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title w-75">Add Location</h3>
        <button type="button" class="btn-close p-0 m-0" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body pt-0">
        <form class="row g-3 form-style-7 wo-icon" id="formAddLocation">
            <div class="col-12">
                <label for="inputState" class="form-label">BU</label>
                <select class="form-select" id="in_bu" required>
                    <option value="" selected>Choose...</option>
                    <option value="SPKAS">Asics</option>
                    <option value="SPKNV">Navya</option>
                </select>
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Customer Name</label>
                <select class="form-select" id="in_customer_name" required>
                    <option value="" selected>Choose...</option>
                </select>
            </div>
            <div class="col-5">
                <label for="inputAddress2" class="form-label">Latitude</label>
                <input style="max-width: 150px;" type="text" class="form-control-sm" id="in_latitude" readonly>
            </div>
            <div class="col-1"></div>
            <div class="col-5">
                <label for="inputAddress2" class="form-label">Longitude</label>
                <input style="max-width: 150px;" type="text" class="form-control-sm" id="in_longitude" readonly>
            </div>
            <div class="col-12">
                <label for="inputCity" class="form-label">Actual Location</label>
                <textarea type="text" class="form-control" id="in_actual_location" readonly></textarea>
            </div>
            <div class="d-flex align-items-center mt-4 gap-3">
                <a href="#" class="btn border-btn grocery-btn theme-btn" data-bs-dismiss="offcanvas">Cancel</a>
                <button type="submit" class="btn grocery-btn theme-btn">Save</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade delete-modal theme-modal" id="modalSelectCustomer">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" id="modal-track-spk">
            <div class="modal-header">
                <h5 class="modal-title" id="">Pilih Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="modal-body" style="overflow: auto; max-height: 300px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme btn-light btnUpdateOrder">Select</button>
            </div>
        </div>
    </div>
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

        $('#in_bu').on('change', function() {
            let bu = $(this).val();
            if (bu.trim() != '') {
                // console.log(bu);
                startLoading();
                $.post("<?= base_url('search/getJSONCustomer') ?>", {
                    bu
                }, function(response) {
                    stopLoading();
                    let inSelect = $('#in_customer_name');
                    inSelect.empty();
                    inSelect.append(`<option value="" selected>Choose...</option>`);
                    if (response.data.length > 0) {
                        response.data.forEach((item) => {
                            let option = `<option value="${item.cust_id}">${item.cust_name}</option>`;
                            inSelect.append(option);
                        });
                    }
                }, 'JSON');
            }
        });

        $('#formAddLocation').on('submit', function(e) {
            e.preventDefault();
            if ($('#in_latitude').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: '',
                    text: 'Titik lokasi harus ditentukan'
                });
            } else {
                let dataToPost = {
                    bu: $('#in_bu').val(),
                    cust_id: $('#in_customer_name').val(),
                    lat: $('#in_latitude').val(),
                    lon: $('#in_longitude').val(),
                    actual_location: $('#in_actual_location').text(),
                }
                startLoading();
                $.post("<?= base_url('search/saveLocationCustomer') ?>", dataToPost, function(response) {
                    stopLoading();
                }, 'JSON');
            }
        });

        // $('#addLocation').on('click', function() {
        //     $('#modalAddLocation').modal('show');
        // })

        // $('.btnSelectCustomer').on('click', function() {
        //     $('#modalSelectCustomer').modal('show');
        // })

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
                    $('#in_latitude').val(lat);
                    $('#in_longitude').val(lng);
                    $('#in_actual_location').text(data.display_name);

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