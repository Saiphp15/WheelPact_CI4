<?php
namespace App\Models;
use CodeIgniter\Model;

class CompanyModelModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'vehiclecompaniesmodels';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['cmp_id', 'model_name', 'is_active'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

	
}

?>