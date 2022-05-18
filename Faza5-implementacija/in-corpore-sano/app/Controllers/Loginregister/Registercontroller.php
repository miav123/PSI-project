<?php

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;

class Registercontroller extends BaseController
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

                return redirect()->to('/registercontinue');

            }

        }

        echo view("login-registration-forms/register.php", $data);
    }

    /**
     * @throws \ReflectionException
     */
    public function registercontinue() {

        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {

            $userreg = session()->get('userdata');

            $rules = [
                'height' => 'required|numeric|greater_than[50]|less_than[250]',
                'weight' => 'required|numeric|greater_than[10]',
                'hours' => 'required|numeric|less_than[100]'
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {

                $modelUser = new KorisnikModel();
                $modelRegUser = new RegistrovaniKorisnikModel();

                $modelUser->save([

                    'kor_ime' => $userreg['username'],
                    'email' => $userreg['email'],
                    'sifra' => $userreg['password'],
                    'izbrisan' => 0

                ]);

                $modelRegUser->save([

                    'id_kor' => $modelUser->where('kor_ime', $userreg['username'])->first()['id_kor'],
                    'visina' => $this->request->getVar('height'),
                    'tezina' => $this->request->getVar('weight'),
                    'br_tren' => $this->request->getVar('hours'),
                    'bodovi' => 0,
                    'broj_uzast_logovanja' => 0

                ]);

                $session = session();
                $session->remove('userdata');
                $session->setFlashdata('success', 'Successful registration! You can log in now');

                return redirect()->to('/');

            }

        }

        echo view("login-registration-forms/registerContinue.php", $data);
    }

}