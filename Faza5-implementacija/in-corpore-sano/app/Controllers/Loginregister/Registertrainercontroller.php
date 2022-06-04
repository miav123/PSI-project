<?php

/*
 *  Elena Vidic 0081/2019
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;
use App\Models\TrenerModel;
use ReflectionException;

/**
 * Registertrainercontroller - class that is used for registering trainer.
 * reference: https://onlinewebtutorblog.com/codeigniter-4-form-validation-library/
 * @version 1.0
 */
class Registertrainercontroller extends \App\Controllers\BaseController
{
    /**
     * Function that is used for registering trainer. If the registration is successful, user will be redirected to the log in screen and an appropriate message will be shown.
     * @throws ReflectionException
     */
    public function register() {

        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {

            $rules = [

                'username' => 'required|min_length[1]|max_length[40]|username_not_exist[username]',
                'email' => 'required|min_length[5]|max_length[40]|valid_email|email_not_exist[email]',
                'password' => 'required|min_length[5]|max_length[40]|passwords_are_equal[password,password_repeat]'

            ];

            $errorMessages = [

                'username' => [
                    'username_not_exist' => 'User with this username already exists.'
                ],
                'email' => [
                    'email_not_exist' => 'User with this email already exists.',
                    'valid_email' => 'The email must be in valid format.'
                ],
                'password' => [
                    'passwords_are_equal' => 'Password and repeated password must be same.'
                ]

            ];

            if (! $this->validate($rules, $errorMessages)) {

                $data['validation'] = $this->validator;

            } else{

                $modelUser = new KorisnikModel();
                $modelTrainer = new TrenerModel();

                $modelUser->insert([

                    'kor_ime' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'sifra' => $this->request->getVar('password'),
                    'izbrisan' => 0

                ]);

                $id_kor = $modelUser->where('kor_ime', $this->request->getVar('username'))->first()['id_kor'];

                $modelTrainer->insert([

                    'id_kor' => $id_kor

                ]);

                $session = session();
                $session->setFlashdata('success', 'Successful registration! You can log in now');

                return redirect()->to('/');

            }

        }

        echo view("login-registration-forms/registerTrainer.php", $data);
    }

}