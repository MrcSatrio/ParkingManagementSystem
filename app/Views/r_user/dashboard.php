<?= $this->extend('template/index');

$this->section('page_content'); ?>

<h1>Sisa Saldo Anda Rp<?= number_format($user['saldo']) ?></h1>

<?= $this->endSection(); ?>