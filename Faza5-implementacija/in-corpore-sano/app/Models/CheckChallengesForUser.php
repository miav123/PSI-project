<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * CheckChallengesForUser - class that fetches challenge data for the user.
 * @version 1.0
 * @author Mia Vucinic
 */
class CheckChallengesForUser {
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
     * Function that fetches challenge data for water challenge and user passed as parameters.
     * Returns the amount of water that user consumed daily (result) for each day (date) of the challenge that passed and the required amount of water by the challenge (required).
     * @param $user_id
     * @param $challenge_id
     * @return array|array[]
     */
    public function checkChallengeWater($user_id, $challenge_id) {
        $user_id = $this->db->escape($user_id);
        $challenge_id = $this->db->escape($challenge_id);
        return $this->db->query("                                    
                                    WITH RECURSIVE days (id_day, date, amount_of_water) AS (
                                        SELECT 1, DATE(`moji_izazovi`.`datum_prijave_na_izazov`), kolicina_koju_treba_piti_svakog_dana
                                        FROM `izazov`, `moji_izazovi`, `izazov_voda`
                                        WHERE `moji_izazovi`.`id_kor` = {$user_id} AND `izazov`.`id_izazov` = {$challenge_id} AND `izazov`.`id_izazov` = `moji_izazovi`.`id_izazov` AND `izazov`.`id_izazov` = `izazov_voda`.`id_izazov`
                                        
                                        UNION ALL
                                        
                                        SELECT id_day + 1, DATE(DATE_ADD(date, INTERVAL 1 DAY)), amount_of_water
                                        FROM days
                                        WHERE id_day < (
                                            SELECT `izazov`.`trajanje_u_danima`
                                            FROM `izazov`, `moji_izazovi`
                                            WHERE `moji_izazovi`.`id_kor` = {$user_id} AND `izazov`.`id_izazov` = {$challenge_id} AND `izazov`.`id_izazov` = `moji_izazovi`.`id_izazov`
                                        ) AND date < DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)
                                    )
                                
                                    SELECT id_day, date, COALESCE((
                                            SELECT SUM(kolicina)
                                            FROM `unos_vode`
                                            WHERE id_kor = {$user_id} AND DATE(datum) = date
                                            GROUP BY DATE(datum)
                                    ), 0) as result, amount_of_water as required
                                    FROM `days`
                                    ORDER BY id_day ASC;")
            ->getResultArray();
    }

    /**
     * Function that fetches challenge data for food challenge and user passed as parameters.
     * Returns number of calories that user consumed daily (result) for each day (date) of the challenge that passed and the required number of calories by the challenge (required).
     * @param $user_id
     * @param $challenge_id
     * @return array|array[]
     */
    public function checkChallengeFood($user_id, $challenge_id) {
        $user_id = $this->db->escape($user_id);
        $challenge_id = $this->db->escape($challenge_id);
        return $this->db->query("
                                    WITH RECURSIVE days (id_day, date, kcal) AS (
                                        SELECT 1, DATE(`moji_izazovi`.`datum_prijave_na_izazov`), broj_kalorija_koje_treba_uneti_svakog_dana
                                        FROM `izazov`, `moji_izazovi`, `izazov_hrana`
                                        WHERE `moji_izazovi`.`id_kor` = {$user_id} AND `izazov`.`id_izazov` = {$challenge_id} AND `izazov`.`id_izazov` = `moji_izazovi`.`id_izazov` AND `izazov`.`id_izazov` = `izazov_hrana`.`id_izazov`
                                        
                                        UNION ALL
                                        
                                        SELECT id_day + 1, DATE(DATE_ADD(date, INTERVAL 1 DAY)), kcal
                                        FROM days
                                        WHERE id_day < (
                                            SELECT `izazov`.`trajanje_u_danima`
                                            FROM `izazov`, `moji_izazovi`
                                            WHERE `moji_izazovi`.`id_kor` = {$user_id} AND `izazov`.`id_izazov` = {$challenge_id} AND `izazov`.`id_izazov` = `moji_izazovi`.`id_izazov`
                                        ) AND date < DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)
                                    )
                                    
                                    SELECT id_day, date, COALESCE((
                                            SELECT SUM(kolicina_svake_nam_u_g / 100 * kcal_na_100g)
                                            FROM `obrok_sadrzi_namirnice`, `namirnica`, `unos_hrane`
                                            WHERE id_kor = {$user_id} AND DATE(datum) = date AND `obrok_sadrzi_namirnice`.id_nam = `namirnica`.id_nam AND `unos_hrane`.`id_obr` = `obrok_sadrzi_namirnice`.`id_obr`
                                            GROUP BY DATE(datum)
                                        ), 0) as result, kcal as required
                                    FROM `days`
                                    ORDER BY id_day ASC;")
            ->getResultArray();
    }

    /**
     * Function that fetches challenge data for training challenge and user passed as parameters.
     * Returns number of hours that user trained daily (result) for each day (date) of the challenge that passed and the required number of hours by the challenge (required).
     * @param $user_id
     * @param $challenge_id
     * @return array|array[]
     */
    public function checkChallengeTraining($user_id, $challenge_id) {
        $user_id = $this->db->escape($user_id);
        $challenge_id = $this->db->escape($challenge_id);
        return $this->db->query("
                                    WITH RECURSIVE days (id_day, date, id_type, time) AS (
                                        SELECT 1, DATE(`moji_izazovi`.`datum_prijave_na_izazov`), id_tip, vreme_koje_treba_trenirati_svakog_dana
                                        FROM `izazov`, `moji_izazovi`, `izazov_trening`
                                        WHERE `moji_izazovi`.`id_kor` = {$user_id} AND `izazov`.`id_izazov` = {$challenge_id} AND `izazov`.`id_izazov` = `moji_izazovi`.`id_izazov` AND `izazov`.`id_izazov` = `izazov_trening`.`id_izazov`
                                        
                                        UNION ALL
                                        
                                        SELECT id_day + 1, DATE(DATE_ADD(date, INTERVAL 1 DAY)), id_type, time
                                        FROM days
                                        WHERE id_day < (
                                            SELECT `izazov`.`trajanje_u_danima`
                                            FROM `izazov`, `moji_izazovi`
                                            WHERE `moji_izazovi`.`id_kor` = {$user_id} AND `izazov`.`id_izazov` = {$challenge_id} AND `izazov`.`id_izazov` = `moji_izazovi`.`id_izazov`
                                        ) AND date < DATE_SUB(DATE(NOW()), INTERVAL 1 DAY)
                                    )
                                
                                    SELECT id_day, date, id_type, COALESCE((
                                            SELECT SUM(vreme_trajanja)
                                            FROM `unos_treninga`
                                            WHERE id_kor = {$user_id} AND DATE(datum) = date AND id_tip = id_type
                                            GROUP BY DATE(datum)
                                        ), 0) as result, time as required
                                    FROM `days`
                                    ORDER BY id_day ASC;")
            ->getResultArray();
    }
}