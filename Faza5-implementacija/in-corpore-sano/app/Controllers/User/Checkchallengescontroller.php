<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\CheckBadgesForUser;
use App\Models\CheckChallengesForUser;
use App\Models\GotoviIzazoviModel;
use App\Models\IzazovModel;
use App\Models\KorisnikBedzModel;
use App\Models\MojiIzazoviModel;
use App\Models\RegistrovaniKorisnikModel;
use ReflectionException;

/**
 * Checkchallengescontroller - controller class that checks if user has completed challenge and updates his database.
 * @version 1.0
 * @author Mia Vucinic
 */
class Checkchallengescontroller extends BaseController
{
    /**
     * Function that checks weather the user has completed or missed his challenges and updates his database accordingly.
     * @return void
     * @throws ReflectionException
     */
    public function checkMyChallenges() {
        $user_id = session()->get('id');

        $db = db_connect();
        $checkChallengesModel = new CheckChallengesForUser($db);
        $myChallengesModel = new MojiIzazoviModel();
        $challengesModel = new IzazovModel();
        $doneChallengesModel = new GotoviIzazoviModel();
        $userModel = new RegistrovaniKorisnikModel();

        // fetch all challenges from moji_izazovi table for current user
        $myChallenges = $myChallengesModel->where('id_kor', $user_id)->findAll();

        foreach ($myChallenges as $myChallenge) {

            $challenge = $challengesModel->find($myChallenge['id_izazov']); // find challenge info from izazov table
            $data = null;

            switch ($challenge['tip_izazova']) {
                case 'water':
                    $data = $checkChallengesModel->checkChallengeWater($user_id, $myChallenge['id_izazov']);
                    break;
                case 'food':
                    $data = $checkChallengesModel->checkChallengeFood($user_id, $myChallenge['id_izazov']);
                    break;
                case 'train':
                    $data = $checkChallengesModel->checkChallengeTraining($user_id, $myChallenge['id_izazov']);
                    break;
            }

            $flag_missed = false;
            $day_counter = 0;

            foreach ($data as $record) {

                $index = $record['result'] / $record['required'];
                /*
                 * Since we are aware that users cannot accurately measure the amount of calories they consume, we will tolerate daily intake in range [95% - 105%] of the intake that is required by the challenge.
                 * For water and training types of challenges daily intake must be grater than 95% of the intake that is required by the challenge.
                 */
                if(($challenge['tip_izazova'] == 'food' && ($index < 0.95 || $index > 1.05)) || (($challenge['tip_izazova'] == 'water' || $challenge['tip_izazova'] == 'train') && $index < 0.95)) {
                    $flag_missed = true;
                    break;
                } else {
                    $day_counter++;
                }

            }

            if($flag_missed) {

                $myChallenge['propusteno'] = 1;
                $myChallengesModel->save($myChallenge);
                // $myChallengesModel->delete($myChallenge);

            } else {

                $myChallenge['dana_uzastopno_ispunjeno'] = $day_counter;
                $myChallengesModel->save($myChallenge);

                if($day_counter == $challenge['trajanje_u_danima']) {

                    // delete from my challenges
                    $myChallengesModel->delete($myChallenge);

                    // insert into done challenges
                    $doneChallengesModel->save([

                        'id_kor' => $myChallenge['id_kor'],
                        'id_izazov' => $myChallenge['id_izazov'],
                        'srce' => 0

                    ]);

                    // update user's points
                    $user = $userModel->find($myChallenge['id_kor']);
                    $user['bodovi'] += $challenge['br_poena'];
                    $userModel->save($user);
                }
            }
        }

        /*
         * Checking if user has earned any new badges.
         */
        $checkBadgesModel = new CheckBadgesForUser($db);
        $badges = $checkBadgesModel->checkBadges($user_id);
        $badgesUserModel = new KorisnikBedzModel();
        foreach ($badges as $badge) {
            if($badge != null) {
                $badgesUserModel->insert([
                    'id_kor' => $user_id,
                    'id_bedz' => $badge['id_bedz']
                ]);
            }
        }
    }

}