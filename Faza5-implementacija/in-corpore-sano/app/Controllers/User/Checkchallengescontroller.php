<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CheckChallengesForUser;
use App\Models\IzazovModel;
use App\Models\MojiIzazoviModel;

/**
 * Checkchallengescontroller - controller class that checks if user has completed challenge and updates his database.
 * @version 1.0
 */
class Checkchallengescontroller extends BaseController
{
    public function checkWaterChallenges() {
        $myChallengesModel = new MojiIzazoviModel();
        $challengesModel = new IzazovModel();
        $challenges = $myChallengesModel->findAll();

        $db = db_connect();
        $checkChallengesModel = new CheckChallengesForUser($db);

        $user_id = session()->get('id');

        foreach ($challenges as $challenge) {
            $data = $checkChallengesModel->checkChallengeWater($user_id, $challenge['id_izazov']);
            $flag = false;
            $day_counter = 0;
            foreach ($data as $record) {
                if($flag) break;
                if($record['result'] != $record['amount_of_water']) {
                    $flag = true;
                    break;
                } else {
                    $day_counter++;
                }
            }
            if($flag) {
                $c = $myChallengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first();
                $c['propusteno'] = 1;
                $myChallengesModel->save($c);
            } else {
                $c = $myChallengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first();
                $c['dana_uzastopno_ispunjeno'] = $day_counter;
                $myChallengesModel->save($c);

                if($day_counter == $challengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first()['trajanje_u_danima']) {
                    // remove from my challenges insert to finished challenges
                }
            }
        }
    }

    public function checkFoodChallenges() {
        $myChallengesModel = new MojiIzazoviModel();
        $challengesModel = new IzazovModel();
        $challenges = $myChallengesModel->findAll();

        $db = db_connect();
        $checkChallengesModel = new CheckChallengesForUser($db);

        $user_id = session()->get('id');

        foreach ($challenges as $challenge) {
            $data = $checkChallengesModel->checkChallengeFood($user_id, $challenge['id_izazov']);
            $flag = false;
            $day_counter = 0;
            foreach ($data as $record) {
                if($flag) break;
                if($record['result'] != $record['kcal']) {
                    $flag = true;
                    break;
                } else {
                    $day_counter++;
                }
            }
            if($flag) {
                $c = $myChallengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first();
                $c['propusteno'] = 1;
                $myChallengesModel->save($c);
            } else {
                $c = $myChallengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first();
                $c['dana_uzastopno_ispunjeno'] = $day_counter;
                $myChallengesModel->save($c);

                if($day_counter == $challengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first()['trajanje_u_danima']) {
                    // remove from my challenges insert to finished challenges
                }
            }
        }
    }

    public function checkTrainingChallenges() {
        $myChallengesModel = new MojiIzazoviModel();
        $challengesModel = new IzazovModel();
        $challenges = $myChallengesModel->findAll();

        $db = db_connect();
        $checkChallengesModel = new CheckChallengesForUser($db);

        $user_id = session()->get('id');

        foreach ($challenges as $challenge) {
            $data = $checkChallengesModel->checkChallengeTraining($user_id, $challenge['id_izazov']);
            $flag = false;
            $day_counter = 0;
            foreach ($data as $record) {
                if($flag) break;
                if($record['result'] != $record['time']) {
                    $flag = true;
                    break;
                } else {
                    $day_counter++;
                }
            }
            if($flag) {
                $c = $myChallengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first();
                $c['propusteno'] = 1;
                $myChallengesModel->save($c);
            } else {
                $c = $myChallengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first();
                $c['dana_uzastopno_ispunjeno'] = $day_counter;
                $myChallengesModel->save($c);

                if($day_counter == $challengesModel->find()->where('id_izazov', $challenge['id_izazov'])->first()['trajanje_u_danima']) {
                    // remove from my challenges insert to finished challenges
                }

            }
        }
    }

}