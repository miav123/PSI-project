<?php

/* Tijana Mitrovic */

namespace App\Libraries;

class Rank {
    public function rankItem($reguser) {
        return view('components/rank_item', $reguser);
    }
}