<?php

/* Tijana Mitrovic 2019/0001 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\IzazovModel;
use App\Models\MojiIzazoviModel;
use App\Models\GotoviIzazoviModel;
use App\Models\KorisnikModel;

/**
 * Currentchallengescontroller - controller class that manages current challenges for registered user.
 * @version 1.0
 * @author Tijana Mitrovic
 */

class Currentchallengescontroller extends BaseController {

    /**
     * Function that lists all current challenges.
     * @return void
     */

    public function currChallenges() {
        $data = [];
        
        $modelChallenge = new IzazovModel();
        $challengesDB = $modelChallenge->findAll();

        $modelMyChallenges = new MojiIzazoviModel();
        $mychallengesDB = $modelMyChallenges->where('id_kor', session('id'))->findAll();

        $modelDoneChallenges = new GotoviIzazoviModel();
        $donechallengesDB = $modelDoneChallenges->where('id_kor', session('id'))->findAll();

        $modelUser = new KorisnikModel();

        $challenges = array();

        $d = 0;
        $m = 0;
        
        foreach ($challengesDB as $challenge) {
            foreach ($donechallengesDB as $donechallenge) {
                if ($donechallenge['id_izazov'] == $challenge['id_izazov']){
                    $d = 1;
                    break;
                }
            }
            foreach ($mychallengesDB as $mychallenge) {
                if ($mychallenge['id_izazov'] == $challenge['id_izazov']){
                    $m = 1;
                    break;
                }
            }
            if(!$challenge['izbrisan'] && !$d && !$m) {
                $t=0;
                $user = $modelUser->where('id_kor', $challenge['id_tren'])->findAll()[0];
                foreach ($mychallengesDB as $mychallenge) {
                    $vchallenge = $modelChallenge->where('id_izazov', $mychallenge['id_izazov'])->findAll()[0];
                    $wantchallenge = $modelChallenge->find($challenge['id_izazov']);
                    if ($wantchallenge['tip_izazova'] == $vchallenge['tip_izazova'] &&
                    ($wantchallenge['tip_izazova']=='water' || $wantchallenge['tip_izazova']=='food')){
                        $t = 1;
                        break;
                    }
                }
                $challenges[] = [
                    'id' => $challenge['id_izazov'],
                    'type' => $challenge['tip_izazova'],
                    'title' => $challenge['naziv'],
                    'trainer' => $user['kor_ime'],
                    'description' => $challenge['opis'],
                    'points' => $challenge['br_poena'],
                    'level' => $challenge['nivo'],
                    'forbidden' => $t
                ];
            }
            $d = 0;
            $m = 0;
        }

        $data['challenges'] = $challenges;

        echo view('templates/header-user/header-nicepage.php');
        echo view('user/current-challenges.php', $data);
        echo view('templates/footer/footer-nicepage.php');
        
    }

    /**
     * Function that acceptes challenge with given id.
     * @param $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

    public function acceptchallenge($id)
    {
        date_default_timezone_set("Europe/Belgrade");
        if(array_key_exists('acceptbtn', $_POST)) {
            $modelChallenge = new IzazovModel();
            $modelMyChallenges = new MojiIzazoviModel();
            $mychallengesDB = $modelMyChallenges->where('id_kor', session('id'))->findAll();
            $modelMyChallenges->save([
                'id_kor' => session('id'),
                'id_izazov' => $id,
                'datum_prijave_na_izazov' => date("Y-m-d H:i:s"),
                'dana_uzastopno_ispunjeno' => 0,
                'propusteno' => 0
            ]);
        }
        return redirect()->to('user/current-challenges');
    }
}