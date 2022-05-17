<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Chartscontroller extends BaseController
{
    public function chart() {
        echo view('templates/header-user/header.php');
        echo 'charts';
        echo view('templates/footer/footer.php');
    }

}