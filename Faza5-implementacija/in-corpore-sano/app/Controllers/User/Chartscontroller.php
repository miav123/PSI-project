<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UnosHraneModel;
use App\Models\UnosTreningaModel;
use App\Models\UnosVodeModel;

class Chartscontroller extends BaseController
{
    private function getWeekData($type)
    {
        $db = db_connect();
        $model = new UnosVodeModel($db);

        switch ($type) {
            case "food":
                $model = new UnosHraneModel($db);
                break;
            case "water":
                $model = new UnosVodeModel($db);
                break;
            case "training":
                $model = new UnosTreningaModel($db);
                break;
        }
        return $model->getLastWeekDataForUser(2);
    }

    private function getMonthData($type)
    {
        $db = db_connect();
        $model = new UnosVodeModel($db);

        switch ($type) {
            case "food":
                $model = new UnosHraneModel($db);
                break;
            case "water":
                $model = new UnosVodeModel($db);
                break;
            case "training":
                $model = new UnosTreningaModel($db);
                break;
        }
        return $model->getLastMonthDataForUser(2);
    }

    private function getYearData($type)
    {
        $db = db_connect();
        $model = new UnosVodeModel($db);

        switch ($type) {
            case "food":
                $model = new UnosHraneModel($db);
                break;
            case "water":
                $model = new UnosVodeModel($db);
                break;
            case "training":
                $model = new UnosTreningaModel($db);
                break;
        }
        return $model->getLastYearDataForUser(2);
    }

    public function chart($type)
    {

        helper(array('url', 'html', 'form'));

        $week_data_sql = $this->getWeekData($type);
        $month_data_sql = $this->getMonthData($type);
        $year_data_sql = $this->getYearData($type);
        $week_data = [];
        $month_data = [];
        $year_data = [];

        $days_of_week = [
            1 => 'Sunday', 2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday', 7 => 'Saturday',
        ];

        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        if(count($week_data_sql) < 7) {
            for($i = 0; $i < 7 -count($week_data_sql); $i++) {
                $week_data['label'][] = 'No data';
                $week_data['data'][] = 0;
            }
        }

        foreach ($week_data_sql as $record) {
            $week_data['label'][] = $days_of_week[$record['day_of_week']];
            $week_data['data'][] = $record['result'];
        }

        if(count($month_data_sql) < 30) {
            for($i = 0; $i < 30 -count($month_data_sql); $i++) {
                $month_data['label'][] = 'No data';
                $month_data['data'][] = 0;
            }
        }

        foreach ($month_data_sql as $record) {
            $month_data['label'][] = $record['day'].".".$record['month'].".";
            $month_data['data'][] = $record['result'];
        }

        if(count($year_data_sql) < 30) {
            for($i = 0; $i < 30 -count($year_data_sql); $i++) {
                $year_data['label'][] = 'No data';
                $year_data['data'][] = 0;
            }
        }

        foreach ($year_data_sql as $record) {
            $year_data['label'][] = $months[$record['month']];
            $year_data['data'][] = $record['average'];
        }

        $data['chart_week_data'] = json_encode($week_data);


        $data['chart_month_data'] = json_encode($month_data);


        $data['chart_year_data'] = json_encode($year_data);

        echo view('templates/header-user/header.php');
        echo view('user/charts.php', $data);
        echo view('templates/footer/footer.php');
    }

}