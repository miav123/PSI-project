<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $allowedFields = ['id_kor', 'kor_ime', 'email', 'sifra', 'izbrisan'];
    protected $primaryKey = 'id_kor';

}