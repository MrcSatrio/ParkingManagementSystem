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
                            <?php if(session()->get('msg')): ?>
		                    <div>
		                	    <?php echo session()->get('msg') ?>
		                    </div>
	                            <?php endif; ?>
                                <form method="post" action="<?php echo base_url('/login') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="npm" aria-describedby="emailHelp"
                                        placeholder="Npm">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        name="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                            </form>
                            <div class="text-center">
                                <a class="small" href="/regist">Forgot Password</a>
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