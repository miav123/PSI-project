<?php

namespace App\Libraries;

class CurrChallenge {
    public function currChallengeItem($challenge) {
        return view('components/curr_challenge_item', $challenge);
    }
}