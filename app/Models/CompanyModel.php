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
    function insert_company_details($data) {
        //return $this->insert($data);
        return $this->db
            ->table('vehiclecompanies')
            ->insert($data);
    }

    function insert_company_models($data) {
        return $this->db
            ->table('vehiclecompaniesmodels')
            ->insertBatch($data);
    }

    function getCompanyList($cmp_id = '') {
        $builder = $this->db->table('vehiclecompanies as vc');
        $builder->select('vc.id, vc.cmp_name, vc.cmp_logo, vc.vehicle_type, vc.is_active, vcm.id as cmp_model_id, vcm.model_name, vcm.is_active as model_active');
        $builder->join('vehiclecompaniesmodels as vcm', 'vcm.cmp_id = vc.id');

        if ($cmp_id != '')
            $builder->where('vc.id', $cmp_id);

        if ($cmp_id == '')
            $builder->groupBy('vc.cmp_name');

        return $builder->get()->getResultArray();
    }
    function updateData($id, $data) {
        return $this->update($id, $data);
    }
}
