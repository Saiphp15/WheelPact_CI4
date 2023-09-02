<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table = 'branches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dealer_id', 'name', 'branch_thumbnail', 'branch_type', 'country_id', 'state_id', 'city_id', 'address','is_active', 'created_at', 'updated_at'];
}
