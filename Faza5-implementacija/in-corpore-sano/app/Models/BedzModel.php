<?php

namespace App\Models;

use CodeIgniter\Model;

class BedzModel extends Model {
    protected $table      = 'bedz';
    protected $allowedFields = ['id_bedz', 'ime', 'opis', 'tip', 'br_izazova'];
    protected $primaryKey = 'id_bedz';
}
