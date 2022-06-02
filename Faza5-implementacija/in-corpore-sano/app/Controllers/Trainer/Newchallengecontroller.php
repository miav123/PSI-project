<?php


namespace App\Controllers\Trainer;

use App\Controllers\BaseController;
use App\Models\elena\IzazovModel;
use App\Models\elena\IzazovVodaModel;
use App\Models\elena\IzazovHranaModel;
use App\Models\elena\IzazovTreningModel;
use App\Models\elena\TipTreningaModel;
use App\Models\elena\TrenerModel;
use CodeIgniter\Model;
use App\Models\elena\KorisnikModel;


class Newchallengecontroller extends \App\Controllers\BaseController
{
    /**
     *
     * This controller enables the creation of a new challenge
     */
    public function index(){
        echo view('trener/NewChallenge.php');
        echo view('templates/footer/footer.php');
    }

    /**
     *
     * Author: Elena Vidic 2019/0081
     */
var $id_Challenge = 0;
    public function createChallenge(){

        $id = $this->session->get('trenerId');
        $type = $this->request->getVar('type');
        $name = $this->request->getVar('name');
        $description = $this->request->getVar('description');
        $points = $this->request->getVar('points');
        $duration = $this->request->getVar('duration');
        $level = $this->request->getVar('level');
        $today = new \DateTime("now");
        $stringDate = $today->format('Y-m-d');

        $newChallenge = new IzazovModel();

        $newChallenge->save([
            'id_tren' => $id,
            'naziv'=> $name,
            'opis'=> $description,
            'tip_izazova'=> $type,
            'br_poena'=> $points,
            'trajanje_u_danima'=> $duration,
            'nivo'=> $level,
            'br_lajkova'=> '0',
            'izbrisan'=> '0',
        ]);

    }

    /**
     *
     * Function createChallenge creates a new row in the table 'izazov'
     */

    public function dohvati(){
        $lastChallenge = new IzazovModel();
        $last = $lastChallenge->findlastChallenge();
        echo json_encode($last);
    }

    /**
     *
     * Function dohvati collects the last row (the most recently added challenge) from the table 'izazov',
     * and returns it encapsulated into a JSON object
     */

    public function getExTypes(){
        $tmp_tipTreninga=new TipTreningaModel();
        $my_types=$tmp_tipTreninga->getTypes();

        $data=[];
        $ind=0;

        foreach ($my_types as $list_item){
            $index=$list_item->id_tip;
            $info=$list_item->naziv;
            $data[$ind]=$index.";".$info;
            $ind++;

        }

        echo json_encode($data);
    }

    /**
     * @throws \ReflectionException
     * Function getExTypes collects types of challenges from the table 'tip_treninga',
     * and returns them encapsulated into a JSON object
     */


    public function addSpecifications(){
        $type = $this->request->getVar('type');
        $id = $this->request->getVar('izazov_id');
        $kolicinaMl = $this->request->getVar('amount_of_ml');
        $kolicinaKcal = $this->request->getVar('amount_of_kcal');
        $trajanjeVezbi = $this->request->getVar('amount_of_hours');
        $imeVezbe = $this->request->getVar('name_of_exercise');
        if($type=='water'){
            //echo("usli u if");
            $newWChallenge = new IzazovVodaModel();
            $newWChallenge->insert([
                'id_izazov' => $id,
                'kolicina_koju_treba_piti_svakog_dana'=> $kolicinaMl,
            ]);
        }
        else if($type=='food'){
            $newWChallenge = new IzazovHranaModel();
            $newWChallenge->insert([
                'id_izazov' => $id,
                'broj_kalorija_koje_treba_uneti_svakog_dana'=> $kolicinaKcal,
            ]);
        }
        else if($type=='train'){
            $newWChallenge = new IzazovTreningModel();
            $newTrainType = new TipTreningaModel();
            $typeTrain = $newTrainType->getNameofExercise($imeVezbe);
            if($typeTrain != null){
                $something =$typeTrain[0]->id_tip;
                echo($something);
                $newWChallenge->insert([
                    'id_izazov' => $id,
                    'id_tip' => $something,
                    'vreme_koje_treba_trenirati_svakog_dana'=> $trajanjeVezbi,
                ]);
            }

        }

    }

    /**
     *
     * Function addSpecifications adds a new row to the table 'izazov_voda' or 'izazov_hrana' or
     * 'izazov_trening' depending on the type of the challenge that is being made, (water challenge,
     * food challenge, train challenge).
     */

}