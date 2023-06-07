<?= $this->extend('template/index');
$this->section('page_content'); ?>

<div class="card shadow mx-2" style="width: auto;">
    <div class="card-body">
        <h1 class="card-title text-center">Input Kode Booking</h1>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif ?>
        <form action="<?= base_url() ?>keuangan/transaksi_validasiinputkodebooking" method="Post">
            <div class="mb-3">
                <label class="form-label"><b>KODE BOOKING</b></label>
<<<<<<< HEAD
                <input type="text" class="form-control" placeholder="6 Digit Campuran Angka Dan Huruf Besar" name="kodebooking_transaksi" max="5" required title="Harap Isi Kode Booking Terlebih Dahulu" autofocus>
=======
                <input type="text" class="form-control" placeholder="6 Digit Campuran Angka Dan Huruf Besar" name="kodebooking_transaksi" max="5" required title="Harap Isi Kode Booking Terlebih Dahulu">
>>>>>>> dbb67e3273eef7bff4a1fc456c3cc1b6c9ba7636
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>