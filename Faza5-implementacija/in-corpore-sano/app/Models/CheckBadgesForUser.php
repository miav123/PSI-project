<?php

/*
 *  Mia Vucinic 0224/2019
 */

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

/**
 * CheckBadgesForUser - class that fetches badges data for the user.
 * @version 1.0
 * @author Mia Vucinic
 */
class CheckBadgesForUser {
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
     * Function that checks if user has earned new badge.
     * @param $user_id
     * @return array|array[]
     */
    public function checkBadges($user_id) {
        $user_id = $this->db->escape($user_id);
        return $this->db->query("                                    
                                    SELECT id_bedz
                                    FROM `bedz`
                                    WHERE br_izazova = (SELECT COUNT(*) AS number
                                                        FROM gotovi_izazovi
                                                        WHERE id_kor = {$user_id}
                                                        GROUP BY id_kor) AND id_bedz NOT IN (SELECT id_bedz FROM korisnik_bedz WHERE id_kor = {$user_id})")
            ->getResultArray();
    }
}