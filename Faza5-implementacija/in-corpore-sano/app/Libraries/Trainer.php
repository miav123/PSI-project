<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Libraries;

class Trainer {
    public function trainerItem($trainer) {
        return view('components/trainer_item', $trainer);
    }
}