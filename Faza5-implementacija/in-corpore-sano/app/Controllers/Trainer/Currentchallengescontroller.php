<?php


namespace App\Controllers\Trainer;

use App\Controllers\BaseController;
use App\Models\IzazovModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Type;


class Currentchallengescontroller extends \App\Controllers\BaseController
{
    public function index()
    {
        //echo view('templates/header-trainer/header.php');
        echo view('trener/CurrentChallenges.php');
        echo view('templates/footer/footer.php');
    }

    public function addChallenge(){
        //echo("FUNKCIJA KONTROLER");
        $id = $this->session->get('trenerId');
        //echo('USLI SMO1');
        //$username = $this->request->getVar('username');

//        $modelUser = new KorisnikModel();
//        $user = $modelUser->findUserId($id);
        $challenges =array();

        $modelChallenge = new IzazovModel();
        $allChallenges = $modelChallenge->findUserChallenges($id);

        foreach ($allChallenges as $challenge){
            if($challenge->izbrisan == 0) {
                //echo('USLI SMO');
                $today = new \DateTime("now");

//                $Date = new \DateTime($challenge['datum_dodavanja']);
//                $plusDays = $challenge['trajanje_u_danima']." days";
//                $DateNew=date_add($Date,date_interval_create_from_date_string($plusDays));
                //echo $stringDate = $DateNew->format('Y-m-d');
                //echo("\n");
                //echo ("IZAZOV TRAJE");
                $challenges[] = [
                    'id' => $challenge->id_izazov,
                    'type' => $challenge->tip_izazova,
                    'title' => $challenge->naziv,
                    'description' => $challenge->opis,
                    'points' => $challenge->br_poena,
                    'level' => $challenge->nivo,
                    'likes'=>$challenge->br_lajkova
                ];
                /*else{
                    //echo ("ISTEKAO IZAZOV");
                }*/
                //echo("\n");

            }
        }//aray to string
        echo json_encode($challenges);
    }

    public function deleteChallenge(){
        $challengeId = $this->request->getVar('challengeId');
        $challenge = new IzazovModel();
        $challenge->save([
            'id_izazov' => $challengeId,
            'izbrisan' => '1'
        ]);
        //echo ('IYBRISAN');
    }

}