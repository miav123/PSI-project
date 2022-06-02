<?php namespace App\Models\elena;

use CodeIgniter\Model;

class TrenerModel extends Model
{
    protected $table      = 'trener';
    protected $allowedFields = ['id_kor'];
    protected $primaryKey = 'id_kor';
    protected $returnType = 'object';

}