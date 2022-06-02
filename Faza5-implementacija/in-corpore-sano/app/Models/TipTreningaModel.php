<?php


namespace App\Models;

use CodeIgniter\Model;

class TipTreningaModel extends \CodeIgniter\Model
{
    protected $table = 'tip_treninga';
    protected $allowedFields = ['id_tip', 'naziv', 'kcal_za_pola_sata_tren'];
    protected $primaryKey = 'id_tip';
    protected $returnType='object';


    public function getTypes(){
        return $this->findAll();
    }
    public function getNameofExercise($name){
        return $this->where('naziv',$name)->findAll();
    }
}