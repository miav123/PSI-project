<?php

namespace App\Models;

use CodeIgniter\Model;

class UnosHraneModel extends Model {
    protected $table      = 'unos_hrane';
    protected $allowedFields = ['id_un', 'id_kor','datum','id_obr'];
    protected $primaryKey = 'id_un';
}


