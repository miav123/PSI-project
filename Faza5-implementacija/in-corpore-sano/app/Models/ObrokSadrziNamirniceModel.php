<?php

namespace App\Models;

use CodeIgniter\Model;

class ObrokSadrziNamirniceModel extends Model {
    protected $table      = 'obork_sadrzi_namirnice';
    protected $allowedFields = ['id_vez', 'id_obr','id_nam','kolicina_svake_nam_u_g'];
    protected $primaryKey = 'id_vez';
}
