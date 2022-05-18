<?php

namespace App\Validation;
use App\Models\KorisnikModel;

class UserRules
{
    public function validUser(string $str, string $fields, array $data){

        $model = new KorisnikModel();

        $user = $model->where('kor_ime', $data['username'])->first();

        if(!$user || $user['izbrisan'] == 1)
            return false;

        return $data['password'] == $user['sifra'];

    }

}