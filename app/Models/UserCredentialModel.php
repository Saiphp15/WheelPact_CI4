<?php
namespace App\Models;
use CodeIgniter\Model;

class UserCredentialModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'userscredentials';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['user_id', 'password','is_active'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>