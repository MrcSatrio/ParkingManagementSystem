<?= $this->extend('template/index');

$this->section('page_content'); ?>

<div class='container'>
    <div class='card shadow mx-5 '>
        <h5 class="card-header">Tambah Data Mahasiswa</h5>
        <div class="card-body">

            <?= $success = session()->getFlashdata('success');
            // If there is flash data, display it in the form
            if ($success) {
                echo '<div class="alert alert-success mb-2">Data Berhasil Ditambah</div>';
            } ?>
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Error</h4>
                    </hr>
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url(); ?>keuangan/insert" method="post">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nomor Pokok Mahasiswa</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="npm" placeholder="cth. 2021320109"><br>
                    </div>
                    <input type="hidden" name="id_role" value="4">
                    <input type="hidden" name="password" value="ABCD1234">
                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-user" name="nama" placeholder="cth. binainsaniuniversity"><br>
                    </div>
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control form-control-user" name="email" placeholder="cth. binainsani@gmail.com"><br>
                    </div>
                    <label class="col-sm-3 col-form-label">Saldo</label>
                    <div class="col-sm-9">
                        <select name="saldo" class="form-control form-control-user" readonly>
                            <option value="50000" selected>Rp.50.000</option>
                        </select><br>
                    </div>
                    <label class="col-sm-3 col-form-label">Input Kartu Parkir</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control form-control-user" name="nomor_kartu" placeholder="Scan / masukan nomor manual"><br>
                    </div>
                    <div class="col-sm-3 mt-5 ">
                        <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button>
                    </div>
                </div>
            </form>
            </v>
        </div>
    </div>

    <?= $this->endSection(); ?>