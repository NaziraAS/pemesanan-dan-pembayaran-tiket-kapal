<nav class="navbar navbar-expand-lg navbar-info bg-info fixed-top mb-5">
    <div class="container">
        <a class="navbar-brand" href="#" id="brand">Tiket Kapal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <?php
                $email = $this->session->userdata('email');
                if ($email) {
                    $user = $this->db->get_where('user', ['email' => $email])->row_array();
                    $nama = $user['namalengkap'];
                ?>

                    <small id="emailHelp" class="form-text text-muted mr-3"><?= $nama ?></small>
                    <div class="dropdown show">
                        <i class="fas fa-user-circle fa-2x" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Log out</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <a class="btn btn-success my-2 my-sm-0 mr-2" href="<?= base_url('Auth') ?>">Login</a>
                    <a class="btn btn-success my-2 my-sm-0" type="submit" href="<?= base_url('Auth/register') ?>">Register</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>
<section id="reservasi">
    <!-- <div class="jumbotron"> -->
    <div class="container mt-5">
        <img src="<?= base_url('sources/images/dusan-veverkolog-dJMNeWvGrtY-unsplash.jpg') ?>" class="img-fluid rounded" alt="Responsive image">
    </div>
    <!-- </div> -->
</section>
<div class="container mt-4">
    <form class="border p-5" action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Daftar Tiket</label>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data as $d) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $d['tglBerangkat'] ?></td>
                            <td><?= $d['asal'] ?></td>
                            <td><?= $d['tujuan'] ?></td>
                            <td><?= $d['jam'] ?></td>
                            <td><?= $d['kelas'] ?></td>
                            <td><?= $d['jumlah'] ?></td>
                            <td><?= $d['harga'] ?></td>
                            <td>
                                <a href="<?= base_url('Menu/pesan/' . $d['id']) . '/' . $dewasa . '/' . $anak ?>" class="btn btn-primary">Pesan</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
</div>
<!-- <button class="btn btn-primary"><i class="far fa-comment-dots"></i></button> -->
<a href="<?= base_url('Chat') ?>" class="btn btn-lg btn-danger rounded-circle" style="position:fixed; right:20px; bottom:15px;">
    <span style="display: inline-block; margin:3px 0px 3px 0px; text-align:center; text-decoration:none;"><i class="far fa-comment-dots"></i></span>
</a>