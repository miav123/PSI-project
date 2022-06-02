<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Libraries;

class User {
    public function userItem($user) {
        return view('components/user_item', $user);
    }
}