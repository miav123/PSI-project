<?php

namespace App\Controllers;

class Usercontroller extends BaseController
{
    public function index() // login
    {
        $data = [];
        helper("form");

        echo view("login-registration-forms/login.php");
    }

    public function registerFirstPage()
    {
        $data = [];
        helper(['form']);

        /*if($this->request->get->method() == 'post') {
            $rules = [
                'username'=>'required|min_lenght[3]|max_length[20]',
                'email'=>'required|min_lenght[6]|max_length[50]|valid_email|is_unique[in_corpore_sano.korisnik]',
                'password'=>'requred|min_length[8]|max_length[255]',
                'password_confirm'=>'matches[password]'
            ];
        }

        if(!$this->validate($rules)) {
            $data['validation'] = $this->validator;
        } else {
            // store user in database
        }
*/
        echo view("login-registration-forms/register.php");
    }

    public function registerSecondPage()
    {
        echo view("login-registration-forms/registerContinue.php");
    }

}