<?php


namespace App\Models\elena;

use CodeIgniter\Model;

class TipTreningaModel extends \CodeIgniter\Model
{
    protected $table = 'tip_treninga';
    protected $allowedFields = ['id_tip', 'naziv', 'kcal_za_pola_sata_tren'];
    protected $primaryKey = 'id_tip';
    protected $returnType='object';


    public function getTypes(){
        return $this->findAll();
        /**
         *
         * retrieving all types of training witch exist
         */
    }
    public function getNameofExercise($name){
        return $this->where('naziv',$name)->findAll();
        /**
         *
         * retrieving rows from the table that have the same name of the exercise
         */
    }
}