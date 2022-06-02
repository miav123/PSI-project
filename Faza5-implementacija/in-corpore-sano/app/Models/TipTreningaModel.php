<?php


namespace App\Models;

use CodeIgniter\Model;

class TipTreningaModel extends Model
{
    protected $table = 'tip_treninga';
    protected $allowedFields = ['id_tip', 'naziv', 'kcal_za_pola_sata_tren'];
    protected $primaryKey = 'id_tip';

}