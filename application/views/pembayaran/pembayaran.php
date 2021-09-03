<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-white small">Douglas McGee</span>
                    <img class="img-profile rounded-circle" src="<?= base_url('sources/sbadmin/') ?>img/undraw_profile.svg" width="30">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a> -->
                    <a class="dropdown-item" href="<?= base_url('Pemesanan/listpesanan') ?>">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pesanan
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </div>
</nav>
<section id="pembayaran">
    <div class="container mt-5">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-body text-center">
                <img src="<?= base_url('sources/images/bri.png') ?>" alt="" width="200px" height="160px">
                <h5 class="card-title mt-2">No. BRI Virtual Account</h5>
                <h6 class="card-subtitle mb-2 text-muted">177-0009-000-9999-000</h6>
                <h3 id="nominal"><?= $nominal['nominal'] ?></h3>
                <p class="card-text">Lakukan pembayaran sampai dengan</p>
                <!-- <input type="hidden" id="idpemesanan" value="<?= $idpemesanan ?>"></input> -->
                <h5 class="card-title mt-2" id="view"></h5>
                <a href="<?= base_url('Pembayaran/UploadBuktiPembayaran/') . $nominal['id_pemesanan'] ?>" class="card-link">Sudah Bayar?</a>
            </div>
        </div>
    </div>
</section>