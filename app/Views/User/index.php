<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4 w-75">
    <h1 class="my-4">USERS</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan_error')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan_error'); ?></div>
    <?php endif; ?>
    <div class="d-flex">
        <a href="/user/tambah" class="btn btn-primary ms-auto mb-3">TAMBAH</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Users
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="bg-pink text-white">
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>NAMA</th>
                        <th>USERNAME</th>
                        <th>Tindakan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $data) : ?>
                        <tr>
                            <td><?= $data['id_user']; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['username']; ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="/user/ubah/<?= $data['id_user']; ?>" class="btn btn-warning">Edit</a>
                                    <form action="/user//<?= $data['id_user']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');">hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>