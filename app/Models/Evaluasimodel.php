<?php

namespace App\Models;

use CodeIgniter\Model;

class EvaluasiModel extends Model
{
    protected $table = 'evaluasi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer'
    ];
}
