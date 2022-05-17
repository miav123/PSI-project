<?php namespace App\Models;

use CodeIgniter\Model;

class IzazovModel extends Model
{
    protected $table      = 'izazov';
    protected $allowedFields = ['id_izazov', 'id_tren', 'naziv', 'opis', 'tip_izazova', 'br_poena', 'trajanje_u_danima', 'nivo', 'br_lajkova', 'izbrisan'];
    protected $primaryKey = 'id_izazov';

}