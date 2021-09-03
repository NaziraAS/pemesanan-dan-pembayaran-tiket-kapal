<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Pemesanan</h1>
    <!-- content -->
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Pemesanan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($details as $detail) : ?>

                    <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $detail['kode_pemesanan'] ?></td>
                        <td><?= $detail['nama'] ?></td>
                        <td><?= $detail['alamat'] ?></td>
                        <td><?= $detail['no_telpon'] ?></td>
                        <td><?= $detail['jenis_kelamin'] ?></td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('Admin/listPemesanan') ?>" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i></a>
    </div>
</div>
<!-- /.container-fluid -->