<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <!-- <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Features</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link" href="#">Disabled</a> -->
            </div>
            <?php if ($user) : ?>
                <small class="form-text mr-3 text-light"><?= $user['namalengkap'] ?></small>
                <div class="dropdown show">
                    <i class="fas fa-user-circle fa-2x text-light" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="<?= base_url('Pemesanan/listpesanan') ?>">Pesanan</a>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Log out</a>
                    </div>
                </div>
            <?php else : ?>
                <a class="btn btn-success my-2 my-sm-0 mr-2" href="<?= base_url('Auth') ?>">Login</a>
                <a class="btn btn-success my-2 my-sm-0" type="submit" href="<?= base_url('Auth/register') ?>">Register</a>
            <?php endif; ?>

        </div>
    </div>
</nav>
<!-- jumbotron -->
<section>
    <div class="jumbotron jumbotron-fluid" style="margin-bottom: -20px;">
        <div class="container">
            <h1>Traveling With Us</h1>
            <h3>Enjoy The Trip</h3>
        </div>
    </div>
</section>
<!-- akhir jumbotron -->
<!-- input data info -->
<div class="container">
    <div class="row kotak">
        <div class="col-md-6">
            <img src="<?= base_url('./sources/images/jumbotron.jpg'); ?>" class="rounded img-fluid" alt="...">
        </div>
        <!-- kotak kiri -->
        <div class=" col-md-6 p-5">
            <form action="<?= base_url('Menu') ?>" method="post">
                <div class="row mt-2">
                    <div class="col-md">
                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="asal">Asal</label>
                                <input type="text" class="form-control" name="asal" id="asal">
                                <?php echo form_error('asal', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group col-md">
                                <label for="tujuan">Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" id="tujuan">
                                <?php echo form_error('tujuan', '<div class="text-danger">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputTanggal">Tanggal Keberangkatan</label>
                        <input type="date" class="form-control" name="tanggal" id="inputTanggal" autocomplete="off">
                        <?php echo form_error('tanggal', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md">
                        <label for="inputKelas">Kelas</label>
                        <select id="inputState" name="kelas" class="form-control" id="inputKelas">
                            <option>-Pilihan-</option>
                            <option>Ekonomi</option>
                            <option>Eksekutif</option>
                            <option>Vip</option>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
                <!-- input jumlah -->
                <div class="form-row">
                    <div class="form-group col-md">
                        <label for="inputKelas">Dewasa</label>
                        <select id="inputState" name="dewasa" class="form-control" id="inputKelas">
                            <?php $no = 0;
                            while ($no < 10) { ?>
                                <option value="<?= $no; ?>"><?= $no; ?></option>
                            <?php $no++;
                            } ?>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md">
                        <label for="inputKelas">Anak-anak</label>
                        <select id="inputState" name="anak" class="form-control" id="inputKelas">
                            <?php $no = 0;
                            while ($no < 10) { ?>
                                <option value="<?= $no; ?>"><?= $no; ?></option>
                            <?php $no++;
                            } ?>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                        <small id="emailHelp" class="form-text text-muted">Umur < 16 Tahun</small>
                    </div>
                </div>
                <!-- input jumlah -->
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary mt-3">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<!-- akhir input data -->
</div>
</div>
</div>
<!-- <div class="container mt-5">
    <h4 class="text-center">Gallery</h4>
    <div class="row">
        <div class="col-md-4">
            <img src="<?= base_url('/sources') ?>/images/colin-watts-p4r9XMowSkU-unsplash.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-md-4">
            <img src="<?= base_url('/sources') ?>/images/colin-watts-p4r9XMowSkU-unsplash.jpg" alt="..." class="img-thumbnail">
        </div>
        <div class="col-md-4">
            <img src="<?= base_url('/sources') ?>/images/colin-watts-p4r9XMowSkU-unsplash.jpg" alt="..." class="img-thumbnail">
        </div>
    </div>
</div> -->
<!-- tooltips -->
<!-- HTML to write -->
<div class="btn btn-lg btn-danger rounded-circle" style="position:fixed; right:20px; bottom:15px;">
    <span style="display: inline-block; width:14px;" title="User Guide" data-toggle="modal" data-target="#exampleModal">?</span>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cara Pesan Tiket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Silahkan masukkan asal, tujuan, tanggal keberangkatan, kelas, dewasa dan anak untuk mencari tiket</li>
                    <li>hasil pencarian akan di tampilkan jika di halaman reservasi, sesuai dengan yang di cari.</li>
                    <li>setalah tiket yang di cari ada, maka akan lanjut ke halaman memasukkan data penumpang.</li>
                    <li>setelah selesai, lanjut ke halaman pembayaran dengan nominal yang telah di tentukan.</li>
                    <li>Kemudian, upload bukti pembayaran dan tunggu hingga status pembayaran menjadi sukses</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal user guide -->