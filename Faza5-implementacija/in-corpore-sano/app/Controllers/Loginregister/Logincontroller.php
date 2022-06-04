<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Controllers\User\Checkchallengescontroller;
use App\Models\AdminModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;

/**
 * Logincontroller - controller class that is used for logging in.
 * reference: https://onlinewebtutorblog.com/codeigniter-4-form-validation-library/
 * @version 1.0
 * @author Mia Vucinic
 */
class Logincontroller extends BaseController
{
    /**
     * Function that is used for creating and storing current user's session.
     * @param $user
     * @param $role
     */
    private function createSessionForUser($user, $role) {

        session()->set([

            'id' => $user['id_kor'],
            'username' => $user['kor_ime'],
            'isLoggedIn' => true,
            'role' => $role

        ]);

    }

    /**
     * Function that is used for logging in. After successful authentication user will be redirected to the first page of the application that corresponds to their role. If authentication is not successful, error message will be shown.
     * @return RedirectResponse|void
     * @throws ReflectionException
     */
    public function login() {

        helper(['form']);
        $data = [];

        if($this->request->getMethod() == 'post') {

            $rules = [

                'username'=> 'required|user_exists[username]|correct_password[username,password]',
                'password'=> 'required'

            ];

            $errorMessages = [

                'username' => [
                    'user_exists' => 'Please check your username.',
                    'correct_password' => 'Please check your password.'
                ]

            ];

            if(!$this->validate($rules, $errorMessages)) {

                $data['validation'] = $this->validator;

            } else {

                $modelUser = new KorisnikModel();
                $modelAdmin = new AdminModel();
                $modelTrainer = new TrenerModel();

                $user = $modelUser->where('kor_ime', $this->request->getVar('username'))->first();

                // check if user is admin
                if($modelAdmin->find($user['id_kor'])) {
                    $this->createSessionForUser($user, 'admin');
                    return redirect()->to('admin');
                }

                // check if user is trainer
                if($modelTrainer->find($user['id_kor'])) {
                    $this->createSessionForUser($user, 'trainer');
                    return redirect()->to('trainer');
                }

                // registered user
                $this->createSessionForUser($user, 'user');
                (new Checkchallengescontroller())->checkMyChallenges();
                return redirect()->to('user');
            }
        }

        echo view("login-registration-forms/login.php", $data);
    }

    /**
     * Function that is used for logging out. Current user's session will be destroyed, and they will be redirected to the login page.
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('/');
    }

}