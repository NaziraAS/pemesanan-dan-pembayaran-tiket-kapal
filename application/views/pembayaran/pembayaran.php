<section id="pembayaran">
    <div class="container mt-5">
        <div class="card mx-auto" style="width: 30rem;">
            <div class="card-body text-center">
                <img src="<?= base_url('sources/images/bri.png') ?>" alt="" width="200px" height="160px">
                <h5 class="card-title mt-2">No. BRI Virtual Account</h5>
                <h6 class="card-subtitle mb-2 text-muted">177-0009-000-9999-000</h6>
                <h3><?= $nominal ?></h3>
                <p class="card-text">Lakukan pembayaran sampai dengan</p>
                <h5 class="card-title mt-2" id="jam"></h5>
                <a href="<?= base_url('Pembayaran/UploadBuktiPembayaran') ?>" class="card-link">Sudah Bayar?</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</section>