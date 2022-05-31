<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Libraries;

/**
 * Description of DailyLog
 *
 * @author Glisha
 */
class DailyLog {
    public function dailyWorkOuts($workout){
        return view('components/dailylog-items/daily_workout_item.php', $workout);
    }
     public function dailyFood($meal){
        return view('components/dailylog-items/daily_meal_item.php', $meal);
    }
    public function dailyGroceries($grooceries){
        return view('components/dailylog-items/daily_groceries_item.php', $grooceries);
    }
    
}
