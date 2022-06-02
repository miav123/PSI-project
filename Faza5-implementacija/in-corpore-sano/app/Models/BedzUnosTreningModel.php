<?php

namespace App\Models;
use CodeIgniter\Model;
class BedzUnosTreningModel extends Model {
    protected $table      = 'bedz_unos_trening';
    protected $allowedFields = ['id_bedz', 'idTipTren','vreme_tren'];
    protected $primaryKey = 'id_bedz';
}
