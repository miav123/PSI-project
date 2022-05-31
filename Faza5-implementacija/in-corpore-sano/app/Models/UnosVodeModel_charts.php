<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * UnosVodeModel_charts - class that fetches current week's, month's or average year's data for daily water intake from the database.
 * @version 1.0
 */
class UnosVodeModel_charts {
    /**
     * @var $db ConnectionInterface
     */
    protected $db;

    /**
     * Constructor
     * @param ConnectionInterface $db
     */
    public function __construct(ConnectionInterface &$db) {
        $this->db = &$db;
    }

    /**
     * Function that fetches this week's data for user whose id is passed as parameter.
     * @param $user_id
     * @return array|array[]
     */
    public function getCurrentWeekDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
//        return $this->db->query("
//                                SELECT id as day_of_week, (
//                                    SELECT SUM(kolicina)
//                                    FROM `unos_vode`
//                                    WHERE id_kor = {$user_id} AND DATE(NOW() - INTERVAL 7 DAY) AND DAYOFWEEK(DATE(datum)) = id
//                                    GROUP BY DATE(datum)
//                                    ) as result
//                                FROM `days_in_week`
//                                ORDER BY day_of_week ASC")
        return $this->db->query("
                                SELECT DAYOFWEEK(DATE(datum)) AS day_in_week, DAY(DATE(datum)) AS day_in_month, SUM(kolicina) AS result
                                FROM `unos_vode` 
                                WHERE YEARWEEK(DATE(datum), 1) = YEARWEEK(DATE(NOW()), 1) AND id_kor = {$user_id}
                                GROUP BY DATE(datum)
                                ORDER BY day_in_month ASC")
            ->getResultArray();
    }

    /**
     * Function that fetches current month's data for user whose id is passed as parameter.
     * @param $user_id
     * @return array|array[]
     */
    public function getCurrentMonthDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                                SELECT DAY(DATE(datum)) AS day_in_month, MONTH(DATE(datum)) AS month,SUM(kolicina) AS result
                                FROM `unos_vode` 
                                WHERE MONTH(NOW()) = MONTH(DATE(datum)) AND id_kor = {$user_id}
                                GROUP BY DATE(datum)
                                ORDER BY day_in_month ASC")
            ->getResultArray();
    }

    /**
     * Function that fetches current year's data for user whose id is passed as parameter.
     * @param $user_id
     * @return array|array[]
     */
    public function getCurrentYearDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                            SELECT id as month, (
                                SELECT AVG(result)
                                FROM 
                                (
                                    SELECT SUM(kolicina) as result, datum
                                    FROM `unos_vode` 
                                    WHERE YEAR(NOW()) = YEAR(DATE(datum)) AND id_kor = {$user_id}
                                    GROUP BY DATE(datum)
                                ) q
                                WHERE MONTH(DATE(datum)) = id
                                GROUP BY MONTH(datum)
                            ) as result
                            FROM `months`
                            ORDER BY month ASC")
            ->getResultArray();
    }
}