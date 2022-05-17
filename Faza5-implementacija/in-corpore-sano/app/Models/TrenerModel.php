<?php namespace App\Models;

use CodeIgniter\Model;

class TrenerModel extends Model
{
    protected $table      = 'trener';
    protected $allowedFields = ['id_kor'];
    protected $primaryKey = 'id_kor';

}