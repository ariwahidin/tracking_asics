<?php
$this->load->view('layouts/header');
?>

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

<?php
$this->load->view('layouts/sidemenu');
?>

<script>
    $(document).ready(function() {

        let debounceTimer;

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
            clearTimeout(debounceTimer);
            let search = $(this).val();
            debounceTimer = setTimeout(function() {
                if (search.length > 3) {
                    getOrder(search);
                }
            }, 1000);
        });

        $('#divOrder').on('click', '.product-box', function() {
            window.location.href = "<?= base_url('order/tracking') ?>"
        })
    })
</script>