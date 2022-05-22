<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class UnosTreningaModel {
    protected $db;

    public function __construct(ConnectionInterface &$db) {
        $this->db = &$db;
    }

    public function getLastWeekDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                                SELECT DAYOFWEEK(DATE(datum)) AS day_in_week, DAY(DATE(datum)) AS day_in_month, SUM(vreme_trajanja * kcal_za_pola_sata_tren * 2) AS result
                                FROM `unos_treninga`, `tip_treninga`
                                WHERE DATE(datum) >= DATE(NOW() - INTERVAL 7 DAY) AND id_kor = {$user_id} AND `unos_treninga`.id_tip = `tip_treninga`.`id_tip`
                                GROUP BY DATE(datum)
                                ORDER BY day_in_month ASC")
            ->getResultArray();
    }

    public function getLastMonthDataForUser($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("
                                SELECT DAY(DATE(datum)) AS day_in_month, MONTH(DATE(datum)) AS month, SUM(vreme_trajanja * kcal_za_pola_sata_tren * 2) AS result
                                FROM `unos_treninga`, `tip_treninga`
                                WHERE MONTH(NOW()) = MONTH(DATE(datum)) AND id_kor = {$user_id} AND `unos_treninga`.id_tip = `tip_treninga`.`id_tip`
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
                                        SELECT SUM(vreme_trajanja * kcal_za_pola_sata_tren * 2) AS result, datum
                                        FROM `unos_treninga`, `tip_treninga`
                                        WHERE DATE(datum) >= DATE(NOW() - INTERVAL 365 DAY) AND id_kor = {$user_id} AND `unos_treninga`.id_tip = `tip_treninga`.`id_tip`
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