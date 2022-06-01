<?php

namespace App\Controllers\Trainer;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Model;
use Psr\Log\LoggerInterface;

class Namechange extends BaseController
{
    public function index()
    {
        echo view('trener/manageaccount.php');
        //echo ($this->session->get('info'));
        #session_start();
        #echo $prom;
        echo view('templates/footer/footer.php');
    }


    public function addUserName()
    {
        $id = $this->session->get('trenerId');
        $username = $this->request->getVar('username');
        $trainer = new KorisnikModel();
        $trainer->save([
            'id_kor' => $id,
            'kor_ime' => $username

        ]);
        //return "usli smo";
    }

    public function addPassword(){
        $id = $this->session->get('trenerId');
        $password = $this->request->getVar('password');
        $trainer = new KorisnikModel();
        $trainer->save([
            'id_kor' => $id,
            'sifra' => $password

        ]);
        echo("usli smo sifra");
    }

    public function checkUserName()
    {

        $id = $this->session->get('trenerId');
        $username = $this->request->getVar('username');

        $modelUser = new KorisnikModel();
        $allUsers = $modelUser->findUser($username);

        if($allUsers != null){
            echo("0");
            //return 0;
        }
        else{
            echo("1");
            //return 1;
        }

    }

    public function UsernamefromDB(){
      $id = $this->session->get('trenerId');
        $modelUser = new KorisnikModel();
        $trainers = $modelUser->findUserId($id);
        $trainer = $trainers[0];
//
      $username = $trainer->kor_ime;
        echo($username);
       // echo ("onload=");
    }
}