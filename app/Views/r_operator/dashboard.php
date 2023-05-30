<?= $this->extend('template/index');

$this->section('page_content'); ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-warning mb-3 shadow mx-2">
            <div class="card-body">
                <h4 class="card-title text-center">
                    <b>PEMBAYARAN PARKIR</b>
                </h4>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif ?>
                <form action="<?= base_url($user['nama_role']) ?>/check-out" method="post">
                    <div class="mb-3">
                        <label class="form-label"><b>No Kartu</b></label>
                        <input type="number" class="form-control" placeholder="Masukkan Nomer Kartu" name="nomor_kartu" required>

                    </div>
                    <div class="text-center align-items-center h-200 d-flex">
                        <button class="btn btn-outline-info flex-fill mx-2" name="jenis_kendaraan" value="">
                            <i class="fas fa-motorcycle"></i>
                            MOTOR
                        </button>
                        <button class="btn btn-outline-info flex-fill mx-2" name="jenis_kendaraan" value="mobil">
                            <i class="fas fa-car"></i>
                            MOBIL
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>