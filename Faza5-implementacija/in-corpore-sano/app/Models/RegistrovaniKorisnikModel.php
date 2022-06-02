<?php namespace App\Models;

use CodeIgniter\Model;

class RegistrovaniKorisnikModel extends Model
{
    protected $table      = 'registrovani_korisnik';
    protected $allowedFields = ['id_kor', 'visina', 'tezina', 'br_tren', 'bodovi', 'datum_posl_logovanja', 'br_uzast_logovanja', 'url_profilne_slike'];
    protected $primaryKey = 'id_kor';

}