<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <a class="nav-item nav-link disabled" href="#">Disabled</a>
            </div>
        </div>
    </div>
</nav>
<section id="reservasi">
    <div class="jumbotron">
        <div class="container">
            <h1>hallo</h1>
        </div>
    </div>
</section>
<div class="container mt-4">
    <form class="border p-5" action="<?= base_url('Menu/pesan/') . $jumlah ?>" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Daftar Tiket</label>
            <div class="row mb-3">
                <div class="col-md-2">Asal </div>
                <div class="col-md-2">Tujuan</div>
                <div class="col-md-4">Tanggal berangkat</div>
                <div class="col-md-2">Kelas</div>
                <div class="col-md-2">Harga</div>
            </div>
            <hr style="border:2px solid">
            <?php foreach ($data as $d) : ?>
                <div class="row">
                    <input type="hidden" name="jumlah" value="<?= $jumlah ?>"></input>
                    <input type="hidden" name="id" value="<?= $d['id'] ?>"></input>
                    <div class="col-md-2 <?= (isset($d['style']) == 'style') ? $d['style'] : ''; ?>"><?= $d['asal']; ?></div>
                    <div class="col-md-2"><?= $d['tujuan']; ?></div>
                    <div class="col-md-4"><?= $d['tglBerangkat']; ?></div>
                    <div class="col-md-2"><?= $d['kelas']; ?></div>
                    <div class="col-md-2"><?= $d['harga']; ?></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" class="btn btn-primary ml-auto">Pesan</button>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    </form>
</div>