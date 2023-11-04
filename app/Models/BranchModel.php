<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model {
    protected $table = 'branches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dealer_id', 'name', 'branch_banner1', 'branch_banner2', 'branch_banner3', 'branch_thumbnail', 'branch_type', 'branch_supported_vehicle_type', 'branch_services', 'country_id', 'state_id', 'city_id', 'address', 'contact_number', 'email', 'short_description', 'is_active', 'created_at', 'updated_at'];

    protected $db;

    public function __construct() {
        parent::__construct();

        $this->db = \Config\Database::connect();
    }

    public function getBranches() {
        $builder = $this->db->table('branches');
        $builder->select('branches.id as branch_id, dealer_id, branches.name as branch_name, branch_type, branch_supported_vehicle_type, branch_services, address, contact_number, branches.email as branch_email, short_description, branches.is_active as branch_active, users.id as user_id, users.name as owner_name');
        $builder->join('users', 'users.id = branches.dealer_id', 'left');
        $builder->orderBy('branches.id', 'desc');
        return $builder->get()->getResultArray();
    }

    public function getPopularStores($vtype) {
        $builder = $this->db->table('branches');
        $builder->select('branches.*, AVG(branch_ratings.rating) AS avg_rating, COUNT(branch_ratings.branch_id) AS review_count, COUNT(vehicles.branch_id) AS vehicle_count');
        $builder->join('branch_ratings', 'branches.id = branch_ratings.branch_id', 'left');
        $builder->join('vehicles', 'vehicles.branch_id = branches.id', 'left');
        $builder->whereIn('branches.branch_supported_vehicle_type', array($vtype, 3));
        $builder->where('branches.is_active', 1);
        $builder->groupBy('branches.id');
        $builder->orderBy('avg_rating', 'desc');
        return $builder->get()->getResultArray();
    }

    public function getStoreDetails($storeId) {
        $builder = $this->db->table('branches');
        $builder->select('branches.*, AVG(branch_ratings.rating) AS avg_rating, COUNT(branch_ratings.branch_id) AS review_count, COUNT(vehicles.branch_id) AS vehicle_count, users.name as owner_name, users.email as owner_email, users.contact_no as owner_contact_no');
        $builder->join('branch_ratings', 'branches.id = branch_ratings.branch_id', 'left');
        $builder->join('vehicles', 'vehicles.branch_id = branches.id', 'left');
        $builder->join('users', 'users.id = branches.dealer_id', 'left');
        /*$builder->where('branches.is_active', 1);*/
        $builder->where('branches.id', $storeId);
        $builder->groupBy('branches.id');
        return $builder->get()->getRowArray();
    }

    public function save_store_review($data) {
        return $this->db->table('branch_ratings')->insert($data);
    }

    public function get_single_store_all_review($storeId) {
        $builder = $this->db->table('branch_ratings');
        $builder->select('branch_ratings.*,customers.name as customer_name');
        $builder->join('customers', 'customers.id = branch_ratings.customer_id', 'left');
        $builder->where('branch_ratings.branch_id', $storeId);
        $builder->orderBy('branch_ratings.id', 'desc');
        return $builder->get()->getResultArray();
    }

    public function updateData($id, $data) {
        return $this->update($id, $data);
    }

    public function insert_deliverablesImg($data) {
        return $this->db
            ->table('branch_deliverable_images')
            ->insert($data);
    }

    public function get_branch_deliverable_imgs($branch_id) {
        $builder = $this->db->table('branch_deliverable_images');
        $builder->where('branch_id', $branch_id);
        return $builder->get()->getResultArray();
    }
}
