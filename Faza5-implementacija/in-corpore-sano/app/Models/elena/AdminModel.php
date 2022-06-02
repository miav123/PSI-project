<?php namespace App\Models\elena;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $allowedFields = ['id_kor'];
    protected $primaryKey = 'id_kor';

}