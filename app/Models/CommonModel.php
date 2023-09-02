<?php
namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;

class CommonModel extends Model {

    protected $DBGroup              = 'default';
    protected $table                = 'Common';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

   
    protected $db;
	
    public function __construct()
    {
        parent::__construct();

        $this->db = \Config\Database::connect();

    }

    public function get_all_country_data(){
		$query = $this->db->query('select * from Countries order by name asc');
        return $query->getResult();
	}

	public function get_all_state_data(){
		$query = $this->db->query('select * from States order by name asc');
        return $query->getResult();
	}

	public function get_all_city_data(){
		$query = $this->db->query('select * from Cities order by name asc');
        return $query->getResult();
	}

    public function update_data($id, $table, $data = array())
    {
        $this->db->table($table)->update($data, array(
            "id" => $id,
        ));
        return $this->db->affectedRows();
    }

    public function get_country_states($country_id){
		$query = $this->db->query('select * from states where country_id='.$country_id.' order by name asc');
        return $query->getResult();
	}

	public function get_state_cities($state_id){
		$query = $this->db->query('select * from cities where state_id='.$state_id.' order by name asc');
        return $query->getResult();
	}

	public function get_fuel_types(){
		$query = $this->db->query('select * from fueltypes order by name asc');
		return $query->getResult();
	}

	public function get_fuel_variants(){
		$query = $this->db->query('select * from fuelvariants order by id asc');
		return $query->getResult();
	}

	public function get_vehicle_transmissions(){
		$query = $this->db->query('select * from transmissions order by id asc');
		return $query->getResult();
	}

	public function get_vehicle_colors(){
		$query = $this->db->query('select * from colors order by name asc');
		return $query->getResult();
	}

	public function get_registered_state_rto($state_id){
		$query = $this->db->query('select * from indiarto where state_id='.$state_id.' order by rto_state_code asc');
        return $query->getResult();
	}

	public function add_vehicle_wishlist($data){
		// Insert the data into a table
		$status = $this->db->table('wishlistvehicles')->insert($data);
		if($status==true){
			return true;
		}else{
			return false;
		}
	}

	public function remove_vehicle_wishlist($condition){
		// Use the delete method to remove the record
		$this->db->table('wishlistvehicles')->where($condition)->delete();

		// Get the number of affected rows
		$affectedRows = $this->db->affectedRows();
	
		// Optionally, you can check if the delete operation was successful
		if ($affectedRows > 0) {
			return true; // Record(s) deleted successfully
		} else {
			return false; // No records were deleted or an error occurred
		}
	}

	public function getWishlistStatus($customerId,$vehicleId){
		$query = $this->db->query('select * from wishlistvehicles where customer_id='.$customerId.' and vehicle_id='.$vehicleId.' ');
        $result = $query->getResult();
		if (!empty($result)) {
			return true; // Records were found
		} else {
			return false; // No records were found
		}
	}

}

?>