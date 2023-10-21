<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'customers';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['name', 'email', 'contact_no', 'otp', 'otp_status'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>