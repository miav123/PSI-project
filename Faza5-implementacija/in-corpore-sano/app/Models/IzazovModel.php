<?php namespace App\Models;

use CodeIgniter\Model;

class IzazovModel extends Model
{
    protected $table      = 'izazov';
    protected $allowedFields = ['id_izazov', 'id_tren', 'naziv', 'opis', 'tip_izazova',
        'br_poena', 'trajanje_u_danima', 'nivo', 'br_lajkova', 'izbrisan'];
    protected $primaryKey = 'id_izazov';
    protected $returnType = 'object';
    public function  findUserChallenges($user){
        return $this->where('id_tren',$user)->findAll();
    }

    public function findlastChallenge(){
        return $this->limit(1)->orderBy('id_izazov', 'desc')->findAll();

    }

}