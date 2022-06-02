<?php namespace App\Models;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $allowedFields = ['id_kor', 'kor_ime', 'email', 'sifra', 'izbrisan'];
    protected $primaryKey = 'id_kor';
    protected $returnType ='object';

    public function  findUser($user){
        return $this->where('kor_ime',$user)->findAll();
    }
    public function  findUserPass($user){
        return $this->where('sifra',$user)->findAll();
    }
    public function  findUserId($user){
        return $this->where('id_kor',$user)->findAll();
    }

}