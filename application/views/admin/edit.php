<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
    <div class="row">
        <div class="col-md-6">
            <?php foreach ($edit as $e) :
            ?>
                <form action="<?= base_url('Admin/insertUpdate/') . $e['id'] ?>" method="post">
                    <input type="hidden" class="form-control" name="idEdit" value="">
                    <div class="form-group">
                        <label for="tgl">Tanggal Keberangkatan</label>
                        <input type="date" class="form-control" name="tglEdit" id="tgl" value="<?= $e['tglBerangkat'] ?>">
                        <?php echo form_error('tanggalkeberangkatan', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="asal">Asal</label>
                            <input type="text" class="form-control" name="asalEdit" id="asal" value="<?= $e['asal'] ?>">
                            <?php echo form_error('asal', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" name="tujuanEdit" id="tujuan" value="<?= $e['tujuan'] ?>">
                            <?php echo form_error('tujuan', '<div class="text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="kelas">Kelas</label>
                            <select name="kelasEdit" id="kelas" class="form-control">
                                <option selected><?= $e['kelas'] ?></option>
                                <option value="ekonomi">Ekonomi</option>
                                <option value="bisnis">Bisnis</option>
                                <option value="vip">Vip</option>
                            </select>
                        </div>
                        <?php echo form_error('kelas', '<div class="text-danger">', '</div>'); ?>
                        <div class="form-group col-md">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" name="hargaEdit" id="harga" value="<?= $e['harga'] ?>">
                        </div>
                        <?php echo form_error('harga', '<div class="text-danger">', '</div>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                <?php endforeach ?>
                </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- end modal update data -->

</div>
<!-- /.container-fluid -->