<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;

class Trainercontroller extends BaseController
{
    public function alltrainers() {

        $data = [];

        $modelUser = new KorisnikModel();
        $modelTrainer = new TrenerModel();
        $trainersDB = $modelTrainer->findAll();

        $trainers = array();

        foreach ($trainersDB as $trainer) {

            $user = $modelUser->where('id_kor', $trainer['id_kor'])->findAll()[0];

            if($user && !$user['izbrisan']) {
                $trainers[] = [
                    'id' => $trainer['id_kor'],
                    'username' => $user['kor_ime'],
                ];
            }

        }

        $data['trainers'] = $trainers;

        echo view('templates/header-admin/header.php');
        echo view('admin/trainers.php', $data);
        echo view('templates/footer/footer.php');

    }

    public function deletetrainer($id)
    {
        $modelUser = new KorisnikModel();
        $user = $modelUser->find($id);
        if($user) {
            $user['izbrisan'] = 1;
            $modelUser->save($user);
        }
        return redirect()->to('admin/trainers');
    }

}