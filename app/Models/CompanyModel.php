<?php
namespace App\Models;
use CodeIgniter\Model;

class CompanyModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'vehiclecompanies';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['cmp_name', 'cmp_logo', 'vehicle_type', 'is_active'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>