<?php

namespace App\Models;

use CodeIgniter\Model;

class NamirnicaModel extends Model {
    protected $table      = 'namirnica';
    protected $allowedFields = ['id_nam', 'naziv','kcal_na_100g'];
    protected $primaryKey = 'id_nam';
}
