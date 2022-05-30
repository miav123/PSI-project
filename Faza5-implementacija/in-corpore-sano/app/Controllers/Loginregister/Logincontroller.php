<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;

/**
 * Logincontroller - controller class that is used for logging in
 * @version 1.0
 */
class Logincontroller extends BaseController
{
    /**
     * Function that is used for creating and storing current user's session.
     * @param $user
     * @param $role
     */
    private function setUserSession($user, $role){

        $data = [
            'id' => $user['id_kor'],
            'username' => $user['kor_ime'],
            'isLoggedIn' => true,
            'role' => $role
        ];

        session()->set($data);
    }

    /**
     * Function that is used for logging in. After successful authentication user will be redirected to the first page of the application that corresponds to their role. If authentication is not successful, error message will be shown.
     * @return \CodeIgniter\HTTP\RedirectResponse|void
     */
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

                // check if user is admin
                if($modelAdmin->find($user['id_kor'])) {
                    $this->setUserSession($user, 'admin'); // create session
                    return redirect()->to('admin');
                }

                // check if user is trainer
                if($modelTrainer->find($user['id_kor'])) {
                    $this->setUserSession($user, 'trainer'); // create session
                    return redirect()->to('trainer');
                }

                // registered user
                $this->setUserSession($user, 'user'); // create session
                return redirect()->to('user');
            }
        }
        echo view("login-registration-forms/login.php", $data);
    }

    /**
     * Function that is used for logging out. Current user's session will be destroyed, and they will be redirected to the login page.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

}