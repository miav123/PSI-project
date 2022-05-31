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

    public function changeHeight() {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {
            $rules = [
                'newHeight' => 'required|numeric|greater_than[50]|less_than[250]',
            ];

            $errors = [
                'password' => [
                    'validHeight' => 'Please check value of you height.'
                ]
            ];

            if(!$this->validate($rules, $errors)) {

                $data['validation'] = $this->validator;

            }else{
                $modelRegUser = new RegistrovaniKorisnikModel();
                $regUser = $modelRegUser->find(session('id'));
                $regUser['visina'] = $this->request->getVar('newHeight');
                $modelRegUser->save($regUser);
            }
            return redirect()->to('user/my-account');
        } 

        echo view("user/my-account", $data);
    }
}