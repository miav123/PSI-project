<?php

namespace App\Controllers\Trainer;

use App\Controllers\BaseController;
use App\Models\elena\AdminModel;
use App\Models\elena\KorisnikModel;
use App\Models\elena\TrenerModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use Psr\Log\LoggerInterface;

class Namechange extends BaseController
{
    /**
     *
     * This controller enables the display of the view manageaccount
     * and change of trainers username and/or password
     */
    public function index()
    {
        echo view('trener/manageaccount.php');
        echo view('templates/footer/footer.php');
    }

    /**
     *
     * Author: Elena Vidic 2019/0081
     */

    /**
     * @throws \ReflectionException
     *
     */


    public function addUserName()
    {

        $id = $this->session->get('id');
        $username = $this->request->getVar('username');
        if($username != ""){
            $trainer = new KorisnikModel();
            $trainer->save([
                'id_kor' => $id,
                'kor_ime' => $username
            ]);
        }
    }

    /**
     * @throws \ReflectionException
     * Function addUserName changes the username of the trainer to the desired one
     */

    public function addPassword(){
        $id = $this->session->get('id');
        $password = $this->request->getVar('password');
        $trainer = new KorisnikModel();
        $trainer->save([
            'id_kor' => $id,
            'sifra' => $password

        ]);
//        echo("usli smo sifra");
    }

    /**
     *
     * Function addPassword changes the password of the trainer to the desired one
     */

    public function checkUserName()
    {
        $id = $this->session->get('id');
        $username = $this->request->getVar('username');

        $modelUser = new KorisnikModel();
        $allUsers = $modelUser->findUser($username);

        if($allUsers != null){
            echo("0");
        }
        else{
            echo("1");
        }
    }

    /**
     *
     * Function checkUserName checks if there is already a user with the same username.
     * If the username is not unique the function
     * returns the value "0", and if it is it returns "1".
     * The function returns string value.
     */

    public function UsernamefromDB(){
      $id = $this->session->get('id');
        $modelUser = new KorisnikModel();
        $trainers = $modelUser->findUserId($id);
        $trainer = $trainers[0];
//
      $username = $trainer->kor_ime;
        echo($username);
       // echo ("onload=");
    }

    /**
     *
     * Function UsernamefromDB gets the username of the trainer from the database
     * and returns it as a string
     */
}