<?php

/* Tijana Mitrovic 2019/0001 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\RegistrovaniKorisnikModel;

/**
 * Myaccountcontroller - controller class that is used to display user data.
 * @version 1.0
 * @author Tijana Mitrovic
 */

class Myaccountcontroller extends BaseController {

    /**
     * Function that searches for all information about registered user.
     * @return void
     */

    public function myAccountUser() {
       
        $data = [];
        helper(['form']);
        
        $regusers = Myaccountcontroller::findRU();
        $data['regusers'] = $regusers;

        echo view('templates/header-user/header-nicepage.php');
        echo view('user/my-account.php', $data);
        echo view('templates/footer/footer-nicepage.php');
    }

    /**
     * Function that searches for all information about registered user and return array.
     * @return array
     */

    private function findRU(){
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
            'url_image' => $regUser['url_profilne_slike']
        ];
        return $regusers;
    }

    /**
     * Function that changes username if all fields are valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

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
                $regusers = Myaccountcontroller::findRU();
                $data['regusers'] = $regusers;

                echo view('templates/header-user/header-nicepage.php');
                echo view('user/my-account.php', $data);
                echo view('templates/footer/footer-nicepage.php');

            } else {
                $modelUser = new KorisnikModel();
                $user = $modelUser->find(session('id'));
                $user['kor_ime'] = $this->request->getVar('username');
                $modelUser->save($user);
                return redirect()->to('user/my-account');
            }

            
        }
       
    }

    /**
     * Function that changes height if all fields are valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

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

    /**
     * Function that changes weight if all fields are valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

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

    /**
     * Function that changes hours if all fields are valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

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

    /**
     * Function that changes password if all fields are valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

    public function changePassword() {

        helper(['form']);

        if (array_key_exists('btnChangePassword', $_POST)){

            $rules = [
                'password' => 'required|min_length[8]|max_length[50]',
                'password_repeat' => 'matches[password]'
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
                $regusers = Myaccountcontroller::findRU();
                $data['regusers'] = $regusers;
                echo view('templates/header-user/header-nicepage.php');
                echo view('user/my-account.php', $data);
                echo view('templates/footer/footer-nicepage.php');

            } else {
                $modelUser = new KorisnikModel();
                $user = $modelUser->find(session('id'));
                $user['sifra'] = $this->request->getVar('password');
                $modelUser->save($user);
                $_SESSION['success']='Password changed successfully!';
                return redirect()->to('user/my-account');
               
            }

            
        }
        
       
    }

    /**
     * Function that changes email if all fields are valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

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
                $regusers = Myaccountcontroller::findRU();
                $data['regusers'] = $regusers;

                echo view('templates/header-user/header-nicepage.php');
                echo view('user/my-account.php', $data);
                echo view('templates/footer/footer-nicepage.php');

            } else {
                $modelUser = new KorisnikModel();
                $user = $modelUser->find(session('id'));
                $user['email'] = $this->request->getVar('email');
                $modelUser->save($user);
                return redirect()->to('user/my-account');
            }

            
        }
       
    }

    /**
     * Function that changes profile picture if file is valid.
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */

    public function changeImage() {
       
        helper(['form']);
       
        if (array_key_exists('btnChangeImage', $_POST)){
            echo "<pre>";
            print_r($_FILES["image"]);
            echo "</pre>";
            echo "Pritisnuto dugme";
            $modelRegUser = new RegistrovaniKorisnikModel();
                $regUser = $modelRegUser->find(session('id'));
            
            $img_name = $_FILES["image"]['name'];
            $img_size = $_FILES["image"]['size'];
            $tmp_name = $_FILES["image"]['tmp_name'];
            $error = $_FILES["image"]['error'];
            if($error === 0){

                if ($img_size > 125000){    

                    $_SESSION['msg']='Sorry, your file is too large!';
                    return redirect()->to('user/my-account');

                }else{

                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");

                    if(in_array($img_ex_lc, $allowed_exs)){
                       $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                       $img_upload_path = '../public/assets/images/user-image/'.$new_img_name;
                       $img = '/assets/images/user-image/'.$new_img_name;
                       move_uploaded_file($tmp_name, $img_upload_path);
                        $regUser['url_profilne_slike'] = $img;
                        $modelRegUser->save($regUser);
                        return redirect()->to('user/my-account');

                    }else{

                        $_SESSION['msg']="You can't upload files of this type!";
                        return redirect()->to('user/my-account');
                
                    }
                }

            }else{

                $_SESSION['msg']="Unknown error ocurred!";
                return redirect()->to('user/my-account');
              
            }
        }
    }
    
}