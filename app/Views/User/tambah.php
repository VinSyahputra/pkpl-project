<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>


<div class="mx-auto col-10 col-md-6 px-4 py-5">
    <div class="h3 mb-3">USER</div>
    <div class="card">
        <h5 class="card-header">Tambah data</h5>
        <div class="card-body">
            <form action="/user/save" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="mt-2 mb-1" for="nama">Nama</label>
                    <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="mt-2 mb-1" for="username">Username</label>
                    <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= old('username'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="mt-2 mb-1" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="defaultpass" readonly>
                    <small class="form-text text-muted">
                        Password yang digunakan adalah password default.
                    </small>
                    <div class="form-check px-4 py-2">
                        <input class="form-check-input" type="checkbox" id="checkboxShow">
                        <label class="form-check-label" for="checkboxShow">
                            Tampilkan Password
                        </label>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <button type="submit" class="btn bg-pink ms-auto" onclick="return confirm('Yakin Tambah Data ?');">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    let pass = document.querySelector('#password');
    let show = document.querySelector('#checkboxShow');

    show.addEventListener('click', e => {
        if (pass.type == 'password') {
            pass.setAttribute('type', 'text');
        } else {
            pass.setAttribute('type', 'password');
        }
    });
</script>
<?= $this->endSection(); ?>