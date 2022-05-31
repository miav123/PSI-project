<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * UnosTreningaModel_charts - class that fetches current week's, month's or average year's training data from the database.
 * @version 1.0
 */
class UnosTreningaModel_charts {
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
        return $this->db->query("
                                SELECT DAYOFWEEK(DATE(datum)) AS day_in_week, DAY(DATE(datum)) AS day_in_month, SUM(vreme_trajanja * kcal_za_pola_sata_tren * 2) AS result
                                FROM `unos_treninga`, `tip_treninga`
                                WHERE YEARWEEK(DATE(datum), 1) = YEARWEEK(DATE(NOW()), 1) AND id_kor = {$user_id} AND `unos_treninga`.id_tip = `tip_treninga`.`id_tip`
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
                                SELECT DAY(DATE(datum)) AS day_in_month, MONTH(DATE(datum)) AS month, SUM(vreme_trajanja * kcal_za_pola_sata_tren * 2) AS result
                                FROM `unos_treninga`, `tip_treninga`
                                WHERE MONTH(NOW()) = MONTH(DATE(datum)) AND id_kor = {$user_id} AND `unos_treninga`.id_tip = `tip_treninga`.`id_tip`
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
                                        SELECT SUM(vreme_trajanja * kcal_za_pola_sata_tren * 2) AS result, datum
                                        FROM `unos_treninga`, `tip_treninga`
                                        WHERE YEAR(NOW()) = YEAR(DATE(datum)) AND id_kor = {$user_id} AND `unos_treninga`.id_tip = `tip_treninga`.`id_tip`
                                        GROUP BY DATE(datum)
                                    ) q
                                    WHERE MONTH(DATE(datum)) = id
                                    GROUP BY MONTH(DATE(datum))
                                ) as result
                                FROM `months`
                                ORDER BY month ASC")
            ->getResultArray();
    }
}