<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;

use CodeIgniter\Model;
class BedzUnosVodeModel extends Model{
    protected $table      = 'bedz_unos_vode';
    protected $allowedFields = ['id_bedz', 'kolicina_vode'];
    protected $primaryKey = 'id_bedz';
}
