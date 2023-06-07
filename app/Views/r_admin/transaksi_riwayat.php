<?= $this->extend('template/index');

$this->section('page_content'); ?>

<div class="row justify-content-center">
    <div class="col">
        <div class="card shadow mx-2">
            <div class="card-header">
                Riwayat Transaksi
            </div>
            <div class="card-body">
                <div class="table-responsive-lg">
                    <table class="table table-hover">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Kode Booking</th>
                                <th>NIM</th>
                                <th>Jenis Transaksi</th>
                                <th>Saldo Awal</th>
                                <th>Nominal</th>
                                <th>Saldo Akhir</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
// Mengurutkan array transaksi berdasarkan created_at terbaru
usort($transaksi, function($a, $b) {
    return strtotime($b['created_at']) - strtotime($a['created_at']);
});

$i = 1; // Variabel penomoran

foreach ($transaksi as $tr) :
?>
    <tr>
        <td><?= $i++; ?></td>
        <td><?= $tr['kodebooking_transaksi']; ?></td>
        <td><?= $tr['npm']; ?></td>
        <td>
            <?php if ($tr['id_jenis_transaksi'] == 1) : ?>
                <span class="badge badge-info"><?= $tr['nama_jenis_transaksi']; ?></span>
            <?php elseif ($tr['id_jenis_transaksi'] == 2) : ?>
                <span class="badge badge-warning"><?= $tr['nama_jenis_transaksi']; ?></span>
            <?php elseif ($tr['id_jenis_transaksi'] == 3) : ?>
                <span class="badge badge-success"><?= $tr['nama_jenis_transaksi']; ?></span>
            <?php endif ?>
        </td>
        <td><?= number_format($tr['saldoawal_transaksi']); ?></td>
        <td><?= number_format($tr['nominal_transaksi']); ?></td>
        <td><?= number_format($tr['saldoakhir_transaksi']); ?></td>
        <td>
            <?php if ($tr['id_status_transaksi'] == 1) : ?>
                <span class="badge badge-danger"><?= $tr['nama_status_transaksi']; ?></span>
            <?php else : ?>
                <span class="badge badge-success"><?= $tr['nama_status_transaksi']; ?></span>
            <?php endif ?>
        </td>
        <td><?= $tr['updated_at']; ?></td>
    </tr>
<?php
endforeach;
?>

                        </tbody>
                    </table>
                    <?= $pager; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
