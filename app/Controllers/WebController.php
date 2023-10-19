<?php
namespace App\Controllers;
use CodeIgniter\HTTP\HTTPException;

use App\Models\VehicleModel;
use App\Models\BranchModel;
use App\Models\CommonModel;

class WebController extends BaseController
{
    protected $VehicleModel;
    protected $BranchModel;
    protected $CommonModel;

    public function __construct()
    {
        // create instances of models
        $this->VehicleModel = new VehicleModel();
        $this->BranchModel = new BranchModel();
        $this->CommonModel = new CommonModel();
    }

    public function view_all_stores(){
        // Fetch stores ordered by average ratings and reviews
        $popularStores = $this->BranchModel->getPopularStores();
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
        return view('web/pages/view-all-stores', $this->pageData);
    }

    public function store_details($storeId){
        $storeId = $this->decryptId($storeId);
        if($storeId==false){
            echo 'Access Denied'; exit;
        }

        $this->pageData['storeDetails'] = $this->BranchModel->getStoreDetails($storeId);
        $onSaleVehicles = $this->VehicleModel->getStoreOnSaleVehicles($storeId);
        $this->pageData['onSaleVehicles'] = [];
        if(isset($onSaleVehicles) && !empty($onSaleVehicles)){
            foreach($onSaleVehicles as $vehicle){
                $vehicle['wishlist_status'] = 0;
                if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                    $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
                    $vehicle['wishlist_status'] = $wishlistStatus; // Merge wishlist status with vehicle data
                }

                // Calculate the EMI
                $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
                $monthly_emi = round($emi, 2);
                
                $encryptedId = $this->encryptId($vehicle['id']);
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi);
                $temp3[] = array_merge($array1,$array2); 
            }
            $this->pageData['onSaleVehicles'] = $temp3;
        }

        
        $featuredVehicles = $this->VehicleModel->getStoreOnFeaturedVehicles($storeId);
        $this->pageData['featuredVehicles'] = [];
        if(isset($featuredVehicles) && !empty($featuredVehicles)){
            foreach($featuredVehicles as $vehicle){
                $vehicle['wishlist_status'] = 0;
                if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                    $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
                    $vehicle['wishlist_status'] = $wishlistStatus; // Merge wishlist status with vehicle data
                }

                // Calculate the EMI
                $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
                $monthly_emi = round($emi, 2);
                
                $encryptedId = $this->encryptId($vehicle['id']);
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi);
                $temp1[] = array_merge($array1,$array2); 
            }
            $this->pageData['featuredVehicles'] = $temp1;
        }

        $ourCollections = $this->VehicleModel->getOurCollections($storeId);
        $this->pageData['ourCollections'] = [];
        if(isset($ourCollections) && !empty($ourCollections)){
            foreach($ourCollections as $vehicle){
                $vehicle['monthly_emi'] = 0.0;
                $vehicle['wishlist_status'] = 0;
                if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                    $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
                    $vehicle['wishlist_status'] = $wishlistStatus; // Merge wishlist status with vehicle data
                }

                // Calculate the EMI
                $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
                $monthly_emi = round($emi, 2);
                
                $encryptedId = $this->encryptId($vehicle['id']);
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi);
                $temp2[] = array_merge($array1,$array2); 
            }
            $this->pageData['ourCollections'] = $temp2;
        }

        //echo '<pre>'; print_r($this->pageData['storeDetails']); exit;
        return view('web/pages/store-details', $this->pageData);
    }

    public function vehicle_details($vehicleId=''){
        $vehicleId = $this->decryptId($vehicleId);
        if($vehicleId==false){
            echo 'Access Denied'; exit;
        }

        $this->pageData['vehicleDetails'] = $this->VehicleModel->getVehicleDetails($vehicleId);
        
        //echo '<pre>'; print_r($this->pageData['vehicleDetails']); exit;
        return view('web/pages/vehicle-details', $this->pageData);
    }



}
