<?php

namespace App\Libraries;

class Challenge {
    public function challengeItem($challenge) {
        return view('components/challenge_item', $challenge);
    }
}