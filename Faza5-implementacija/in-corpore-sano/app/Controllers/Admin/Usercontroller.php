<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RegistrovaniKorisnikModel;
use App\Models\KorisnikModel;

class Usercontroller extends BaseController
{
    public function allusers() {

        $data = [];

        $modelUser = new KorisnikModel();
        $modelRegUser = new RegistrovaniKorisnikModel();
        $usersDB = $modelRegUser->findAll();

        $users = array();

        foreach ($usersDB as $regUser) {

            $user = $modelUser->where('id_kor', $regUser['id_kor'])->findAll()[0];

            if($user && !$user['izbrisan']) {
                $users[] = [
                    'id' => $regUser['id_kor'],
                    'username' => $user['kor_ime'],
                    'points' => $regUser['bodovi'],
                ];
            }
        }

        $data['users'] = $users;

        echo view('templates/header-admin/header.php');
        echo view('admin/users.php', $data);
        echo view('templates/footer/footer.php');

    }

    public function deleteuser($id)
    {
        if(array_key_exists('deletebtn', $_POST)) {
            $modelUser = new KorisnikModel();
            $user = $modelUser->find($id);
            if($user) {
                $user['izbrisan'] = 1;
                $modelUser->save($user);
            }
        }
        return redirect()->to('admin/users');
    }

}
