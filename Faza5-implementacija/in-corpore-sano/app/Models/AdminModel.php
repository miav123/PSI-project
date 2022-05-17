<?php namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'admin';
    protected $allowedFields = ['id_kor'];
    protected $primaryKey = 'id_kor';

}