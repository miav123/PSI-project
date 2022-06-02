<?php namespace App\Models;

use CodeIgniter\Model;

class RegistrovaniKorisnikModel extends Model
{
    protected $table      = 'registrovani_korisnik';
    protected $allowedFields = ['id_kor', 'visina', 'tezina', 'br_tren', 'bodovi'];
    protected $primaryKey = 'id_kor';

}