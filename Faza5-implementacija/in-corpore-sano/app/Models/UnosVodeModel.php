<?php

namespace App\Models;

use CodeIgniter\Model;

class UnosVodeModel extends Model {
    protected $table      = 'unos_vode';
    protected $allowedFields = ['id_un', 'id_kor','datum','kolicina'];
    protected $primaryKey = 'id_un';
}
