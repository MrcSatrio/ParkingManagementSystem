<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'npm';

    protected $useAutoIncrement = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = ['npm', 'id_kartu', 'id_role', 'nama', 'password', 'created_at', 'updated_at'];

    public function getUser($npm)
    {
        return $this->where('npm', $npm)->first();
    }
}
