<!-- Content Wrapper -->


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-auto mr-1" data-toggle="modal" data-target="#inputData"><i class="fas fa-download fa-sm text-white-50"></i>Insert Data Tiket</button>
    </div>

    <!-- start data table -->
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Keberangkatan</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Tujuan</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                foreach ($jadwal as $j) : ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $j['tglBerangkat'] ?></td>
                        <td><?= $j['asal'] ?></td>
                        <td><?= $j['tujuan'] ?></td>
                        <td><?= $j['kelas'] ?></td>
                        <td><?= $j['harga'] ?></td>
                        <td>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="<?= base_url('Admin/edit/') . $j['id'] ?>" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="<?= base_url('Admin/delete/') . $j['id'] ?>" class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                    $no++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- end data table -->

    <div class="row">
        <!-- Content Row -->
        <!-- modal insert data -->
        <!-- Modal input-->
        <div class="modal fade" id="inputData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- form insert data -->
                        <form action="<?= base_url('Admin/insert') ?>" method="post">

                            <div class="form-group">
                                <label for="tgl">Tanggal Keberangkatan</label>
                                <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Keberangkatan">
                                <?php echo form_error('tanggalkeberangkatan', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="asal">Asal</label>
                                    <input type="text" class="form-control" name="asal" id="asal" placeholder="Asal">
                                    <?php echo form_error('asal', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tujuan">Tujuan</label>
                                    <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan">
                                    <?php echo form_error('tujuan', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" id="kelas" class="form-control">
                                        <option selected>-Pilih-</option>
                                        <option value="ekonomi">Ekonomi</option>
                                        <option value="bisnis">Bisnis</option>
                                        <option value="vip">Vip</option>
                                    </select>
                                </div>
                                <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                                <div class="form-group col-md">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                                </div>
                                <?php echo form_error('harga', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                        <!-- end of insert data -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal insert data -->

    </div>
    <!-- End of Main Content -->