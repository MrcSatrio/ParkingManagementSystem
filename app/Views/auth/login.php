<?= $this->extend('auth/template/index');

$this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-4">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                </div>
                                <?php if (session()->get('msg')) : ?>
                                    <div class="alert alert-danger">
                                        <?= session()->get('msg') ?>
                                    </div>
                                <?php endif ?>
                                <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <h4>Error</h4>
                                        </hr>
                                        <?php echo session()->getFlashdata('berhasil'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('salah')) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo session()->getFlashdata('salah'); ?>
                                    </div>
                                <?php endif; ?>
                                <form class="user" method="post" action="<?php echo base_url('/login') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="npm" placeholder="Npm" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url() ?>forgotpassword">Forgot Password</a><br>
                                    <a class="small" href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cek saldo</a>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cek Saldo Pengguna</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url() ?>ceksaldo" method="Post">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">NPM</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="npm" placeholder="Masukan NPM Anda" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Cek</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>