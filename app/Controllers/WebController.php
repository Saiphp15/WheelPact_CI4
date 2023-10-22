<?php
namespace App\Controllers;
use CodeIgniter\HTTP\HTTPException;

use App\Models\VehicleModel;
use App\Models\BranchModel;
use App\Models\CommonModel;
use App\Models\CompanyModel;

class WebController extends BaseController
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

    public function view_all_stores(){
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
        return view('web/pages/view-all-stores', $this->pageData);
    }

    public function view_all_featured_vehicles(){
        // $featuredVehicles = $this->VehicleModel->getFeaturedVehicles($this->vtype);
        // $this->pageData['featuredVehicles'] = [];
        // if(isset($featuredVehicles) && !empty($featuredVehicles)){
        //     foreach($featuredVehicles as $vehicle){
        //         $vehicle['wishlist_status'] = 0;
        //         if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
        //             $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
        //             $vehicle['wishlist_status'] = $wishlistStatus; // Merge wishlist status with vehicle data
        //         }

        //         // Calculate the EMI
        //         $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
        //         $monthly_emi = round($emi, 2);
                
        //         $encryptedId = $this->encryptId($vehicle['id']);
        //         $array1 = $vehicle;
        //         $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi);
        //         $temp1[] = array_merge($array1,$array2); 
        //     }
        //     $this->pageData['featuredVehicles'] = $temp1;
        // }
        return view('web/pages/view-all-featured-vehicles', $this->pageData);
    }

    public function load_more_featured_vehicles(){
        $output = '';
        $limit = $this->request->getVar('limit');
        $start = $this->request->getVar('start');
        $featuredVehicles = $this->VehicleModel->load_more_featured_vehicles($this->vtype,$limit, $start);
        if(count($featuredVehicles) > 0)
        {
            foreach ($featuredVehicles as $vehicle) {
                $loggedInCustomerId = 0;
                $wishlistStatus = 0;
                if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                    $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
                    $loggedInCustomerId = isset($this->pageData['customerData']['id'])?$this->pageData['customerData']['id']:0;
                }

                // Calculate the EMI
                $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
                $monthly_emi = round($emi, 2);
                $monthly_emi = number_format($monthly_emi, 2, '.', ',');
                
                $encryptedId = $this->encryptId($vehicle['id']);
                
                $vehicleDetailsUrl = base_url('vehicle-details/'.$encryptedId);
                $thumbnail_url = isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png');
                
                $makeName = isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name';
                $makeModelName = isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name';
                $manufacture_year = isset($vehicle['manufacture_year'])?$vehicle['manufacture_year']:'';
                $kms_driven = isset($vehicle['kms_driven'])?$vehicle['kms_driven']:'';
                $fuelTypeName = isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA';
                $owner = '';
                if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                    if($vehicle['owner']==1){
                        $owner = '<h6>1st</h6>';
                    }elseif($vehicle['owner']==2){
                        $owner = '<h6>2nd</h6>';
                    }elseif($vehicle['owner']==3){
                        $owner = '<h6>3rd</h6>';
                    }elseif($vehicle['owner']==4){
                        $owner = '<h6>3+ Owner</h6>';
                    }
                }

                $vehicleId = isset($vehicle['id'])?$vehicle['id']:0;

                $addRemoveVehicleWhishlistSpan = '';
                $remove_vehicle_wishlist = base_url('/api/customer/remove-vehicle-wishlist');
                $add_vehicle_wishlist = base_url('/api/customer/add-vehicle-wishlist');

                if(isset($wishlistStatus) && !empty($wishlistStatus)){ 
                    if($wishlistStatus==1){ 
                        $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart press" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="remove" data-actionurl="'.$remove_vehicle_wishlist.'"></i>';
                    }else{ 
                        $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="add" data-actionurl="'.$add_vehicle_wishlist.'"></i>';
                    } 
                }else{ 
                    $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="add" data-actionurl="'.$add_vehicle_wishlist.'"></i>';
                } 

                $pricing_type = '';
                if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){$pricing_type='Fixed';}elseif($vehicle['pricing_type']==2){$pricing_type='Negotiable';} }else{$pricing_type= 'NA';}
                $selling_price = isset($vehicle['selling_price'])? number_format($vehicle['selling_price'], 2, '.', ','):'';
                
                $output .= '
                <div class="col-md-6 col-lg-4 post_data">
                    <div class="vehicle-wrapper">
                        <a href="'.$vehicleDetailsUrl.'">
                            <img src="'.$thumbnail_url.'">
                        </a>
                        <div class="vehicle-wrapper-title">
                            <a href="'.$vehicleDetailsUrl.'">
                                <h5>'.$makeName.' '.$makeModelName.'</h5>
                            </a>
                        </div>
                        <div class="d-flex vehicle-overview">
                            <div class="overview-badge">
                                <h6>Year</h6>
                                <h5>'.$manufacture_year.'</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Driven</h6>
                                <h5>'.$kms_driven.'km</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Fuel Type</h6>
                                '.$fuelTypeName.'
                            </div>
                            <div class="overview-badge">
                                <h6>Owner</h6>
                                '.$owner.'
                            </div>
                            <div class="wishlist">
                                <span class="addRemoveVehicleWhishlistSpan_'.$vehicleId.'">
                                    '.$addRemoveVehicleWhishlistSpan.'
                                </span>
                            </div>
                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                            </div>
                        </div>
                        <div class="vehicle-price d-flex align-items-center">
                            <h5>?'.$selling_price.'</h5>
                            <h6>('.$pricing_type.')</h6>
                        </div>
                        <div class="vehicle-emi d-flex">
                            <h6>EMI from</h6>
                            <h6>'.$monthly_emi.'/month</h6>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        echo $output;
    }

    public function view_all_latest_addition_vehicles(){
        // $latestVehicleAdditions = $this->VehicleModel->getLatestVehicleAdditions($this->vtype);
        // $this->pageData['latestVehicleAdditions'] = [];
        // if(isset($latestVehicleAdditions) && !empty($latestVehicleAdditions)){
        //     foreach($latestVehicleAdditions as $vehicle){
        //         $vehicle['monthly_emi'] = 0.0;
        //         $vehicle['wishlist_status'] = 0;
        //         if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
        //             $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
        //             $vehicle['wishlist_status'] = $wishlistStatus; // Merge wishlist status with vehicle data
        //         }

        //         // Calculate the EMI
        //         $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
        //         $monthly_emi = round($emi, 2);
                
        //         $encryptedId = $this->encryptId($vehicle['id']);
        //         $array1 = $vehicle;
        //         $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi);
        //         $temp2[] = array_merge($array1,$array2); 
        //     }
        //     $this->pageData['latestVehicleAdditions'] = $temp2;
        // }
        return view('web/pages/view-all-latest_addition-vehicles', $this->pageData);
    }

    public function load_more_latest_addition_vehicles(){
        $output = '';
        $limit = $this->request->getVar('limit');
        $start = $this->request->getVar('start');
        $featuredVehicles = $this->VehicleModel->load_more_latest_addition_vehicles($this->vtype,$limit, $start);
        if(count($featuredVehicles) > 0)
        {
            foreach ($featuredVehicles as $vehicle) {
                $loggedInCustomerId = 0;
                $wishlistStatus = 0;
                if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                    $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
                    $loggedInCustomerId = isset($this->pageData['customerData']['id'])?$this->pageData['customerData']['id']:0;
                }

                // Calculate the EMI
                $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
                $monthly_emi = round($emi, 2);
                $monthly_emi = number_format($monthly_emi, 2, '.', ',');
                
                $encryptedId = $this->encryptId($vehicle['id']);
                
                $vehicleDetailsUrl = base_url('vehicle-details/'.$encryptedId);
                $thumbnail_url = isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png');
                
                $makeName = isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name';
                $makeModelName = isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name';
                $manufacture_year = isset($vehicle['manufacture_year'])?$vehicle['manufacture_year']:'';
                $kms_driven = isset($vehicle['kms_driven'])?$vehicle['kms_driven']:'';
                $fuelTypeName = isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA';
                $owner = '';
                if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                    if($vehicle['owner']==1){
                        $owner = '<h6>1st</h6>';
                    }elseif($vehicle['owner']==2){
                        $owner = '<h6>2nd</h6>';
                    }elseif($vehicle['owner']==3){
                        $owner = '<h6>3rd</h6>';
                    }elseif($vehicle['owner']==4){
                        $owner = '<h6>3+ Owner</h6>';
                    }
                }

                $vehicleId = isset($vehicle['id'])?$vehicle['id']:0;

                $addRemoveVehicleWhishlistSpan = '';
                $remove_vehicle_wishlist = base_url('/api/customer/remove-vehicle-wishlist');
                $add_vehicle_wishlist = base_url('/api/customer/add-vehicle-wishlist');

                if(isset($wishlistStatus) && !empty($wishlistStatus)){ 
                    if($wishlistStatus==1){ 
                        $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart press" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="remove" data-actionurl="'.$remove_vehicle_wishlist.'"></i>';
                    }else{ 
                        $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="add" data-actionurl="'.$add_vehicle_wishlist.'"></i>';
                    } 
                }else{ 
                    $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="add" data-actionurl="'.$add_vehicle_wishlist.'"></i>';
                } 

                $pricing_type = '';
                if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){$pricing_type='Fixed';}elseif($vehicle['pricing_type']==2){$pricing_type='Negotiable';} }else{$pricing_type= 'NA';}
                $selling_price = isset($vehicle['selling_price'])? number_format($vehicle['selling_price'], 2, '.', ','):'';
                
                $output .= '
                <div class="col-md-6 col-lg-4 post_data">
                    <div class="vehicle-wrapper">
                        <a href="'.$vehicleDetailsUrl.'">
                            <img src="'.$thumbnail_url.'">
                        </a>
                        <div class="vehicle-wrapper-title">
                            <a href="'.$vehicleDetailsUrl.'">
                                <h5>'.$makeName.' '.$makeModelName.'</h5>
                            </a>
                        </div>
                        <div class="d-flex vehicle-overview">
                            <div class="overview-badge">
                                <h6>Year</h6>
                                <h5>'.$manufacture_year.'</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Driven</h6>
                                <h5>'.$kms_driven.'km</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Fuel Type</h6>
                                '.$fuelTypeName.'
                            </div>
                            <div class="overview-badge">
                                <h6>Owner</h6>
                                '.$owner.'
                            </div>
                            <div class="wishlist">
                                <span class="addRemoveVehicleWhishlistSpan_'.$vehicleId.'">
                                    '.$addRemoveVehicleWhishlistSpan.'
                                </span>
                            </div>
                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                            </div>
                        </div>
                        <div class="vehicle-price d-flex align-items-center">
                            <h5>?'.$selling_price.'</h5>
                            <h6>('.$pricing_type.')</h6>
                        </div>
                        <div class="vehicle-emi d-flex">
                            <h6>EMI from</h6>
                            <h6>'.$monthly_emi.'/month</h6>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        echo $output;
    }

    public function view_all_onsale_vehicles(){
        return view('web/pages/view-all-onsale-vehicles', $this->pageData);
    }

    public function load_more_onsale_vehicles(){
        $output = '';
        $limit = $this->request->getVar('limit');
        $start = $this->request->getVar('start');
        $onSaleVehicles = $this->VehicleModel->load_more_onsale_vehicles($this->vtype,$limit, $start);
        if(count($onSaleVehicles) > 0)
        {
            foreach ($onSaleVehicles as $vehicle) {
                $loggedInCustomerId = 0;
                $wishlistStatus = 0;
                if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                    $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicle['id']); // Fetch wishlist status for the current vehicle
                    $loggedInCustomerId = isset($this->pageData['customerData']['id'])?$this->pageData['customerData']['id']:0;
                }

                // Calculate the EMI
                $emi = $this->calculateEMI($vehicle['selling_price'], $vehicle['avg_interest_rate'], $vehicle['tenure_months']);
                $monthly_emi = round($emi, 2);
                $monthly_emi = number_format($monthly_emi, 2, '.', ',');
                
                $encryptedId = $this->encryptId($vehicle['id']);
                $discountedOffPrice = 0;
                if($vehicle['onsale_status']==1){
                    $discountedOffPrice = $vehicle['selling_price'] * $vehicle['onsale_percentage'] / 100;
                }
                $discountedPrice = $vehicle['selling_price'];
                if($vehicle['onsale_status']==1){
                    $discountedPrice = $vehicle['selling_price'] - $discountedOffPrice;
                    $discountedPrice = number_format($discountedPrice, 2, '.', ',');
                }

                $discountedOffPrice = number_format($discountedOffPrice, 2, '.', ',');

                $vehicleDetailsUrl = base_url('vehicle-details/'.$encryptedId);
                $thumbnail_url = isset($vehicle['thumbnail_url']) && !empty($vehicle['thumbnail_url'])?$vehicle['thumbnail_url']:base_url('assets/admin/src/images/default-img.png');
                
                $makeName = isset($vehicle['makeName'])?$vehicle['makeName']:'Brand Name';
                $makeModelName = isset($vehicle['makeModelName'])?$vehicle['makeModelName']:'Model Name';
                $manufacture_year = isset($vehicle['manufacture_year'])?$vehicle['manufacture_year']:'';
                $kms_driven = isset($vehicle['kms_driven'])?$vehicle['kms_driven']:'';
                $fuelTypeName = isset($vehicle['fuelTypeName'])?$vehicle['fuelTypeName']:'NA';
                $owner = '';
                if(isset($vehicle['owner']) && !empty($vehicle['owner'])){
                    if($vehicle['owner']==1){
                        $owner = '<h6>1st</h6>';
                    }elseif($vehicle['owner']==2){
                        $owner = '<h6>2nd</h6>';
                    }elseif($vehicle['owner']==3){
                        $owner = '<h6>3rd</h6>';
                    }elseif($vehicle['owner']==4){
                        $owner = '<h6>3+ Owner</h6>';
                    }
                }

                $vehicleId = isset($vehicle['id'])?$vehicle['id']:0;

                $addRemoveVehicleWhishlistSpan = '';
                $remove_vehicle_wishlist = base_url('/api/customer/remove-vehicle-wishlist');
                $add_vehicle_wishlist = base_url('/api/customer/add-vehicle-wishlist');

                if(isset($wishlistStatus) && !empty($wishlistStatus)){ 
                    if($wishlistStatus==1){ 
                        $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart press" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="remove" data-actionurl="'.$remove_vehicle_wishlist.'"></i>';
                    }else{ 
                        $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="add" data-actionurl="'.$add_vehicle_wishlist.'"></i>';
                    } 
                }else{ 
                    $addRemoveVehicleWhishlistSpan = '<i class="icofont-heart" data-customerid="'.$loggedInCustomerId.'" data-vehicleid="'.$vehicleId.'" data-operation="add" data-actionurl="'.$add_vehicle_wishlist.'"></i>';
                } 

                $pricing_type = '';
                if(isset($vehicle['pricing_type']) && !empty($vehicle['pricing_type'])){ if($vehicle['pricing_type']==1){$pricing_type='Fixed';}elseif($vehicle['pricing_type']==2){$pricing_type='Negotiable';} }else{$pricing_type= 'NA';}
                $selling_price = isset($vehicle['selling_price'])? number_format($vehicle['selling_price'], 2, '.', ','):'';
                //$selling_price = number_format($selling_price, 2, '.', ',');
                
                $output .= '
                <div class="col-md-6 col-lg-4 post_data">
                    <div class="vehicle-wrapper">
                        <a href="'.$vehicleDetailsUrl.'">
                            <img src="'.$thumbnail_url.'">
                        </a>
                        <div class="vehicle-offer-badge">
                            <h6><i class="icofont-sale-discount"></i>?'.$discountedOffPrice.' off</h6>
                        </div>
                        <div class="vehicle-wrapper-title">
                            <a href="'.$vehicleDetailsUrl.'">
                                <h5>'.$makeName.' '.$makeModelName.'</h5>
                            </a>
                        </div>
                        <div class="d-flex vehicle-overview">
                            <div class="overview-badge">
                                <h6>Year</h6>
                                <h5>'.$manufacture_year.'</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Driven</h6>
                                <h5>'.$kms_driven.'km</h5>
                            </div>
                            <div class="overview-badge">
                                <h6>Fuel Type</h6>
                                '.$fuelTypeName.'
                            </div>
                            <div class="overview-badge">
                                <h6>Owner</h6>
                                '.$owner.'
                            </div>
                            <div class="wishlist">
                                <span class="addRemoveVehicleWhishlistSpan_'.$vehicleId.'">
                                    '.$addRemoveVehicleWhishlistSpan.'
                                </span>
                            </div>
                            <div class="verified-tag">
                                <span class="verification-badge"><i class="icofont-check-circled"></i> Verified Seller</span>
                            </div>
                        </div>
                        <div class="vehicle-price d-flex align-items-center">
                            <h5>?'.$discountedPrice.'</h5>
                            <h6>('.$pricing_type.')</h6>
                        </div>
                        <p class="vehicle-strike-price">?'.$selling_price.'</p>
                        <div class="vehicle-emi d-flex">
                            <h6>EMI from</h6>
                            <h6>'.$monthly_emi.'/month</h6>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        echo $output;
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

        $this->pageData['storeReviews'] = $this->BranchModel->get_single_store_all_review($storeId);
        $this->pageData['vehicleBrands'] = $this->CompanyModel->getCompanyList();
       
        //echo '<pre>'; print_r($this->pageData['storeReviews']); exit;
        return view('web/pages/store-details', $this->pageData);
    }

    public function vehicle_details($vehicleId=''){
        $vehicleId = $this->decryptId($vehicleId);
        if($vehicleId==false){
            echo 'Access Denied'; exit;
        }

        $vehicleDetails = $this->VehicleModel->getVehicleDetails($vehicleId);
        $this->pageData['vehicleDetails'] = $vehicleDetails;
        //echo '<pre>'; print_r($vehicleDetails); exit;
        if(isset($vehicleDetails) && !empty($vehicleDetails)){
                
            $vehicleDetails['monthly_emi'] = 0.0;
            $vehicleDetails['wishlist_status'] = 0;
            if(isset($this->pageData['customerData']) && !empty($this->pageData['customerData'])){
                $wishlistStatus = $this->CommonModel->getWishlistStatus($this->pageData['customerData']['id'],$vehicleDetails['id']); // Fetch wishlist status for the current vehicle
                $vehicleDetails['wishlist_status'] = $wishlistStatus; // Merge wishlist status with vehicle data
            }

            // Calculate the EMI
            $emi = $this->calculateEMI($vehicleDetails['selling_price'], $vehicleDetails['avg_interest_rate'], $vehicleDetails['tenure_months']);
            $monthly_emi = round($emi, 2);
            
            $encryptedId = $this->encryptId($vehicleDetails['id']);
            $array1 = $vehicleDetails;
            $array2 = array("encrypted_id"=>$encryptedId, "monthly_emi"=>$monthly_emi);
            $result = array_merge($array1,$array2); 
            
            $this->pageData['vehicleDetails'] = $result;
        }

        // get vehicle images
        $vehicleImages = $this->VehicleModel->getVehicleImages($vehicleId);
        $this->pageData['vehicleDetails']['vehicleImages'] = [];
        if(isset($vehicleImages) &&!empty($vehicleImages)){
            
            $this->pageData['vehicleDetails']['vehicleImages'] = $vehicleImages;
            
        }
        
        //echo '<pre>'; print_r($this->pageData['vehicleDetails']); exit;
        return view('web/pages/vehicle-details', $this->pageData);
    }

}
