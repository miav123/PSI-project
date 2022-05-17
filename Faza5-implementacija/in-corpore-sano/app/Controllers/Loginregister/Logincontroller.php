<?php

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;

class Logincontroller extends BaseController
{
    public function login() {

        if($this->request->getMethod() == 'post') {

            $username = $_POST['usernameLogIn'];
            $password =  $_POST['passwordLogIn'];

            $modelUser = new KorisnikModel();
            $modelAdmin = new AdminModel();
            $modelTrainer = new TrenerModel();

            $user = $modelUser->where('kor_ime', $username)->findAll();

            if($user && !$user[0]['izbrisan']) {

                // check if password is correct
                if($user[0]['sifra'] == $password) {

                    // check if user is admin
                    if($modelAdmin->find($user[0]['id_kor'])) {
                        return redirect()->to('admin/challenges');
                    }

                    // check if user is trainer
                    if($modelTrainer->find($user[0]['id_kor'])) {
                        return redirect()->to('trainer/challenges');
                    }

                    return redirect()->to('user/challenges');

                } else {
                    print_r('password not correct');
                }

            } else {
                print_r('username doesn\'t exists or account is banned');

            }
        }
        else echo view("login-registration-forms/login.php");
    }

    public function logout() {
        return redirect()->to('/');
    }

}