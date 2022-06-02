<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;


/**
 * Registercontroller - controller class that is used for registering new users.
 * @version 1.0
 * @author Mia Vucinic
 */
class Registercontroller extends BaseController
{
    /**
     * Function that is used on first page of register form. If all fields are valid, user will be redirected to the next page.
     * @return \CodeIgniter\HTTP\RedirectResponse|void
     */
    public function register() {

        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {

            $rules = [
                'username' => 'required|min_length[1]|max_length[50]|is_unique[korisnik.kor_ime]',
                'email' => 'required|min_length[5]|max_length[50]|valid_email|is_unique[korisnik.email]',
                'password' => 'required|min_length[8]|max_length[50]',
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
     * Function that is used on the second page of the register form. If the registration is successful, user will be redirected to the log in screen and an appropriate message will be shown.
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

                $id_kor = $modelUser->where('kor_ime', $userreg['username'])->first()['id_kor'];

                $modelRegUser->insert([

                    'id_kor' => $id_kor,
                    'visina' => $this->request->getVar('height'),
                    'tezina' => $this->request->getVar('weight'),
                    'br_tren' => $this->request->getVar('hours'),
                    'bodovi' => 0,
                    'url_profilne_slike' => 'assets/images/user-image/profileImage.jpg'

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