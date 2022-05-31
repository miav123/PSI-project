<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class UnosHraneModel {
    protected $db;

    public function __construct(ConnectionInterface &$db) {
        $this->db = &$db;
    }

    public function getLastWeekDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                                SELECT DAYOFWEEK(DATE(datum)) AS day_in_week, DAY(DATE(datum)) AS day_in_month, SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g) AS result
                                FROM `obork_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                WHERE YEARWEEK(DATE(datum), 1) = YEARWEEK(DATE(NOW()), 1) AND id_kor = {$user_id} AND `obork_sadrzi_namirnice`.id_nam = `namirnica`.id_nam AND `unos_hrane`.`id_obr` = `obork_sadrzi_namirnice`.`id_obr`
                                GROUP BY DATE(datum)
                                ORDER BY day_in_month ASC")
            ->getResultArray();
    }

    public function getLastMonthDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                                SELECT DAY(DATE(datum)) AS day_in_month, MONTH(DATE(datum)) AS month, SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g) AS result
                                FROM `obork_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                WHERE MONTH(NOW()) = MONTH(DATE(datum)) AND id_kor = {$user_id} AND `obork_sadrzi_namirnice`.id_nam = `namirnica`.id_nam AND `unos_hrane`.`id_obr` = `obork_sadrzi_namirnice`.`id_obr`
                                GROUP BY DATE(datum)
                                ORDER BY day_in_month ASC")
            ->getResultArray();
    }

    public function getLastYearDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                                SELECT id as month, (
                                SELECT AVG(result)
                                FROM 
                                (
                                    SELECT SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g) AS result, datum
                                    FROM `obork_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                    WHERE YEAR(NOW()) = YEAR(DATE(datum)) AND id_kor = {$user_id} AND `obork_sadrzi_namirnice`.id_nam = `namirnica`.id_nam AND `unos_hrane`.`id_obr` = `obork_sadrzi_namirnice`.`id_obr`
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
