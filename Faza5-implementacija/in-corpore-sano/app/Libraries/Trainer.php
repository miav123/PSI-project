<?php

namespace App\Libraries;

class Trainer {
    public function trainerItem($trainer) {
        return view('components/trainer_item', $trainer);
    }
}