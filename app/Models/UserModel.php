<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model {

    protected $DBGroup              = 'default';
	protected $table                = 'users';
    protected $primaryKey           = 'id';
	protected $returnType           = 'array';
    protected $allowedFields        = ['name', 'email', 'contact_no'];

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
	
}

?>