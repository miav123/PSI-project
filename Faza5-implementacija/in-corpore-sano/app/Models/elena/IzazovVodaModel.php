<?php
namespace App\Models\elena;

use CodeIgniter\Model;

class IzazovVodaModel extends \CodeIgniter\Model
{
    protected $table      = 'izazov_voda';
    protected $allowedFields = ['id_izazov', 'kolicina_koju_treba_piti_svakog_dana'];
    protected $primaryKey = 'id_izazov';
    protected $returnType = 'object';

}