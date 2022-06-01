<?php


namespace App\Controllers\Trainer;

use App\Controllers\BaseController;
use App\Models\IzazovModel;
use App\Models\IzazovVodaModel;
use App\Models\IzazovHranaModel;
use App\Models\IzazovTreningModel;
use App\Models\TipTreningaModel;
use App\Models\TrenerModel;
use CodeIgniter\Model;
use App\Models\KorisnikModel;

class Newchallengecontroller extends \App\Controllers\BaseController
{
    public function index(){
        echo view('trener/NewChallenge.php');
        echo view('templates/footer/footer.php');
    }
var $id_Challenge = 0;
    public function createChallenge(){

        echo('okej');

        $id = $this->session->get('trenerId');
/*['id_izazov', 'id_tren', 'naziv', 'opis', 'tip_izazova',
        'br_poena', 'trajanje_u_danima', 'nivo', 'br_lajkova', 'izbrisan', 'datum_dodavanja'];*/
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
        //$id_Challenge = $newChallenge['id_izazov'];
       // echo($newChallenge['id_izazov']);

    }
    public function dohvati(){
        $lastChallenge = new IzazovModel();
        $last = $lastChallenge->findlastChallenge();
        echo json_encode($last);
    }

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
                //'id_izazov', 'kolicina_koju_treba_piti_svakog_dana'
                'id_izazov' => $id,
                'kolicina_koju_treba_piti_svakog_dana'=> $kolicinaMl,
            ]);
        }
        else if($type=='food'){
//                            'amount_of_hours' : numofHours,
//                            'name_of_exercise' : nameofEx
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

}