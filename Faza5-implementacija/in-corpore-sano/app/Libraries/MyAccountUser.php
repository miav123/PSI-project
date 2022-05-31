<?php

namespace App\Libraries;

class MyAccountUser {
    public function myAccountUserItem($reguser) {
        return view('components/my_account_user_item', $reguser);
    }
}