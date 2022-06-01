<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;

class Myaccountcontroller extends BaseController {

    public function myAccountUser() {
       
        $data = [];
        helper(['form']);
        $modelUser = new KorisnikModel();
        $user = $modelUser->find(session('id'));

        $modelRegUser = new RegistrovaniKorisnikModel(); 
        $regUser = $modelRegUser->where('id_kor',session('id'))->findAll()[0];

        $regusers = array();
        $regusers[] = [
            'id' => $regUser['id_kor'],
            'username' => $user['kor_ime'],
            'mail' => $user['email'],
            'height' => $regUser['visina'],
            'weight' => $regUser['tezina'],
            'numTraining' => $regUser['br_tren'],
            'points' => $regUser['bodovi'],
        ];

        $data['regusers'] = $regusers;

        echo view('templates/header-user/header-nicepage.php');
        echo view('user/my-account.php', $data);
        echo view('templates/footer/footer-nicepage.php');
    }

    public function changeUsername() {

        helper(['form']);

        if (array_key_exists('btnChangeUsername', $_POST)){

            $rules = [
                'username' => 'required|min_length[1]|max_length[50]|is_unique[korisnik.kor_ime]'
            ];

            $error = [
                'username' => [
                    'is_unique' => 'The username is already taken.'
                ]
            ];

            if (! $this->validate($rules, $error)){

                $data['validation'] = $this->validator;

            } else {
                $modelUser = new KorisnikModel();
                $user = $modelUser->find(session('id'));
                $user['kor_ime'] = $this->request->getVar('username');
                $modelUser->save($user);
            }

            
        }
       return redirect()->to('user/my-account');
    }

    public function changeHeight() {

        helper(['form']);

        if (array_key_exists('btnChangeHeight', $_POST)){

            $rules = [
                'height' => 'required|numeric|greater_than[149]|less_than[251]'
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {
                $modelRegUser = new RegistrovaniKorisnikModel();
                $regUser = $modelRegUser->find(session('id'));
                $regUser['visina'] = $this->request->getVar('height');
                $modelRegUser->save($regUser);
            }

            
        }
       return redirect()->to('user/my-account');
    }

    public function changeWeight() {

        helper(['form']);

        if (array_key_exists('btnChangeWeight', $_POST)){

            $rules = [
                'weight' => 'required|numeric|greater_than[39]|less_than[601]'
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {
                $modelRegUser = new RegistrovaniKorisnikModel();
                $regUser = $modelRegUser->find(session('id'));
                $regUser['tezina'] = $this->request->getVar('weight');
                $modelRegUser->save($regUser);
            }

            
        }
       return redirect()->to('user/my-account');
    }

    public function changeHours() {

        helper(['form']);

        if (array_key_exists('btnChangeHours', $_POST)){

            $rules = [
                'hours' => 'required|numeric|less_than[101]'
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {
                $modelRegUser = new RegistrovaniKorisnikModel();
                $regUser = $modelRegUser->find(session('id'));
                $regUser['br_tren'] = $this->request->getVar('hours');
                $modelRegUser->save($regUser);
            }

            
        }
       return redirect()->to('user/my-account');
    }

    public function changePassword() {

        helper(['form']);

        if (array_key_exists('btnChangePassword', $_POST)){

            $rules = [
                'password' => 'required|min_length[8]|max_length[50]',
                'password_repeat' => 'matches[password]'
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {
                $modelUser = new KorisnikModel();
                $user = $modelUser->find(session('id'));
                $user['sifra'] = $this->request->getVar('password');
                $modelUser->save($user);
            }

            
        }
       return redirect()->to('user/my-account');
    }

    public function changeEmail() {

        helper(['form']);

        if (array_key_exists('btnChangeEmail', $_POST)){

            $rules = [
                'email' => 'required|min_length[5]|max_length[50]|valid_email|is_unique[korisnik.email]'
            ];
            $error = [
                'email' => [
                    'is_unique' => 'The email is already taken.',
                    'valid_email' => 'The email must be in format a@b.c .'
                ],
            ];

            if (! $this->validate($rules, $error)) {

                $data['validation'] = $this->validator;

            } else {
                $modelUser = new KorisnikModel();
                $user = $modelUser->find(session('id'));
                $user['email'] = $this->request->getVar('email');
                $modelUser->save($user);
            }

            
        }
       return redirect()->to('user/my-account');
    }
}