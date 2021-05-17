<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Features</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link" href="#">Disabled</a>
            </div>
            <button class="btn btn-success my-2 my-sm-0 mr-2 col-md-1" type="submit">Login</button>
            <button class="btn btn-success my-2 my-sm-0 col-md-1" type="submit">Register</button>
        </div>
    </div>
</nav>
<!-- jumbotron -->
<section>
    <div class="jumbotron jumbotron-fluid">
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
        <div class="col-md-6 pl-0">
            <img src="<?= base_url('/sources/images/colin-watts-p4r9XMowSkU-unsplash.jpg'); ?>" class="rounded" alt="...">
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
                    <div class="form-group col-md-4">
                        <label for="inputKelas">Kelas</label>
                        <select id="inputState" name="kelas" class="form-control" id="inputKelas">
                            <option>Ekonomi</option>
                            <option>Eksekutif</option>
                            <option>Vip</option>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group col-md">
                        <label for="inputKelas">Jumlah</label>
                        <select id="inputState" name="jumlah" class="form-control" id="inputKelas">
                            <?php $no = 0;
                            while ($no < 10) { ?>
                                <option value="<?= $no; ?>"><?= $no; ?></option>
                            <?php $no++;
                            } ?>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                    </div>
                </div>
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


<!-- Generated markup by the plugin -->
<div class="tooltip bs-tooltip-top" role="tooltip">
    <div class="arrow"></div>
    <div class="tooltip-inner">
        Some tooltip text!
    </div>
</div>
<!-- end tooltips -->