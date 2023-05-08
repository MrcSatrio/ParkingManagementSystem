<?= $this->extend('r_user/template/index');

$this->section('page_content'); ?>

<div class='container'>
        <div class='card o-hidden border-10 '>
            <div class="card-body p-6">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mt-3 mb-4">Edit Password</h1>
            </div>
            
            <form action="/register" method="post">
            <div class="form-group row">
                
                <div class="col-sm-7 mb-2 mb-sm-0">
                
                <label for="">Nomor Pokok Mahasiswa</label>
                <?= $success = session()->getFlashdata('error_npm'); 
                // If there is flash data, display it in the form
                if ($success) {
                    echo '<div class="badge badge-pill badge-danger mb-2">NPM harus terdiri dari minimal 10 angka</div>';
                }?>
                    <input type="text" class="form-control form-control-user" value="<?= $user['npm']; ?>" name="npm"placeholder="" disabled required>
                </div>
                <input type="hidden" name="nomor_kartu" value="0">
                <input type="hidden" name="saldo" value="0">

                <div class="col-sm-7 mt-2 mb-2 mb-sm-0">
                <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-user" value= "<?= $user['nama'] ?>" name="nama"placeholder="" disabled required>
                </div>
                <div class="col-sm-7 mt-2 mb-2 mb-sm-0">
                <?= $success = session()->getFlashdata('error_pass'); 
                // If there is flash data, display it in the form
                if ($success) {
                    echo '<div class="badge badge-pill badge-danger mb-2">Password harus terdiri dari minimal 8 huruf dan harus mengandung unsur huruf dan angka</div>';
                }?>
                <label for="">Ubah Password Baru</label>
                    <input type="password" class="form-control form-control-user" name="password" value="" placeholder="Masukan Password Baru" required>
                </div>
                <div class="col-sm-7 mt-5 ">
                <button type="submit" class="btn btn-primary btn-user btn-block">Ubah</button> 
                </div>
            </form>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>