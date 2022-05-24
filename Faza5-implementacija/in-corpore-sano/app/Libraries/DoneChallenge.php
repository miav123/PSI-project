<?php

namespace App\Libraries;

class DoneChallenge {
    public function doneChallengeItem($donechallenge) {
        return view('components/done_challenge_item', $donechallenge);
    }
}