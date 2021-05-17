<div class="card mx-auto mt-5" style="width: 18rem;">
    <div class="card-body text-center">
        <?= $this->session->flashdata('message') ?>
        <h5 class="card-title">Status Pembayaran</h5>
        <h6 class="card-subtitle mb-2 text-warning bg-primary">Pending</h6>
        <img src="" alt="" value="" width=" 200px" height="200px">
        <form action="<?= base_url('Pembayaran/upload'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="file" class="form-control-file" name="gambar" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>
</div>