<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Libraries;

class Badge {
     public function trainingBadgeItem($trainingBadge) {
        return view('components/badge_items/training_badge_item', $trainingBadge);
    }
     public function foodBadgeItem($foodBadge) {
        return view('components/badge_items/food_badge_item', $foodBadge);
    }
    public function waterBadgeItem($waterBadge) {
        return view('components/badge_items/water_badge_item', $waterBadge);
    }
    public function loginBadgeItem($loginBadge) {
        return view('components/badge_items/login_badge_item', $loginBadge);
    }
}
