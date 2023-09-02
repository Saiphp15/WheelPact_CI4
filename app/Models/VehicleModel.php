<?php
namespace App\Models;
use CodeIgniter\Model;

class VehicleModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'vehicles';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['branch_id', 'vehicle_type','cmp_id', 'model_id', 'fuel_type', 'variant_id', 'mileage', 'kms_driven', 'owner', 'transmission_id', 'color_id', 'featured_status', 'onsale_status', 'onsale_percentage', 'manufacture_year', 'registration_year', 'registered_state_id', 'rto', 'insurance_type', 'insurance_validity', 'accidental_status', 'flooded_status', 'last_service_kms', 'last_service_date', 'car_no_of_airbags', 'car_central_locking', 'car_seat_upholstery', 'car_sunroof', 'car_integrated_music_system', 'car_rear_ac', 'car_outside_rear_view_mirrors', 'car_power_windows', 'car_engine_start_stop', 'car_headlamps', 'car_power_steering', 'bike_headlight_type', 'bike_odometer', 'bike_drl', 'bike_mobile_connectivity', 'bike_gps_navigation', 'bike_usb_charging_port', 'bike_low_battery_indicator', 'bike_under_seat_storage', 'bike_speedometer', 'bike_stand_alarm', 'bike_low_fuel_indicator', 'bike_low_oil_indicator', 'bike_start_type', 'bike_kill_switch', 'bike_break_light', 'bike_turn_signal_indicator', 'regular_price', 'selling_price', 'pricing_type','thumbnail_url','is_active','created_by','created_datetime','updated_by','updated_datetime'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function save_vehicle_images($data){
        return $this->insert($data);
    }

    public function getVehicleList(){
        $builder = $this->db->table('vehicles as v');
        $builder->select(
            'v.id, v.thumbnail_url,
            b.name as branch_name,
            (CASE 
                WHEN v.vehicle_type = 1 THEN "Car" 
                WHEN v.vehicle_type = 2 THEN "Bike" 
                ELSE "Unknown" 
            END) as vehicle_type_name, 
            vc.cmp_name, vcm.model_name, v.registration_year, v.selling_price');
        $builder->join('branches as b', 'b.id = v.branch_id');
        $builder->join('vehiclecompanies as vc', 'vc.id = v.cmp_id');
        $builder->join('vehiclecompaniesmodels as vcm', 'vcm.id = v.model_id');
        return $builder->get()->getResultArray();
    }

    public function getVehicleDetails($vehicleId){
        $query = $this->db->table('vehicles as v')->select('v.*')->where('v.id', $vehicleId);
        return $query->get()->getRowArray();
    }

    public function updateData($id, $data){
        return $this->update($id, $data);
    }
	
}

?>