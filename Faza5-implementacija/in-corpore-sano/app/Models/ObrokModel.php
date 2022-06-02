<?php

namespace App\Models;

use CodeIgniter\Model;

class ObrokModel extends Model {
    protected $table      = 'obrok';
    protected $allowedFields = ['id_obr','naziv'];
    protected $primaryKey = 'id_obr';
}
