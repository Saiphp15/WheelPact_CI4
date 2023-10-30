<?php

namespace App\Controllers;
use App\Models\VehicleModel;
use App\Models\BranchModel;
use App\Models\CommonModel;
use App\Models\CompanyModel;

class HomeController extends BaseController
{
    protected $VehicleModel;
    protected $BranchModel;
    protected $CommonModel;
    protected $CompanyModel;

    public function __construct()
    {
        // create instances of models
        $this->VehicleModel = new VehicleModel();
        $this->BranchModel = new BranchModel();
        $this->CommonModel = new CommonModel();
        $this->CompanyModel = new CompanyModel();
    }

    public function index()
    {
        // Fetch stores ordered by average ratings and reviews
        $popularStores = $this->BranchModel->getPopularStores($this->vtype);
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

        $featuredVehicles = $this->VehicleModel->getFeaturedVehicles($this->vtype);
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

        $latestVehicleAdditions = $this->VehicleModel->getLatestVehicleAdditions($this->vtype);
        $this->pageData['latestVehicleAdditions'] = [];
        if(isset($latestVehicleAdditions) && !empty($latestVehicleAdditions)){
            foreach($latestVehicleAdditions as $vehicle){
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
            $this->pageData['latestVehicleAdditions'] = $temp2;
        }

        $onSaleVehicles = $this->VehicleModel->getOnSaleVehicles($this->vtype);
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
                $discountedOffPrice = 0;
                if($vehicle['onsale_status']==1){
                    $discountedOffPrice = $vehicle['selling_price'] * $vehicle['onsale_percentage'] / 100;
                }
                $discountedPrice = $vehicle['selling_price'];
                if($vehicle['onsale_status']==1){
                    $discountedPrice = $vehicle['selling_price'] - $discountedOffPrice;
                }
                
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi, "discounted_off_price" => $discountedOffPrice, "discounted_price" => $discountedPrice);
                $temp3[] = array_merge($array1,$array2); 
            }
            $this->pageData['onSaleVehicles'] = $temp3;
        }

        $this->pageData['vehicleBrands'] = $this->CompanyModel->getCompanyList();
        
        //echo '<pre>'; print_r($this->pageData['featuredVehicles']); exit;
        return view('index', $this->pageData);
    }
}
