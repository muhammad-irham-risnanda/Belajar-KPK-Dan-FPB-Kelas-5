<?php

namespace App\Models;

use CodeIgniter\Model;

class KpkModel extends Model
{
    protected $table = 'kpk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'];
}
