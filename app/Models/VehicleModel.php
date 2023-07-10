<?php
namespace App\Models;
use CodeIgniter\Model;

class VehicleModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'vehicles';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['make', 'model', 'year', 'price', 'mileage', 'color_id', 'transmission_id', 'fuel_type', 'address', 'city_id', 'state_id', 'country_id'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>