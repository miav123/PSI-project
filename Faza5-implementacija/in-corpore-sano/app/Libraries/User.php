<?php

namespace App\Libraries;

class User {
    public function userItem($user) {
        return view('components/user_item', $user);
    }
}