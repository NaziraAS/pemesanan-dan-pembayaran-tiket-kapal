<div class="container">
    <a href="<?= base_url('Admin/listPemesanan') ?>" class="btn btn-secondary"><i class="fas fa-long-arrow-alt-left"></i></a>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <?php if (!empty($gambar['gambar'])) : ?>
                    <img class="card-img-top" src="<?= base_url('sources/images/') . $gambar['gambar'] ?>" alt="Card image cap" width="200" height="430">
                    <!-- <input type="hidden" id="id" value="<?= $gambar['id'] ?>"> -->
                    <div id="id_pembayaran" data-id="<?= $gambar['id'] ?>"></div>
                <?php else : ?>
                    <h3 class="text-center">Gambar bukti pembayaran belum di upload</h3>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>