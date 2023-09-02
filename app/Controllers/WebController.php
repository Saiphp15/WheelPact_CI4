<?php
namespace App\Controllers;
use CodeIgniter\HTTP\HTTPException;

class WebController extends BaseController
{
    public function vehicle_details($vehicleId='')
    {
        //echo 'vehicle id = '.$vehicleId; 
        $vehicleId = $this->decryptId($vehicleId);
        //echo '<pre>'; print_r($vehicleId); exit;
        if($vehicleId==false){
            echo 'Access Denied'; exit;
        }

        return view('web/pages/vehicle-details', $this->pageData);
    }



}
