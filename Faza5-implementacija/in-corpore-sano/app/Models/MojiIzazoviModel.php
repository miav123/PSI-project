<?php namespace App\Models;

use CodeIgniter\Model;

class MojiIzazoviModel extends Model
{
    protected $table      = 'moji_izazovi';
    protected $allowedFields = ['id_veze', 'id_kor', 'id_izazov', 'dana_uzastopno_ispunjeno', 'propusteno'];
    protected $primaryKey = 'id_veze';

}