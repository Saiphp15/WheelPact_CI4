<?php

namespace App\Controllers;
use App\Models\VehicleModel;

class HomeController extends BaseController
{
    protected $VehicleModel;

    public function index()
    {
        // Fetch vehicle data from the database
        $this->VehicleModel = new VehicleModel();
        $vehicles = $this->VehicleModel->findAll();
        
        // Pass the data to the view
        $this->pageData['vehicles'] = $vehicles;
        //echo '<pre>'; print_r($this->pageData); exit;
        return view('index', $this->pageData);
    }
}
