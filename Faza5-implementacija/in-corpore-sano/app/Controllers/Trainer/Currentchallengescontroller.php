<?php


namespace App\Controllers\Trainer;

use App\Controllers\BaseController;
use App\Models\elena\IzazovModel;
use App\Models\elena\KorisnikModel;
use App\Models\elena\TrenerModel;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Type;


class Currentchallengescontroller extends \App\Controllers\BaseController
{
    /**
     * This controller enables display and deleting of challenges made by a trainer
     */
    public function index()
    {
        echo view('trener/CurrentChallenges.php');
        echo view('templates/footer/footer.php');
    }

    /**
     *
     * Author: Elena Vidic 2019/0081
     */

    public function addChallenge(){
        //echo("FUNKCIJA KONTROLER");
        $id = $this->session->get('trenerId');
        $challenges =array();

        $modelChallenge = new IzazovModel();
        $allChallenges = $modelChallenge->findUserChallenges($id);

        foreach ($allChallenges as $challenge){
            if($challenge->izbrisan == 0) {
                $challenges[] = [
                    'id' => $challenge->id_izazov,
                    'type' => $challenge->tip_izazova,
                    'title' => $challenge->naziv,
                    'description' => $challenge->opis,
                    'points' => $challenge->br_poena,
                    'level' => $challenge->nivo,
                    'likes'=>$challenge->br_lajkova
                ];
            }
        }//aray to string
        echo json_encode($challenges);
        /**
         *
         * This function, addChallenge collects challenges from the table 'izazov',
         * and returns them encapsulated into a JSON object.
         * That object is decoded and used for the display of challenges in the view CurrentChallenges
         */
    }

    public function deleteChallenge(){
        /**
         *Function deleteChallenge deletes the challenge it has been called for, and the challenge will not be displayed
         * in the CurrentChallenges view anymore. It deletes the challenge by changing the value of a field 'izbrisan' to 1
         */
        $challengeId = $this->request->getVar('challengeId');
        $challenge = new IzazovModel();
        $challenge->save([
            'id_izazov' => $challengeId,
            'izbrisan' => '1'
        ]);
        //echo ('IYBRISAN');
    }

}