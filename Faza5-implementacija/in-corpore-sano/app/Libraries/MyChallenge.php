<?php

/* Tijana Mitrovic */

namespace App\Libraries;

class MyChallenge {
    public function myChallengeItem($mychallenge) {
        return view('components/my_challenge_item', $mychallenge);
    }
}