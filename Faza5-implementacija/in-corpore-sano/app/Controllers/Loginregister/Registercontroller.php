<?php

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;

class Registercontroller extends BaseController
{
    public function register() {

        if($this->request->getMethod() == 'post') {

            $username = $_POST['usernameRegistration'];
            $email = $_POST['email'];
            $password =  $_POST['passwordRegistration'];
            $passwordRepeat = $_POST['repeatPassword'];

            $model = new KorisnikModel();

            $user = $model->where('kor_ime', $username)->findAll();
            print_r($user[0]['kor_ime']);
            if($user) {
                print_r("Username already exists");
            } else {
                print_r('not found');
            }

        }

        echo view("login-registration-forms/register.php");
    }

    public function registercontinue() {

        if($this->request->getMethod() == 'post') {

            $weight = $_POST['height'];
            $height =  $_POST['weight'];
            $hoursPerWeek = $_POST['hours'];

            return redirect()->to('/');
        }


        echo view("login-registration-forms/registerContinue.php");
    }

}