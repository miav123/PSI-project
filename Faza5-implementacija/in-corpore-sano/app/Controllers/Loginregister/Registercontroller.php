<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Loginregister;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;
use CodeIgniter\HTTP\RedirectResponse;
use ReflectionException;


/**
 * Registercontroller - controller class that is used for registering new users.
 * reference: https://onlinewebtutorblog.com/codeigniter-4-form-validation-library/
 * @version 1.0
 * @author Mia Vucinic
 */
class Registercontroller extends BaseController
{
    /**
     * Function that is used on first page of register form. If all fields are valid, user will be redirected to the next page.
     * @return RedirectResponse|void
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
     * @throws ReflectionException
     */
    public function registercontinue() {

        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post') {

            $userreg = session()->get('userdata');

            $rules = [

                'height' => 'required|numeric|greater_than_equal_to[50]|less_than_equal_to[250]',
                'weight' => 'required|numeric|greater_than_equal_to[10]|greater_than_equal_to[250]',
                'hours' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[150]'

            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {

                $modelUser = new KorisnikModel();
                $modelRegUser = new RegistrovaniKorisnikModel();

                $modelUser->insert([

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
                    'url_profilne_slike' => '/assets/images/user-image/profileImage.jpg'

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