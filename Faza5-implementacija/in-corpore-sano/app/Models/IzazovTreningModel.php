<?php


namespace App\Models;

use CodeIgniter\Model;

class IzazovTreningModel extends \CodeIgniter\Model
{
    protected $table = 'izazov_trening';
    protected $allowedFields = ['id_izazov','id_tip', 'vreme_koje_treba_trenirati_svakog_dana'];
    protected $primaryKey = 'id_izazov';
    protected $returnType = 'object';

}