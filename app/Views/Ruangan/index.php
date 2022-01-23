<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid px-4">
    <h1 class="my-4"><?= strtoupper($nama_ruangan); ?></h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('pesan_error')) : ?>
        <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan_error'); ?></div>
    <?php endif; ?>
    <div class="d-flex">
        <a href="/ruangan/tambah/<?= $nama_ruangan; ?>" class="btn btn-primary ms-auto mb-3">TAMBAH</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Kegiatan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="bg-pink">
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Contact Person</th>
                        <th>Keterangan</th>
                        <th class="tindakan">Tindakan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Contact Person</th>
                        <th>Keterangan</th>
                        <th class="tindakan">Tindakan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data as $data) : ?>
                        <tr>
                            <td><?= date_format(date_create($data['tanggal']), 'd-m-Y'); ?></td>
                            <td><?= $data['waktu_mulai'] . ' - ' . $data['waktu_berakhir']; ?></td>
                            <td><?= $data['kontak'] . ' (' . strtoupper($data['nama']) . ') '; ?></td>
                            <td><?= $data['keterangan']; ?></td>
                            <td>
                                <?php if (session()->get('level') == 2) : ?>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="/ruangan/ubah/<?= $nama_ruangan; ?>/<?= $data['id']; ?>" class="btn btn-warning">Edit</a>
                                        <form action="/ruangan//<?= $data['id']; ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');">hapus</button>
                                        </form>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->get('level') != 2) : ?>
                                    <?php if (session()->get('id') == $data['id_user']) : ?>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <a href="/ruangan/ubah/<?= $nama_ruangan; ?>/<?= $data['id']; ?>" class="btn btn-warning">Edit</a>
                                            <form action="/ruangan//<?= $data['id']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" onclick="return confirm('Yakin Hapus Data ?');">hapus</button>
                                            </form>

                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTable.moment('DD/MM/YYYY');
        $('#datatablesSimple').DataTable({
            "columnDefs": [{
                "targets": 'tindakan',
                "orderable": false,
            }, ],

        });

    });
</script>
<?= $this->endSection(); ?>