<?php

namespace App\Controllers;
use App\Models\VehicleModel;
use App\Models\BranchModel;

class HomeController extends BaseController
{
    protected $VehicleModel;
    protected $BranchModel;

    public function index()
    {
        // create instances of models
        $this->VehicleModel = new VehicleModel();
        $this->BranchModel = new BranchModel();

        // Fetch stores ordered by average ratings and reviews
        $popularStores = $this->BranchModel
            ->select('branches.*, AVG(branch_ratings.rating) AS avg_rating, COUNT(branch_ratings.branch_id) AS review_count, COUNT(vehicles.branch_id) AS vehicle_count')
            ->join('branch_ratings', 'branches.id = branch_ratings.branch_id', 'left')
            ->join('vehicles', 'vehicles.branch_id = branches.id', 'left')
            ->where('branches.is_active', 1)
            ->groupBy('branches.id')
            ->orderBy('avg_rating', 'desc')
            ->findAll();
        $this->pageData['popularStores'] = [];
        if(isset($popularStores) && !empty($popularStores)){
            foreach($popularStores as $store){
                $encryptedId = $this->encryptId($store['id']);
                $array1 = $store;
                $array2 = array("encrypted_id"=>$encryptedId);
                $temp[] = array_merge($array1,$array2); 
            }
            $this->pageData['popularStores'] = $temp;
        }

        $featuredVehicles = $this->VehicleModel
        ->select('vehicles.*, vehiclecompanies.cmp_name as makeName, vehiclecompaniesmodels.model_name as makeModelName, fueltypes.name as fuelTypeName')
        ->join('vehiclecompanies', 'vehiclecompanies.id = vehicles.cmp_id', 'left')
        ->join('vehiclecompaniesmodels', 'vehiclecompaniesmodels.id = vehicles.model_id', 'left')
        ->join('fueltypes', 'fueltypes.id = vehicles.fuel_type', 'left')
        ->where('vehicles.featured_status', 1)
        ->where('vehicles.is_active', 1)
        ->orderBy('vehicles.id', 'desc')
        ->findAll();
        $this->pageData['featuredVehicles'] = [];
        if(isset($featuredVehicles) && !empty($featuredVehicles)){
            foreach($featuredVehicles as $vehicle){
                $encryptedId = $this->encryptId($vehicle['id']);
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId);
                $temp1[] = array_merge($array1,$array2); 
            }
            $this->pageData['featuredVehicles'] = $temp1;
        }

        $latestVehicleAdditions = $this->VehicleModel
        ->select('vehicles.*, vehiclecompanies.cmp_name as makeName, vehiclecompaniesmodels.model_name as makeModelName, fueltypes.name as fuelTypeName')
        ->join('vehiclecompanies', 'vehiclecompanies.id = vehicles.cmp_id', 'left')
        ->join('vehiclecompaniesmodels', 'vehiclecompaniesmodels.id = vehicles.model_id', 'left')
        ->join('fueltypes', 'fueltypes.id = vehicles.fuel_type', 'left')
        ->where('vehicles.is_active', 1)
        ->orderBy('vehicles.id', 'desc')
        ->limit(10) 
        ->findAll();
        $this->pageData['latestVehicleAdditions'] = [];
        if(isset($latestVehicleAdditions) && !empty($latestVehicleAdditions)){
            foreach($latestVehicleAdditions as $vehicle){
                $encryptedId = $this->encryptId($vehicle['id']);
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId);
                $temp2[] = array_merge($array1,$array2); 
            }
            $this->pageData['latestVehicleAdditions'] = $temp2;
        }
        
        //echo '<pre>'; print_r($this->pageData['featuredVehicles']); exit;
        return view('index', $this->pageData);
    }
}
