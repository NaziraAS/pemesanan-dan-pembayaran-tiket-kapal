<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="flash" data-flashdata="<?= $this->session->flashdata('message') ?>"></div>
    <?php if ($this->session->flashdata('message')) { ?>
    <?php } ?>
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <a class="navbar-brand mr-auto" href="<?= base_url('Menu') ?>">menu</a>
        <div class="navbar-nav">
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-white small"><?= $user['namalengkap'] ?></span>
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
                    <a class="dropdown-item" href="<?= base_url('Pembayaran/listpesanan') ?>">
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
<div class="container mt-4">
    <div class="card mx-auto" style="width: 40rem;">
        <div class="card-header">
            Pesanan
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($list as $l) :
                $jumlah = $l['anak'] + $l['dewasa'];
            ?>
                <li class="list-group-item"><?= $l['asal'] . "&emsp;&emsp;" . $l['tujuan'] . "&emsp;&emsp;" . $l['tgl_pemesanan'] . "&emsp;&emsp;" . $l['nominal'] . "&emsp;&emsp;" . $jumlah . "&emsp;&emsp;" ?><a href="<?= base_url('Pemesanan/hapus/') . $l['id_pemesanan'] ?>" class="btn btn-danger hapus"><i class="fas fa-times"></i></a>&emsp;<a href="<?= base_url('Pembayaran/UploadBuktiPembayaran/') . $l['id_pemesanan'] ?>" class="btn btn-success">sudah bayar?</a></li>
            <?php endforeach; ?>
            <?php if ($list == null) : ?>
                <h4 class="text-center">Kosong</h4>
            <?php endif; ?>
        </ul>
    </div>
</div>