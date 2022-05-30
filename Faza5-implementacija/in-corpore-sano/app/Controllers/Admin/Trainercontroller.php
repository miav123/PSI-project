<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KorisnikModel;
use App\Models\TrenerModel;

/**
 * Trainercontroller - controller class that manages trainers for admin
 * @version 1.0
 */
class Trainercontroller extends BaseController
{
    /**
     * Function that lists all trainers.
     * @return void
     */
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

    /**
     * Function that deletes trainer with given id.
     * @param $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     * @throws \ReflectionException
     */
    public function deletetrainer($id)
    {
        if(array_key_exists('deletebtn', $_POST)) {
            $modelUser = new KorisnikModel();
            $user = $modelUser->find($id);
            if ($user) {
                $user['izbrisan'] = 1;
                $modelUser->save($user);
            }
        }
        return redirect()->to('admin/trainers');
    }

}