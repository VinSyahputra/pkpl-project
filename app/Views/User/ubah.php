<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>


<div class="mx-auto col-10 col-md-6 px-4 py-5">
    <div class="h3 mb-3">USER</div>
    <div class="card">
        <h5 class="card-header">Ubah data</h5>
        <div class="card-body">
            <form action="/user/update/<?= $data['id_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="mt-2 mb-1" for="nama">Nama</label>
                    <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $data['nama'] ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <input type="hidden" class="form-control" id="password" name="password" value="<?= $data['password'] ?>">
                    <button type="reset" class="btn btn-danger mt-3 mb-1 d-block" id="reset">Reset Password</button>

                    <small class="form-text text-muted">
                        *Reset password akan membuat password user menjadi default.
                    </small>
                </div>
                <div class="d-flex mt-3">
                    <button type="submit" class="btn bg-pink ms-auto" onclick="return confirm('Yakin Ubah Data ?');">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const btnReset = document.querySelector('#reset');
    let pass = document.querySelector('#password');

    btnReset.addEventListener('click', e => {
        if (confirm('Yakin untuk reset password user ?')) {
            pass.setAttribute('value', 'defaultpass');
            setTimeout(() => {
                alert('Reset password berhasil.')
            }, 400);
            e.preventDefault();
        }
    });
</script>

<?= $this->endSection(); ?>