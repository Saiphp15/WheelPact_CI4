<?php
namespace App\Controllers;
use CodeIgniter\HTTP\HTTPException;

class VehicleController extends BaseController
{
    public function vehicle_details($vehicle_id='')
    {
        echo 'vehicle id = '.$vehicle_id; exit;

        return view('web/pages/vehicle-details', $this->pageData);
    }



}
