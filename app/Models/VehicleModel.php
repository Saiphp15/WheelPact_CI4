<?php
namespace App\Models;
use CodeIgniter\Model;

class VehicleModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'vehicles';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['branch_id', 'vehicle_type','cmp_id', 'model_id', 'manufacture_year', 'price', 'mileage', 'color_id', 'transmission_id', 'fuel_type', 'owner'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>