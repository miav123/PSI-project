<?php


namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;

class Registertrainercontroller extends \App\Controllers\BaseController
{
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

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else{

                $user = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password')
                ];

                $session = session();
                $session->set('userdata', $user);

            }

        }

        echo view("login-registration-forms/registerTrainer.php", $data);
    }

}