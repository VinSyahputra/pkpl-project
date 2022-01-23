<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SIBOOK</title>
    <link rel="icon" href="<?= base_url(); ?>/img/icon2.png" type="img/png">
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" />
    <script src="<?= base_url(); ?>/fontawesome/js/all.min.js"></script>
</head>

<body class="bg-pink text-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center pt-3">
                        <div class="col-lg-5 mt-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-2">
                                <div class="card-header">
                                    <h4 class="text-center font-weight-light my-4">LOGIN <br> BOOKING KARAOKE</h4>
                                </div>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="card-body">
                                    <form action="login_validation" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''; ?>" id="username" type="text" placeholder="johndoe" name="username" autocomplete="off" autofocus />
                                            <label for="username">Username</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('username'); ?>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''; ?>" id="inputPassword" type="password" placeholder="Password" name="password" />
                                            <label for="inputPassword">Password</label>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="form-check px-4 py-2">
                                            <input class="form-check-input" type="checkbox" id="checkboxShow">
                                            <label class="form-check-label" for="checkboxShow">
                                                Tampilkan Password
                                            </label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn bg-pink ms-auto text-white" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="<?= base_url(); ?>/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/js/scripts.js"></script>
</body>
<script>
    let pass = document.querySelector('#inputPassword');
    let show = document.querySelector('#checkboxShow');

    show.addEventListener('click', e => {
        if (pass.type == 'password') {
            pass.setAttribute('type', 'text');
        } else {
            pass.setAttribute('type', 'password');
        }
    });
</script>

</html>