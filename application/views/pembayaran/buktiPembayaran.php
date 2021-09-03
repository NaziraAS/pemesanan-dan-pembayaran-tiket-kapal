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
<div class="card mx-auto mt-5" style="width: 18rem;">
    <div class="card-body text-center">
        <?= $this->session->flashdata('message') ?>
        <h5 class="card-title">Status Pembayaran</h5>
        <h6 class="card-subtitle mb-2 text-warning bg-primary">Pending</h6>
        <img src="" alt="" value="" width=" 200px" height="200px">
        <form action="<?= base_url('Pembayaran/upload/') . $id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>
</div>
</div>