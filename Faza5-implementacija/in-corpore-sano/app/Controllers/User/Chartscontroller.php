<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UnosHraneModel;
use App\Models\UnosTreningaModel;
use App\Models\UnosVodeModel;


/**
 * Chartscontroller - controller class that is used for fetching data that will be plotted on charts
 * @version 1.0
 */
class Chartscontroller extends BaseController
{
    /**
     * Function that is used for fetching current week data from the database.
     * @param $type
     * @param $user
     * @return mixed
     */
    private function getWeekData($type, $user)
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
        return $model->getLastWeekDataForUser($user);
    }

    /**
     * Function that is used for fetching current month data from the database.
     * @param $type
     * @param $user
     * @return mixed
     */
    private function getMonthData($type, $user)
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
        return $model->getLastMonthDataForUser($user);
    }

    /**
     * Function that is used for fetching current year data from the database.
     * @param $type
     * @param $user
     * @return mixed
     */
    private function getYearData($type, $user)
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
        return $model->getLastYearDataForUser($user);
    }

    /**
     * Function that checks if there is record in the database for a day passed as a parameter.
     * @param $month_data_sql
     * @param $day
     * @return null
     */
    private function recordForCurrentDay($month_data_sql, $day)
    {
        $r = null;
        foreach ($month_data_sql as $record) {
            if ($record['day_in_month'] == $day) {
                $r = $record;
                break;
            }
        }
        return $r;
    }

    /**
     * Function that checks if there is record in the database for a day in a week passed as parameter.
     * @param $week_data_sql
     * @param $day
     * @return null
     */
    private function recordForCurrentDayInWeek($week_data_sql, $day)
    {
        $r = null;
        foreach ($week_data_sql as $record) {
            if ($record['day_in_week'] == $day) {
                $r = $record;
                break;
            }
        }
        return $r;
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

        $months_days = [
            'January' => 31, 'February' => 28, 'March' => 31, 'April' => 30, 'May' => 31, 'June' => 30, 'July' => 31, 'August' => 31, 'September' => 30, 'October' => 31, 'November' => 30, 'December' => 31
        ];

//        foreach ($week_data_sql as $record) {
//            $week_data['label'][] = $days_of_week[$record['day_of_week']];
//            $week_data['data'][] = $record['result'];
//        }

        /*
         *  WEEK DATA
         */

        for ($i = 1; $i <= 7; $i++) {
            $record = $this->recordForCurrentDayInWeek($week_data_sql, $i);
            $week_data['label'][] = $days_of_week[$i];
            if ($record == null) {
                $week_data['data'][] = 0;
            } else {
                $week_data['data'][] = $record['result'];
            }
        }

        /*
         *  MONTH DATA
         */

        $curr_month = intval(date('m', time()));
        $num_of_days_in_month = $months_days[$months[$curr_month]];

        for ($i = 1; $i <= $num_of_days_in_month; $i++) {
            $record = $this->recordForCurrentDay($month_data_sql, $i);
            if ($record == null) {
                $month_data['label'][] = $i . "." . $curr_month . ".";
                $month_data['data'][] = 0;
            } else {
                if ($record['month'] == $curr_month) {
                    $month_data['label'][] = $i . "." . $curr_month . ".";
                    $month_data['data'][] = $record['result'];
                }
            }
        }

        /*
         *  YEAR DATA
         */

        foreach ($year_data_sql as $record) {
            $year_data['label'][] = $months[$record['month']];
            if ($record['result'] == null)
                $year_data['data'][] = 0;
            else
                $year_data['data'][] = $record['result'];

        }

        $data['chart_week_data'] = json_encode($week_data);

        $data['chart_month_data'] = json_encode($month_data);

        $data['chart_year_data'] = json_encode($year_data);

        echo view('templates/header-user/header.php');
        echo view('user/charts.php', $data);
        echo view('templates/footer/footer.php');
    }

}