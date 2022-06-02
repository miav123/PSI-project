<?php


namespace App\Models;

use CodeIgniter\Model;

class IzazovHranaModel extends \CodeIgniter\Model
{
    protected $table = 'izazov_hrana';
    protected $allowedFields = ['id_izazov', 'broj_kalorija_koje_treba_uneti_svakog_dana'];
    protected $primaryKey = 'id_izazov';

}
