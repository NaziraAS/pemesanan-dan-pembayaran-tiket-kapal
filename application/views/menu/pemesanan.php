<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row rounded-1">
        <div class="col-md-7">
            <h3>Customer Details</h3>
            <form action="<?= base_url('Pemesanan/simpan') ?>" method="post">
                <?php
                for ($i = 0; $i < $jumlah; $i++) { ?>
                    <div class="row">
                        <div class="col-md">
                            <div class="card mt-4 border-warning">
                                <div class="card-body">
                                    <input type="hidden" id="jumlah-form" value="2">
                                    <label for="namaLengkap">Nama Lengkap</label>
                                    <input class="form-control form-control-sm" id="nama" name="nama[]" type="text" placeholder="Nama Lengkap">

                                    <label for="noTelpon">No. Telephone</label>
                                    <input class="form-control form-control-sm" name="noTelpon[]" id="noTelpon" type="text" placeholder="No Hp">

                                    <label for="exampleFormControlInput1">Jenis Kelamin</label><br>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <!-- <input type="radio" id="customRadioInline1" name="jenisKelamin[]" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1">Laki-laki</label> -->
                                        <select class="form-control form-control-sm" name="jenisKelamin[]">
                                            <option>- Pilih -</option>
                                            <option value="laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <!-- <input type="radio" id="customRadioInline2" name="jenisKelamin[]" value="perempuan" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2">Perempuan</label> -->

                                    </div><br>

                                    <label for="exampleFormControlInput1">Alamat</label>
                                    <input class="form-control form-control-sm" type="text" name="alamat[]" placeholder="Alamat">

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-md mb-3 mt-3 ml-3 text-right">
                    <button type="submit" class="btn btn-primary" name="bayar" id="bayar">Bayar</button>
                </div>
                <!-- </form> -->
        </div>
        <div class="col-md">
            <div class="card mt-4 border-warning">
                <div class="card-body">
                    <h3>Detail Tiket</h3>
                    <!-- <form action="<?= base_url('Pembayaran/simpan') ?>" method="post"> -->
                    <?php foreach ($detail as $d) : ?>
                        <div class="row">
                            <div class="col-md">
                                <label for="asal">Asal</label>
                                <input type="text" class="form-control" value="<?= $d['asal'] ?>" name="asal" id="asal" readonly>
                            </div>
                            <div class="col-md">
                                <label for="tujuan">Tujuan</label>
                                <input type="text" class="form-control" value="<?= $d['tujuan'] ?>" name="tujuan" id="tujuan" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="tgl">Tanggal</label>
                                <input type="text" class="form-control" value="<?= $d['tglBerangkat'] ?>" name="tglBerangkat" id="tgl" readonly>
                            </div>
                            <div class="col-md">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" value="<?= $d['kelas'] ?>" name="kelas" id="kelas" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label for="jumlah">Jumlah orang</label>
                                <input type="text" class="form-control" value="<?= $d['jumlah_pesanan'] ?>" id="jumlah" readonly>
                            </div>
                            <div class="col-md-2 mt-3">
                                <label for="kali"></label>
                                <input type="text" class="form-control mt-2" id="kali" readonly value="X">
                            </div>
                            <div class="col-md-5">
                                <label for="harga">Harga tiket</label>
                                <input type="text" class="form-control" value="<?= $d['harga'] ?>" id="harga" readonly>
                            </div>
                        </div>
                        <?php
                        $total = $d['harga'] * $d['jumlah_pesanan'];
                        ?>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="total">Total</label>
                                <input type="text" class="form-control" value="<?= $total ?>" id="total" name="total" readonly>
                            </div>
                        </div>
                    <?php endforeach ?>
                    <input type="hidden" name="bayar"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>