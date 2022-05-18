<?php

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;

class Logincontroller extends BaseController
{

    private function setUserSession($user){

        $data = [
            'id' => $user['id_kor'],
            'username' => $user['kor_ime'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function login() {

        helper(['form']);
        $data = [];

        if($this->request->getMethod() == 'post') {

            $rules = [
                'username'=> 'required',
                'password'=> 'required|validUser[username,password]'
            ];

            $errors = [
                'password' => [
                    'validUser' => 'Please check your username and password'
                ]
            ];

            if(!$this->validate($rules, $errors)) {

                $data['validation'] = $this->validator;

            } else {

                $modelUser = new KorisnikModel();
                $modelAdmin = new AdminModel();
                $modelTrainer = new TrenerModel();

                $user = $modelUser->where('kor_ime', $this->request->getVar('username'))->first();

                $this->setUserSession($user); // create session

                // check if user is admin
                if($modelAdmin->find($user['id_kor'])) {
                    return redirect()->to('admin/challenges');
                }

                // check if user is trainer
                if($modelTrainer->find($user['id_kor'])) {
                    return redirect()->to('trainer/challenges');
                }

                return redirect()->to('user/challenges');

            }
        }
        echo view("login-registration-forms/login.php", $data);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

}