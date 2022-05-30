<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\IzazovModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;

class Challengescontroller extends BaseController
{
    public function allchallenges() {

        $data = [];

        $modelChallenge = new IzazovModel();
        $challengesDB = $modelChallenge->findAll();

        $modelUser = new KorisnikModel();

        $challenges = array();

        foreach ($challengesDB as $challenge) {

            if(!$challenge['izbrisan']) {
                $user = $modelUser->where('id_kor', $challenge['id_tren'])->findAll()[0];

                $challenges[] = [
                    'id' => $challenge['id_izazov'],
                    'type' => $challenge['tip_izazova'],
                    'title' => $challenge['naziv'],
                    'trainer' => $user['kor_ime'],
                    'description' => $challenge['opis'],
                    'points' => $challenge['br_poena'],
                    'level' => $challenge['nivo']
                ];
            }
        }

        $data['challenges'] = $challenges;

        echo view('templates/header-admin/header.php');
        echo view('admin/challenges.php', $data);
        echo view('templates/footer/footer.php');
    }

    public function deletechallenge($id)
    {
        if(array_key_exists('deletebtn', $_POST)) {
            $model = new IzazovModel();
            $challenge = $model->find($id);
            if($challenge) {
                $challenge['izbrisan'] = 1;
                $model->save($challenge);
            }
        }
        return redirect()->to('admin/challenges');
    }

}