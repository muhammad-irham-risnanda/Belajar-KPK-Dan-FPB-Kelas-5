<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaevaluasiModel extends Model
{
    protected $table = 'siswa_evaluasi'; // sesuaikan nama tabel
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'kelas', 'skor'];
}
