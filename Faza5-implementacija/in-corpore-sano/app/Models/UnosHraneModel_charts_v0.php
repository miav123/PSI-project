<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * UnosHraneModel_chartsV0 - class that fetches current week's, month's or average year's training data from the database.
 * @version 0.0
 */
class UnosHraneModel_charts_v0 {
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
                                SELECT DAYOFWEEK(DATE(datum)) AS day_in_week, DAY(DATE(datum)) AS day_in_month, SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g) AS result
                                FROM `obrok_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                WHERE YEARWEEK(DATE(datum), 1) = YEARWEEK(DATE(NOW()), 1) AND id_kor = {$user_id} AND `obrok_sadrzi_namirnice`.id_nam = `namirnica`.id_nam AND `unos_hrane`.`id_obr` = `obrok_sadrzi_namirnice`.`id_obr`
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
                                SELECT DAY(DATE(datum)) AS day_in_month, MONTH(DATE(datum)) AS month, SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g) AS result
                                FROM `obrok_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                WHERE MONTH(NOW()) = MONTH(DATE(datum)) AND id_kor = {$user_id} AND `obrok_sadrzi_namirnice`.`id_nam` = `namirnica`.`id_nam` AND `unos_hrane`.`id_obr` = `obrok_sadrzi_namirnice`.`id_obr`
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
                                        SELECT SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g) AS result, datum
                                        FROM `obrok_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                        WHERE YEAR(NOW()) = YEAR(DATE(datum)) AND id_kor = {$user_id} AND `obrok_sadrzi_namirnice`.`id_nam` = `namirnica`.`id_nam` AND `unos_hrane`.`id_obr` = `obrok_sadrzi_namirnice`.`id_obr`
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
