<?= $this->extend('template/index');

$this->section('page_content'); ?>

<div class="row justify-content-center">
    <div class="col-md-4">
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
                        <input type="number" class="form-control" placeholder="Masukkan Nomer Kartu" name="nomor_kartu">
                    </div>
                    <div class="text-center align-items-center h-200 d-flex">
                        <button type="submit" class="btn btn-outline-info flex-fill mx-2" name="nominal_transaksi" value="<?= $parkir_motor['nominal']; ?>">
                            <i class="fas fa-motorcycle"></i>
                            MOTOR
                        </button>
                        <button type="submit" class="btn btn-outline-info flex-fill mx-2" name="nominal_transaksi" value="<?= $parkir_mobil['nominal']; ?>">
                            <i class="fas fa-car"></i>
                            MOBIL
                        </button>
                    </div>
                    <input type="hidden" name="id_jenis_transaksi" value="3">
                    <input type="hidden" name="id_status_transaksi" value="2">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card border-info mb-3 shadow mx-2">
            <div class="card-body">
                <h4 class="card-title text-center">
                    <b>RIWAYAT PARKIR</b>
                </h4>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                <?php endif ?>
                <?= $this->include('r_operator/riwayat_transaksi_parkir'); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>