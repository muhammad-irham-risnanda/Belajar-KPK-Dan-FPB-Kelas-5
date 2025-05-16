<?php

namespace App\Models;

use CodeIgniter\Model;

class TimeLimitModel extends Model
{
    protected $table = 'time_limits';
    protected $primaryKey = 'id';
    protected $allowedFields = ['time_limit'];
}
