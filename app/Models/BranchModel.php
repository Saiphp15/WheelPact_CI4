<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table = 'branches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dealer_id', 'name', 'branch_banner1', 'branch_banner2', 'branch_banner3', 'branch_thumbnail', 'branch_type', 'country_id', 'state_id', 'city_id', 'address','contact_number','email','short_description','is_active', 'created_at', 'updated_at'];

    protected $db;
	
    public function __construct()
    {
        parent::__construct();

        $this->db = \Config\Database::connect();

    }

    public function getPopularStores(){
        $builder = $this->db->table('branches');
        $builder->select('branches.*, AVG(branch_ratings.rating) AS avg_rating, COUNT(branch_ratings.branch_id) AS review_count, COUNT(vehicles.branch_id) AS vehicle_count');
        $builder->join('branch_ratings', 'branches.id = branch_ratings.branch_id', 'left');
        $builder->join('vehicles', 'vehicles.branch_id = branches.id', 'left');
        $builder->where('branches.is_active', 1);
        $builder->groupBy('branches.id');
        $builder->orderBy('avg_rating', 'desc');
        return $builder->get()->getResultArray();
	}

    public function getStoreDetails($storeId){
        return $this->where('id', $storeId)->first();
    }


}
