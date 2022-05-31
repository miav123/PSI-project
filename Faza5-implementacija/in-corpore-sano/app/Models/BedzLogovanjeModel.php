<?php
namespace App\Models;

use CodeIgniter\Model;

class BedzLogovanjeModel extends Model {
     protected $table      = 'bedz_logovanje';
    protected $allowedFields = ['id_bedz'];
    protected $primaryKey = 'id_bedz';
}
