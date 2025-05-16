<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswafaktorprimaModel extends Model
{
    protected $table = 'siswa_faktor_prima'; // sesuaikan nama tabel di database kamu
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama', 'kelas', 'skor'];
}
