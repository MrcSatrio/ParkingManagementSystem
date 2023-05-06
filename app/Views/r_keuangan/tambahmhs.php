<?= $this->extend('r_keuangan/template/index');

$this->section('page_content'); ?>

    <div class='container'>
        <div class='card o-hidden border-0 '>
            <div class="card-body p-0">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mt-3 mb-4">Tambah Data Mahasiswa</h1>
            </div>
            <form action="/register" method="post">
            <div class="form-group row">
                <div class="col-sm-7 mb-2 mb-sm-0">
                <label for="">Nomor Pokok Mahasiswa</label>
                    <input type="text" class="form-control form-control-user" name="npm"placeholder="">
                </div>
                <input type="hidden" name="nomor_kartu" value="0">
                <input type="hidden" name="saldo" value="0">
                <div class="col-sm-7 mt-2 mb-2 mb-sm-0">
                <label for="">Role</label><br>
                    <select name="id_role" class="form-control form-control-user" id="">
                        <option value="1">admin</option>
                        <option value="2">keuangan</option>
                        <option value="3">operator</option>
                        <option value="4">user</option>
                    </select>
                </div>
                <div class="col-sm-7 mt-2 mb-2 mb-sm-0">
                <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-user" name="nama"placeholder="">
                </div>
                <div class="col-sm-7 mt-2 mb-2 mb-sm-0">
                <label for="">Password</label>
                    <input type="password" class="form-control form-control-user" name="password"placeholder="">
                </div>
                <div class="col-sm-7 mt-5 ">
                <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button> 
                </div>
            </form>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>