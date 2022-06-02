<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Validation;
use App\Models\KorisnikModel;

/**
 * UserRules - class that stored custom validation methods for validation of users.
 * @version 1.0
 * @author Mia Vucinic
 */
class UserRules
{
    /**
     * Function that  checks if user is allowed to log in. Returns true if user with given username exists, is not deleted and his password matches password in the database.
     * @param string $str
     * @param string $fields
     * @param array $data
     * @return bool
     */
    public function validUser(string $str, string $fields, array $data){

        $model = new KorisnikModel();

        $user = $model->where('kor_ime', $data['username'])->first();

        if(!$user || $user['izbrisan'] == 1)
            return false;

        return $data['password'] == $user['sifra'];

    }

}