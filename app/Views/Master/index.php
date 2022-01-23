<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4 w-75">
    <h1 class="mt-4">MASTER</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success my-3" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan_error')) : ?>
        <div class="alert alert-success my-3" role="alert"><?= session()->getFlashdata('pesan_error'); ?></div>
    <?php endif; ?>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tambah Ruangan</li>
    </ol>
    <div class="d-flex my-3">
        <a href="/master/tambah" class="ms-auto btn btn-primary">TAMBAH</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Ruangan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="bg-pink text-white">
                    <tr>

                        <th>NAMA RUANGAN</th>
                        <th>TINDAKAN</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>

                        <th>NAMA RUANGAN</th>
                        <th>TINDAKAN</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($ruangan as $ruangan) : ?>
                        <tr>
                            <td><?= ucwords($ruangan['nama_ruangan']); ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="/master/ubah/<?= $ruangan['id_ruangan']; ?>" class="btn btn-warning">EDIT</a>
                                    <form action="/master//<?= $ruangan['id_ruangan']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');">HAPUS</button>
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