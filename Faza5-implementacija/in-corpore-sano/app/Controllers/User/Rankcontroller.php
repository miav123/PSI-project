<?php

/* Tijana Mitrovic 2019/0001 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;

/**
 * Rankcontroller - controller class that is used to display user rankings.
 * @version 1.0
 * @author Tijana Mitrovic
 */

class Rankcontroller extends BaseController {

    /**
     * Function that lists all registered user.
     * @return void
     */

    public function allRegUsers() {
        helper('array');

        $data = [];
        $p = 1;

        $modelUser = new KorisnikModel();

        $modelRegUser = new RegistrovaniKorisnikModel();
        $usersDB = $modelRegUser->findAll();

        $regusers = array();
        foreach ($usersDB as $regUser) {
            $user = $modelUser->where('id_kor', $regUser['id_kor'])->findAll()[0];
            if($user && !$user['izbrisan']) {
                $regusers[] = [
                    'id' => $regUser['id_kor'],
                    'username' => $user['kor_ime'],
                    'points' => $regUser['bodovi'],
                    'place' => 0
                ];
            }
        }
        array_sort_by_multiple_keys($regusers, ['points'=> SORT_DESC, 'username'=>SORT_ASC]);
        foreach ($regusers as &$reguser){
            $reguser['place'] = $p++;
        }

        $data['regusers'] = $regusers;

        echo view('templates/header-user/header-nicepage.php');
        echo view('user/rank.php', $data);
        echo view('templates/footer/footer-nicepage.php');
    }
}