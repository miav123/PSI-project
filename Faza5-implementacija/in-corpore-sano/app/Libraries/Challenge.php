<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Libraries;

class Challenge {
    public function challengeItem($challenge) {
        return view('components/challenge_item', $challenge);
    }
}