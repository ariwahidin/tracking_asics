<?php
$this->load->view('layouts/header');
?>

<section>
    <div class="custom-container">
        <form class="form-style-7">
            <div class="form-box search-box mb-19">
                <input type="text" class="form-control" id="search" placeholder="Masukan nama tempat">
                <i class="ri-search-line"></i>
            </div>
        </form>
    </div>
</section>

<section>
    <div class="title mb-10 px-15">
        <h4>Result : <span id="spResult">0</span></h4>
    </div>
    <div class="custom-container">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" role="tabpanel" tabindex="0" id="divResult">

            </div>
        </div>
    </div>
</section>

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
                                        <li>
                                            <div class="product-box" style="font-size: 10px !important;">
                                                <div class="product-content">
                                                    <div>
                                                        <a href="product.html">
                                                            <h5 class="name">${item.display_name}</h5>
                                                        </a>
                                                        <h5 class="category"></h5>
                                                        <h5 class="price">Lat : ${item.lat}</h5>
                                                        <h5 class="price">Lon : ${item.lon}</h5>
                                                    </div>
                                                    <div>
                                                        <span></span>
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
    });
</script>