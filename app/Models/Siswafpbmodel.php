<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaFpbModel extends Model
{
    protected $table = 'siswa_fpb';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kelas', 'skor'];
}
