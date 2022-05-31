<?php
namespace App\Models;

use CodeIgniter\Model;
class BedzUnosHraneModel extends Model{
    protected $table      = 'bedz_unos_hrane';
    protected $allowedFields = ['id_bedz', 'kolicina_kcal'];
    protected $primaryKey = 'id_bedz';
}
