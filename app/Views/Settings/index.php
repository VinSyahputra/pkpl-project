<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>


<div class="mx-auto col-10 col-md-6 px-4 py-5">
    <div class="h3 mb-3">MASTER</div>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-warning" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>
    <div class="card">
        <h5 class="card-header">Edit data</h5>
        <div class="card-body">
            <form action="/auth/update/<?= $data['id_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label class="mt-2 mb-1" for="password">Password</label>
                    <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="password" name="password" value="<?= $data['password']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                    <div class="form-check px-4 py-2">
                        <input class="form-check-input" type="checkbox" id="checkboxShow">
                        <label class="form-check-label" for="checkboxShow">
                            Tampilkan Password
                        </label>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <button type="submit" class="btn bg-pink ms-auto">EDIT</button>
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