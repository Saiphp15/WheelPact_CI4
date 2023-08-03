<?php
namespace App\Models;
use CodeIgniter\Model;

class VehicleModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'vehicles';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['branch_id', 'vehicle_type','cmp_id', 'model_id', 'fuel_type', 'variant_id', 'mileage', 'kms_driven', 'owner', 'transmission_id', 'color_id', 'manufacture_year', 'registration_year', 'registered_state_id', 'rto', 'insurance_type', 'insurance_validity', 'accidental_status', 'flooded_status', 'last_service_kms', 'last_service_date', 'car_no_of_airbags', 'car_central_locking', 'car_seat_upholstery', 'car_sunroof', 'car_integrated_music_system', 'car_rear_ac', 'car_outside_rear_view_mirrors', 'car_power_windows', 'car_engine_start_stop', 'car_headlamps', 'car_power_steering', 'bike_headlight_type', 'bike_odometer', 'bike_drl', 'bike_mobile_connectivity', 'bike_gps_navigation', 'bike_usb_charging_port', 'bike_low_battery_indicator', 'bike_under_seat_storage', 'bike_speedometer', 'bike_stand_alarm', 'bike_low_fuel_indicator', 'bike_low_oil_indicator', 'bike_start_type', 'bike_kill_switch', 'bike_break_light', 'bike_turn_signal_indicator', 'regular_price', 'selling_price', 'pricing_type','thumbnail_url','created_by','created_datetime','updated_by','updated_datetime'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>