<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Models;

use CodeIgniter\Model;
class KorisnikBedzModel extends Model{
    protected $table      = 'korisnik_bedz';
    protected $allowedFields = ['id_veze', 'id_kor','id_bedz'];
    protected $primaryKey = 'id_veze';
}
