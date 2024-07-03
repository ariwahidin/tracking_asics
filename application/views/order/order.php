<?php
function truncateText($text, $maxLength = 25)
{
    // Cek apakah panjang teks lebih dari nilai maksimum
    if (strlen($text) > $maxLength) {
        // Potong teks dan tambahkan "..."
        return substr($text, 0, $maxLength) . '...';
    } else {
        // Jika teks kurang dari atau sama dengan nilai maksimum, tampilkan teks apa adanya
        return $text;
    }
}
?>

<ul class="product-offer-list">

    <?php
    foreach ($order->result() as $data) {
    ?>


        <li>
            <div class="product-box" style="font-size: 10px !important;">
                <a href="product.html" class="product-image">
                    <img src="<?= base_url() ?>/assets/images/grocery/product/truck.png" class="img-fluid" alt="">
                </a>
                <div class="product-content">
                    <div>
                        <a href="#">
                            <h5 class="name"><?= truncateText($data->cust_name) ?></h5>
                        </a>
                        <h5 class="category"><?= $data->delivery_no ?></h5>
                        <h5 class="price"><?= $data->order_id ?></h5>
                    </div>
                    <div>
                        <span><?= $data->order_date ?></span>
                    </div>
                </div>
            </div>
        </li>
    <?php
    }
    ?>
</ul>