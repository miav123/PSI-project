<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UnosHraneModel_charts_v1;
use App\Models\UnosTreningaModel_charts_v1;
use App\Models\UnosVodeModel_charts_v1;


/**
 * Chartscontroller - controller class that is used for fetching data that will be plotted on charts.
 * @version 1.0
 * @author Mia Vucinic
 */
class Chartscontroller extends BaseController
{
    /**
     * Function that returns a model corresponding to the type passed as a parameter.
     * @param $type
     * @return UnosHraneModel_charts_v1|UnosTreningaModel_charts_v1|UnosVodeModel_charts_v1|null
     */
    private function getModel($type) {
        $model = null;
        $db = db_connect();
        switch ($type) {
            case "food":
                $model = new UnosHraneModel_charts_v1($db);
                break;
            case "water":
                $model = new UnosVodeModel_charts_v1($db);
                break;
            case "training":
                $model = new UnosTreningaModel_charts_v1($db);
                break;
        }
        return $model;
    }

    /**
     * Function that is used for fetching current week data from the database.
     * @param $type
     * @param $user
     * @return mixed
     */
    private function getWeekData($type, $user)
    {
        return $this->getModel($type)->getCurrentWeekDataForUser($user);
    }

    /**
     * Function that is used for fetching current month data from the database.
     * @param $type
     * @param $user
     * @return mixed
     */
    private function getMonthData($type, $user)
    {
        return $this->getModel($type)->getCurrentMonthDataForUser($user);
    }

    /**
     * Function that is used for fetching current year data from the database.
     * @param $type
     * @param $user
     * @return mixed
     */
    private function getYearData($type, $user)
    {
        return $this->getModel($type)->getCurrentYearDataForUser($user);
    }

    /**
     * Function that collects chart data for given type, e.g. water, food and training, and passes it to the chart view page for plotting.
     * @param $type
     * @return void
     */
    public function chart($type)
    {

        helper(array('url', 'html', 'form'));

        $user = session()->get('id');

        $week_data_sql = $this->getWeekData($type, $user);
        $month_data_sql = $this->getMonthData($type, $user);
        $year_data_sql = $this->getYearData($type, $user);
        $week_data = [];
        $month_data = [];
        $year_data = [];

        $days_of_week = [
            1 => 'Sunday', 2 => 'Monday', 3 => 'Tuesday', 4 => 'Wednesday', 5 => 'Thursday', 6 => 'Friday', 7 => 'Saturday',
        ];

        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December'
        ];

        /*
         *  WEEK DATA
         */
        foreach ($week_data_sql as $record) {
            $week_data['label'][] = $days_of_week[$record['day_of_week']];
            $week_data['data'][] = $record['result'];
        }

        /*
         *  MONTH DATA
         */
        foreach ($month_data_sql as $record) {
            $month_data['label'][] = $record['day_in_month'] . "." . $record['month'] . ".";
            $month_data['data'][] = $record['result'];
        }

        /*
         *  YEAR DATA
         */
        foreach ($year_data_sql as $record) {
            $year_data['label'][] = $months[$record['month']];
            $year_data['data'][] = $record['result'];
        }

        $data['chart_week_data'] = json_encode($week_data);

        $data['chart_month_data'] = json_encode($month_data);

        $data['chart_year_data'] = json_encode($year_data);

        echo view('templates/header-user/header.php');
        echo view('user/charts.php', $data);
        echo view('templates/footer/footer-nicepage.php');
    }

}