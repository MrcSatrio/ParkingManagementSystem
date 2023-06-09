<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $useTimestamps = true;

    protected $allowedFields =
    [
        'id_transaksi',
        'kodebooking_transaksi',
        'npm',
        'id_jenis_transaksi',
        'saldoawal_transaksi',
        'nominal_transaksi',
        'saldoakhir_transaksi',
        'id_status_transaksi',
        'created_at',
        'updated_at'
    ];
}
