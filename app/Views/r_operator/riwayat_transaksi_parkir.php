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
                                <th>Saldo Awal</th>
                                <th>Nominal</th>
                                <th>Saldo Akhir</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
usort($riwayat, function($a, $b) {
    return strtotime($b['updated_at']) - strtotime($a['updated_at']);
});
 foreach ($riwayat as $i => $tr) : ?>
    <tr>
        <td><?= $i + 1; ?></td>
        <td><?= $tr['kodebooking_transaksi']; ?></td>
        <td><?= $tr['npm']; ?></td>
        <td><?='Rp ' .number_format($tr['saldoawal_transaksi'], 0, ',', '.'); ?></td>
<td><?='Rp ' . number_format($tr['nominal_transaksi'], 0, ',', '.'); ?></td>
<td><?='Rp ' . number_format($tr['saldoakhir_transaksi'], 0, ',', '.'); ?></td>

        <td <?php if ($tr['id_status_transaksi'] == "2") { echo 'class="badge badge-success"'; } ?>>
            <?= ($tr['id_status_transaksi'] == "2") ? 'COMPLETE' : ''; ?>
        </td>
        <td><?= $tr['updated_at']; ?></td>
    </tr>
<?php endforeach; ?>



                        </tbody>
                    </table>
                     <?= $pager; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
