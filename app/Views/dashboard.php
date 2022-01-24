<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-6">
                <h1 class="mt-5 text-pink">SIBOOK</h1>
                <div class="h5 text-secondary" style="font-family: Varela Round;">SISTEM INFORMASI BOOKING KARAOKE</div>
            </div>
        </div>
    </div>
    <div class="card mb-4 w-75 mx-auto my-4">
        <div class="card-header bg-pink text-white">
            <i class="fas fa-table me-1"></i>
            <?php date_default_timezone_set("Asia/Jakarta"); ?>
            TODAY (<?= date('d-m-Y'); ?>)
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead class="bg-light">
                    <tr>
                        <th>Ruangan</th>
                        <th>Waktu</th>
                        <th>Contact Person</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Ruangan</th>
                        <th>Waktu</th>
                        <th>Contact Person</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php date_default_timezone_set("Asia/Jakarta"); ?>
                    <?php foreach ($data2 as $data2) : ?>
                        <tr>
                            <td><?= ucwords($data2['nama_ruangan']); ?></td>
                            <td colspan="5" class="text-pink bg-light"><b>KOSONG</b></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($data as $data) : ?>
                        <tr>
                            <td><?= ucwords($data['nama_ruangan']); ?></td>
                            <td><?= $data['waktu_mulai'] . ' - ' . $data['waktu_berakhir']; ?></td>
                            <td><?= $data['kontak'] . ' (' . strtoupper($data['nama']) . ') '; ?></td>
                            <td><?= $data['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatablesSimple').DataTable({
            "order": [
                [0, "asc"],
                [2, "asc"]
            ],
        });

    });
</script>
<?= $this->endSection(); ?>