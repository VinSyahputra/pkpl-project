<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIBOOK</title>
    <link rel="icon" href="<?= base_url(); ?>/img/icon2.png" type="img/png">
    <!-- datatables -->
    <link href="<?= base_url(); ?>/css/datatables.css" rel="stylesheet" />
    <!-- custom style -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />

    <!-- fontawesome -->
    <script src="<?= base_url(); ?>/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>/timepicker/jquery.timepicker.min.css">
</head>

<body class="sb-nav-fixed">
    <!-- topbar -->
    <?= $this->include('Templates/Admin/topbar'); ?>
    <!-- end of topbar -->
    <div id="layoutSidenav">
        <!-- sidebar -->
        <?= $this->include('Templates/Admin/sidebar'); ?>
        <!-- end of sidebar -->
        <div id="layoutSidenav_content">
            <main>
                <?= $this->renderSection('content'); ?>
            </main>
        </div>
    </div>
    <script src="<?= base_url(); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/js/scripts.js"></script>
    <script src="<?= base_url(); ?>/js/simple-datatables.min.js"></script>
    <script src="<?= base_url(); ?>/js/datatables-simple-demo.js"></script>
</body>

</html>