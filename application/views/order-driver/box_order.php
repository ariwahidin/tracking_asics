    <!-- Location Box Section Start -->
    <div style="max-height: 650px; overflow: auto" class="grocery-location-box">

        <div class="custom-container">

            <ul class="cart-box-list">
                <li>
                    <div class="cart-box">
                        <div class="cart-left-box">
                            <a href="product.html" class="product-image">
                                <img src="<?= base_url() ?>assets/images/grocery/product/truck-carton.png" class="img-fluid" alt="">
                            </a>
                            <div class="product-name">
                                <h5>
                                    <?php
                                    $order_row = $order->row();
                                    $order_id =  $order_row && $order_row->order_id !== null ? $order_row->order_id : '';


                                    $tiba = 0;
                                    $dibongkar = 0;

                                    foreach ($order->result() as $data) {
                                        if (!is_null($data->arrival_status)) {
                                            $tiba += 1;
                                        }
                                        if (!is_null($data->unloading_status)) {
                                            $dibongkar += 1;
                                        }
                                    }

                                    ?>
                                    <a href="#">SPK : <?= $order_id ?></a>
                                </h5>
                                <h6>Drop point : <?= $order->num_rows() ?> Tiba : <?= $tiba ?> Dibongkar : <?= $dibongkar ?></h6>
                            </div>
                        </div>
                    </div>
                </li>

                <?php
                // var_dump($order->result());
                ?>

                <?php
                foreach ($order->result() as $data) {
                ?>

                    <li style="margin-bottom: -15px !important;">
                        <div style="margin-top: 0;" class="cart-box">
                            <div class="cart-left-box">
                                <div class="product-name">
                                    <h5>
                                        <a href="#"><?= $data->cust_name ?></a>
                                    </h5>
                                    <h6><?= $data->delivery_no ?></h6>
                                    <h6><?= $data->cust_addr1 ?></h6>
                                </div>
                            </div>
                            <div class="cart-right-box">
                                <button data-delivery-no="<?= $data->delivery_no ?>" data-cust-addr="<?= $data->cust_addr1 ?>" data-ship-to="<?= $data->ship_to ?>" data-order-id="<?= $data->order_id ?>" data-cust-name="<?= $data->cust_name ?>" class="remove-button btn btnTrackSPK">
                                    <i class="ri-road-map-line"></i>
                                </button>
                                <button data-delivery-no="<?= $data->delivery_no ?>" data-cust-addr="<?= $data->cust_addr1 ?>" data-ship-to="<?= $data->ship_to ?>" data-order-id="<?= $data->order_id ?>" data-cust-name="<?= $data->cust_name ?>" class="remove-button btn btnTrack">
                                    <i class="ri-edit-2-fill"></i>
                                </button>
                            </div>
                        </div>
                        <hr>
                    </li>

                <?php
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- Location Box Section End -->