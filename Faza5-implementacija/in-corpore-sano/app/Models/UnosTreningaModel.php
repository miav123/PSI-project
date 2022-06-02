<?php

namespace App\Models;

use CodeIgniter\Model;

class UnosTreningaModel extends Model {
    protected $table      = 'unos_treninga';
    protected $allowedFields = ['id_un', 'id_kor','datum','vreme_trajanja','id_tip'];
    protected $primaryKey = 'id_un';     
}
