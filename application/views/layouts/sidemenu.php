    <!-- Side Menu Offcanvas Start -->
    <div class="offcanvas offcanvas-start grocery-sidemenu" tabindex="-1" id="sideMenu">
        <div class="offcanvas-body">
            <div class="profile-box">
                <a href="#" class="profile-img">
                    <img src="<?= base_url() ?>/assets/images/grocery/user.png" class="img-fluid" alt="">
                </a>
                <div class="profile-content">
                    <?php
                    $user = 'Guest';
                    if ($this->session->userdata('tms_username')) {
                        $user = $this->session->userdata('tms_username');
                    }
                    ?>
                    <h4><?= $user ?></h4>
                </div>
            </div>

            <ul class="menu-list">
                <li>
                    <a onclick="loadingMenu()" href="<?= base_url('order') ?>"><i class="ri-file-list-2-line"></i> Orders</a>
                </li>
                <li>
                    <a onclick="loadingMenu()" href="<?= base_url('scan/qr') ?>"><i class="ri-qr-scan-2-line"></i> Scan SPK</a>
                </li>
                <li>
                    <a onclick="loadingMenu()" href="<?= base_url('search/address') ?>"><i class="ri-earth-fill"></i> Cari Alamat</a>
                </li>
            </ul>

            <a href="<?= base_url('auth/logout') ?>" class="sidebar-btn grocery-btn white-btn">Logout</a>
        </div>
    </div>
    <!-- Side Menu Offcanvas End -->

    <!-- Bootstrap js-->
    <script src="<?= base_url() ?>/assets/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- quantity js -->
    <script src="<?= base_url() ?>/assets/js/quantity.js"></script>

    <!-- Loader js -->
    <script src="<?= base_url() ?>/assets/js/loader.js"></script>

    <!-- Theme js-->
    <script src="<?= base_url() ?>/assets/js/script.js"></script>

    <!-- Jquery -->
    <script src="<?= base_url() ?>/assets/js/jquery-3.7.0.js"></script>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('<?= base_url() ?>service-worker.js')
                .then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                }).catch(function(error) {
                    console.log('Service Worker registration failed:', error);
                });
        }
    </script>
    <script>
        $(document).ready(function() {

        });
    </script>

    </body>

    </html>