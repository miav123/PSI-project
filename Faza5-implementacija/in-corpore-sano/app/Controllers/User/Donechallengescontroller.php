<?php

/* Tijana Mitrovic 2019/0001 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\IzazovModel;
use App\Models\GotoviIzazoviModel;
use App\Models\KorisnikModel;

/**
 * Donechallengescontroller - controller class that manages done challenges for registered user.
 * @version 1.0
 * @author Tijana Mitrovic
 */

class Donechallengescontroller extends BaseController {

    /**
     * Function that lists all done challenges for registered user.
     * @return void
     */

    public function doneChallenges() {
        $data = [];

        $modelChallenge = new IzazovModel();

        $modelDoneChallenge = new GotoviIzazoviModel();
        $donechallengesDB = $modelDoneChallenge->where('id_kor', session('id'))->findAll();

        $modelUser = new KorisnikModel();

        $donechallenges = array();

        foreach ($donechallengesDB as $donechallenge) {
            $challenge = $modelChallenge->where('id_izazov', $donechallenge['id_izazov'])->findAll()[0];
            $user = $modelUser->where('id_kor', $challenge['id_tren'])->findAll()[0];
               
            $donechallenges[] = [
                'i' => $donechallenge['id_veze'],
                'id' => $challenge['id_izazov'],
                'type' => $challenge['tip_izazova'],
                'title' => $challenge['naziv'],
                'trainer' => $user['kor_ime'],
                'description' => $challenge['opis'],
                'points' => $challenge['br_poena'],
                'level' => $challenge['nivo'],
                'like' => $donechallenge['srce']
            ];
            
        }

        $data['donechallenges'] = $donechallenges;

        echo view('templates/header-user/header-nicepage.php');
        echo view('user/done-challenges.php', $data);
        echo view('templates/footer/footer-nicepage.php');
    }

    /**
     * Function that likes challenge with given id.
     * @param $i
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

    public function likechallenge($i)
    {
        if(array_key_exists('likebtn', $_POST)) {
            $model = new GotoviIzazoviModel();
            $donechallenge = $model->find($i);
            $modelIzazov = new IzazovModel();
            $challenge = $modelIzazov->where('id_izazov', $donechallenge['id_izazov'])->findAll()[0];
            if($donechallenge) {
                if ($donechallenge['srce'] == 1) {
                    $donechallenge['srce'] = 0;
                    $challenge['br_lajkova'] = $challenge['br_lajkova']-1;
                }
                else {
                    $donechallenge['srce'] = 1;
                    $challenge['br_lajkova'] = $challenge['br_lajkova']+1;
                }
                $model->save($donechallenge);
                $modelIzazov->save($challenge);
            }
        }
        return redirect()->to('user/done-challenges');
    }
}