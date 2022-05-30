<?php namespace App\Models;

use CodeIgniter\Model;

class GotoviIzazoviModel extends Model
{
    protected $table      = 'gotovi_izazovi';
    protected $allowedFields = ['id_veze', 'id_kor', 'naziv', 'id_izazov', 'srce'];
    protected $primaryKey = 'id_veze';

}