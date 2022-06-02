<?php namespace App\Models\elena;

use CodeIgniter\Model;

class KorisnikModel extends Model
{
    protected $table      = 'korisnik';
    protected $allowedFields = ['id_kor', 'kor_ime', 'email', 'sifra', 'izbrisan'];
    protected $primaryKey = 'id_kor';
    protected $returnType ='object';

    public function  findUser($user){
        return $this->where('kor_ime',$user)->findAll();
        /**
         *
         * retrieving all users that have the same username
         */
    }
    public function  findUserPass($user){
        return $this->where('sifra',$user)->findAll();
        /**
         *
         * retrieving all users that have the same password
         */
    }
    public function  findUserId($user){
        return $this->where('id_kor',$user)->findAll();
        /**
         *
         * retrieving all users that the same id
         */
    }

}