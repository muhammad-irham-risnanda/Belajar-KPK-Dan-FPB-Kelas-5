<?php

namespace App\Models;

use CodeIgniter\Model;

class FpbModel extends Model
{
    protected $table = 'fpb';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'];
}
