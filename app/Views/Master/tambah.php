<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>


<div class="mx-auto col-10 col-md-6 px-4 py-5">
    <div class="h3 mb-3">MASTER</div>
    <div class="card">
        <h5 class="card-header">Tambah data</h5>
        <div class="card-body">
            <form action="/master/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="mt-2 mb-1" for="nama">NAMA RUANGAN</label>
                    <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <button type="submit" class="btn bg-pink ms-auto" onclick="return confirm('Yakin Tambah Data ?');">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>