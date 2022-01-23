<?= $this->extend('Templates/Admin/index'); ?>
<?= $this->section('content'); ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<div class="mx-auto col-10 col-md-6 px-4 py-5">
    <div class="h3 mb-3">Ruang <?= $nama_ruangan; ?></div>
    <div class="card">
        <h5 class="card-header">Ubah data</h5>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
        <?php endif; ?>
        <div class="card-body">
            <form action="/Ruangan/update/<?= $nama_ruangan; ?>/<?= $data['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_ruangan" value="<?= $id['id_ruangan']; ?>">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">

                <div class="input-group justify-content-between">
                    <div class="form-group">
                        <label class="mt-2 mb-1" for="tanggal">Tanggal</label>
                        <input type="date" class="form-control <?= $validation->hasError('tanggal') ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mt-2 mb-1" for="cp">Contact Person</label>
                        <input type="text" class="form-control <?= $validation->hasError('cp') ? 'is-invalid' : ''; ?>" id="cp" name="cp" value="<?= $data['kontak']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('cp'); ?>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="mt-2 mb-1" for="waktu_mulai">Waktu Mulai</label>
                    <input type="text" class="timepicker form-control <?= $validation->hasError('waktu_mulai') ? 'is-invalid' : ''; ?>" id="waktu_mulai" name="waktu_mulai" value="<?= $data['waktu_mulai']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('waktu_mulai'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="mt-2 mb-1" for="waktu_berakhir">Waktu Berakhir</label>
                    <input type="text" class="timepicker form-control <?= $validation->hasError('waktu_berakhir') ? 'is-invalid' : ''; ?>" id="waktu_berakhir" name="waktu_berakhir" value="<?= $data['waktu_berakhir']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('waktu_berakhir'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="mt-2 mb-1" for="keterangan">Keterangan</label>
                    <input type="text" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" value="<?= $data['keterangan']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('keterangan'); ?>
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <button type="submit" class="btn bg-pink ms-auto" onclick="return confirm('Yakin Ubah Data ?');">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $(function() {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        // or instead:
        // var maxDate = dtToday.toISOString().substr(0, 10);

        $('#tanggal').attr('min', maxDate);
    });

    $(document).ready(function() {
        $('input.timepicker').timepicker({
            timeFormat: 'HH:mm',
            interval: 30,
            dynamic: true,
        });
    });
</script>
<?= $this->endSection(); ?>