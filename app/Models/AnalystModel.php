<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalystModel extends Model
{
    protected $table = 'tbl_analyst';
    protected $primaryKey = 'id_analyst';
    protected $allowedFields = ['id_user', 'emotion_analyst', 'result_analyst', 'date'];

}
