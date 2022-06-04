<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Validation;
use App\Models\KorisnikModel;

/**
 * RegistrationRules - class that defines custom validation rules for registration.
 * reference : https://onlinewebtutorblog.com/how-to-create-custom-validation-rule-in-codeigniter-4/
 * @version 1.0
 * @author Mia Vucinic
 */
class RegistrationRules
{
    /**
     * Returns true if user with username passed as a parameter doesn't exist in the database.
     * @param string $str
     * @param string $fields
     * @param array $data
     * @return bool
     */
    public function username_not_exist(string $str, string $fields, array $data): bool
    {

        $model = new KorisnikModel();

        $user = $model->where('kor_ime', $data['username'])->first();

        if(!$user)
            return true;

        return false;

    }

    /**
     * Returns true if user with email passed as a parameter doesn't exist in the database.
     * @param string $str
     * @param string $fields
     * @param array $data
     * @return bool
     */
    public function email_not_exist(string $str, string $fields, array $data): bool
    {

        $model = new KorisnikModel();

        $user = $model->where('email', $data['email'])->first();

        if(!$user)
            return true;

        return false;

    }

    /**
     * Returns true if password and repeated password are same.
     * @param string $str
     * @param string $fields
     * @param array $data
     * @return bool
     */
    public function passwords_are_equal(string $str, string $fields, array $data): bool
    {

        if($data['password'] == $data['password_repeat'])
            return true;
        else
            return false;

    }

}