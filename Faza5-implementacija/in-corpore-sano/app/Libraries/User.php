<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Libraries;

class User {
    public function userItem($user) {
        return view('components/admin/user_item', $user);
    }
}