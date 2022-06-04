<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Validation;
use App\Models\KorisnikModel;

/**
 * LoginRules - class that defines custom validation rules for logging in.
 * reference : https://onlinewebtutorblog.com/how-to-create-custom-validation-rule-in-codeigniter-4/
 * @version 1.0
 * @author Mia Vucinic
 */
class LoginRules
{
    /**
     * Returns true if user with username passed as a parameter exists in the database and is not deleted.
     * @param string $str
     * @param string $fields
     * @param array $data
     * @return bool
     */
    public function user_exists(string $str, string $fields, array $data): bool
    {

        $model = new KorisnikModel();

        $user = $model->where('kor_ime', $data['username'])->first();

        if(!$user || $user['izbrisan'] == 1)
            return false;

        return true;

    }

    /**
     * Returns true if password passed as a parameter matches password in the database.
     * @param string $str
     * @param string $fields
     * @param array $data
     * @return bool
     */
    public function correct_password(string $str, string $fields, array $data): bool
    {

        $model = new KorisnikModel();

        $user = $model->where('kor_ime', $data['username'])->first();

        if(!$user || $user['izbrisan'] == 1)
            return true;

        if($data['password'] == $user['sifra'])
            return true;
        else
            return false;

    }


}