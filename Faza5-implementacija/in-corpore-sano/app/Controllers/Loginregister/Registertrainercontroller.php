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
                'username' => 'required|min_length[1]|max_length[50]|is_unique[korisnik.kor_ime]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[korisnik.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_repeat' => 'matches[password]',
            ];

            $error = [
                'username' => [
                    'is_unique' => 'The username is already taken.'
                ],
                'email' => [
                    'is_unique' => 'The email is already taken.',
                    'valid_email' => 'The email must be in format a@b.c .'
                ],
                'password_repeat' => [
                    'matches' => 'Password and repeated password must be same.'
                ],
            ];

            if (! $this->validate($rules, $error)) {

                $data['validation'] = $this->validator;

            } else{

                $modelUser = new KorisnikModel();
                $modelTrainer = new TrenerModel();

                $modelUser->save([

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