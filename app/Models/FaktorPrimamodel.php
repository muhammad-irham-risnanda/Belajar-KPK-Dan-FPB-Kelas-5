<?php

namespace App\Models;

use CodeIgniter\Model;

class FaktorPrimaModel extends Model
{
    protected $table = 'faktor_prima';
    protected $primaryKey = 'id';
    protected $allowedFields = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'answer'];
}
