<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Services;
use App\Controllers\BaseController;
use Exception;
use App\Models\UserModel;
use App\Models\CommonModel;
use App\Models\BranchModel;
use App\Models\CompanyModel;
use App\Models\VehicleModel;
use App\Models\VehicleImagesModel;
use App\Models\CompanyModelModel;

class AdminController extends BaseController{
    protected $UserModel;
    protected $CommonModel;
    protected $BranchModel;
    protected $CompanyModel;
    protected $VehicleModel;
    protected $CompanyModelModel;
    protected $VehicleImagesModel;

    public function __construct()
    {
        // Create a Model instance
        $this->UserModel    = new UserModel();
        $this->CommonModel  = new CommonModel();
        $this->BranchModel  = new BranchModel();
        $this->CompanyModel = new CompanyModel();
        $this->VehicleModel = new VehicleModel();
        $this->CompanyModelModel = new CompanyModelModel();
        $this->VehicleImagesModel = new VehicleImagesModel();
    }
    
    public function index(){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        return view('admin/dashboard');
    }

    public function dashboard(){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        $this->pageData['adminData'] = session()->get('adminData');
        return view('admin/dashboard',$this->pageData);
    }

    public function add_branch(){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        $this->pageData['adminData'] = session()->get('adminData');
        $this->pageData['dealerList'] = $this->UserModel->where('role_id', 2)->findAll();
        $this->pageData['countryList'] = $this->CommonModel->get_all_country_data();
        return view('admin/add_branch',$this->pageData);
    }

    public function save_branch(){
        // Start the transaction
        $db = db_connect();
        $db->transBegin();

        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'selectDealer' => 'required',
                'branchName' => 'required',
                'branchType' => 'required',
                'chooseCountry' => 'required',
                'chooseState' => 'required',
                'chooseCity' => 'required',
                'address' => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return to the form with errors
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            // Get the form input values
            $dealerId = $this->request->getPost('selectDealer');
            $branchName = $this->request->getPost('branchName',FILTER_SANITIZE_STRING);
            $branchThumbnailUrl = '';
            if(isset($_FILES['branchThumbnail']['name']) && !empty($_FILES['branchThumbnail']['name'])){
                $file = $this->request->getFile('branchThumbnail');
                $newName = $file->getRandomName(); // Generate a new name for the image to prevent name conflicts
                $file->move(ROOTPATH . 'public/uploads/branch_thumbnails', $newName); // Move the uploaded file to the public/uploads directory
                $branchThumbnailUrl = base_url('uploads/branch_thumbnails/' . $newName); // Get the image URL to display in the preview
            }
            $branchType = $this->request->getPost('branchType');
            $countryId = $this->request->getPost('chooseCountry');
            $stateId = $this->request->getPost('chooseState');
            $cityId = $this->request->getPost('chooseCity');
            $address = $this->request->getPost('address',FILTER_SANITIZE_STRING);

            // Prepare the data to be inserted
            $data = [
                'dealer_id' => $dealerId,
                'name' => $branchName,
                'branch_thumbnail' => $branchThumbnailUrl,
                'branch_type' => $branchType,
                'country_id' => $countryId,
                'state_id' => $stateId,
                'city_id' => $cityId,
                'address' => $address,
                'is_active' => 1,
                'created_at' => DATETIME
            ];

            // Insert the data into the database table
            $result = $this->BranchModel->insert($data);

            if (!$result) {
                // Error occurred while inserting data
                // Redirect or show error message
                return redirect()->back()->with('error', 'Failed to save branch');
            }

            // Commit the transaction if all insertions were successful
            $db->transCommit();
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            $db->transRollback();

            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while adding dealer branch: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }

        // Data inserted successfully
        // Redirect or show success message
        return redirect()->to(base_url('admin/add-branch'))->with('success', 'Branch saved successfully');

    }

    public function view_vehicles(){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        $this->pageData['adminData'] = session()->get('adminData');
        $this->pageData['vehicleList'] = $this->VehicleModel->getVehicleList();

        if(isset($this->pageData['vehicleList']) && !empty($this->pageData['vehicleList'])){
            foreach($this->pageData['vehicleList'] as $vehicle){
                $encryptedId = $this->encryptId($vehicle['id']);
                $array1 = $vehicle;
                $array2 = array("encrypted_id"=>$encryptedId);
                $temp[] = array_merge($array1,$array2); 
            }
            $this->pageData['vehicleList'] = $temp;
        }
        
        return view('admin/view_vehicles',$this->pageData);
    }

    public function add_vehicle(){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        $this->pageData['adminData'] = session()->get('adminData');
        $this->pageData['dealerList'] = $this->UserModel->where('role_id', 2)->findAll();
        $this->pageData['showroomList'] = $this->BranchModel->findAll();
        $this->pageData['cmpList'] = $this->CompanyModel->findAll(); 
        $this->pageData['fuelTypeList'] = $this->CommonModel->get_fuel_types();
        $this->pageData['fuelVariantList'] = $this->CommonModel->get_fuel_variants();
        $this->pageData['transmissionList'] = $this->CommonModel->get_vehicle_transmissions();
        $this->pageData['colorList'] = $this->CommonModel->get_vehicle_colors();
        $this->pageData['stateList'] = $this->CommonModel->get_country_states(101);
        return view('admin/add_vehicle',$this->pageData);
    }

    public function save_vehicle(){
        $db = db_connect();
        $db->transBegin();

        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'branch_id'         => 'required',
                'vehicle_type'      => 'required',
                'cmp_id'            => 'required',
                'model_id'          => 'required',
                'fuel_type'         => 'required',
                'variant_id'        => 'required',
                'mileage'           => 'required',
                'kms_driven'        => 'required',
                'owner'             => 'required',
                'transmission_id'   => 'required',
                'color_id'          => 'required',

                'manufacture_year'      => 'required',
                'registration_year'     => 'required',
                'registered_state_id'   => 'required',
                'rto'                   => 'required',

                'insurance_type'      => 'required',
                'insurance_validity'     => 'required',

                'accidental_status'  => 'required',
                'flooded_status'     => 'required',
                'last_service_kms'   => 'required',
                'last_service_date'  => 'required',
                
                'regular_price'  => 'required',
                'selling_price'  => 'required',
                'pricing_type'   => 'required',
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
            $unique_id      = uniqid();
            $branch_id      = $this->request->getPost('branch_id');
            $vehicle_type   = $this->request->getPost('vehicle_type');
            $cmp_id         = $this->request->getPost('cmp_id');
            $model_id       = $this->request->getPost('model_id');
            $fuel_type      = $this->request->getPost('fuel_type');
            $variant_id     = $this->request->getPost('variant_id');
            $mileage        = $this->request->getPost('mileage',FILTER_SANITIZE_STRING);
            $kms_driven     = $this->request->getPost('kms_driven',FILTER_SANITIZE_STRING);
            $owner          = $this->request->getPost('owner');
            $transmission_id = $this->request->getPost('transmission_id');
            $color_id       = $this->request->getPost('color_id');

            // Get the form input values
            $manufacture_year       = $this->request->getPost('manufacture_year');
            $registration_year      = $this->request->getPost('registration_year');
            $registered_state_id    = $this->request->getPost('registered_state_id');
            $rto                    = $this->request->getPost('rto');

            // Get the form input values
            $insurance_type       = $this->request->getPost('insurance_type');
            $insurance_validity      = $this->request->getPost('insurance_validity');

            // Get the form input values
            $accidental_status   = $this->request->getPost('accidental_status');
            $flooded_status      = $this->request->getPost('flooded_status');
            $last_service_kms    = $this->request->getPost('last_service_kms');
            $last_service_date   = $this->request->getPost('last_service_date');

            // Get the form input values
            $car_no_of_airbags              = $this->request->getPost('car_no_of_airbags');
            $car_central_locking            = $this->request->getPost('car_central_locking');
            $car_seat_upholstery            = $this->request->getPost('car_seat_upholstery');
            $car_sunroof                    = $this->request->getPost('car_sunroof');
            $car_integrated_music_system    = $this->request->getPost('car_integrated_music_system');
            $car_rear_ac                    = $this->request->getPost('car_rear_ac');
            $car_outside_rear_view_mirrors  = $this->request->getPost('car_outside_rear_view_mirrors');
            $car_power_windows              = $this->request->getPost('car_power_windows');
            $car_engine_start_stop          = $this->request->getPost('car_engine_start_stop');
            $car_headlamps                  = $this->request->getPost('car_headlamps');
            $car_power_steering             = $this->request->getPost('car_power_steering');

            // Get the form input values
            $bike_headlight_type            = $this->request->getPost('bike_headlight_type');
            $bike_odometer                  = $this->request->getPost('bike_odometer');
            $bike_drl                       = $this->request->getPost('bike_drl');
            $bike_mobile_connectivity       = $this->request->getPost('bike_mobile_connectivity');
            $bike_gps_navigation            = $this->request->getPost('bike_gps_navigation');
            $bike_usb_charging_port         = $this->request->getPost('bike_usb_charging_port');
            $bike_low_battery_indicator     = $this->request->getPost('bike_low_battery_indicator');
            $bike_under_seat_storage        = $this->request->getPost('bike_under_seat_storage');
            $bike_speedometer               = $this->request->getPost('bike_speedometer');
            $bike_stand_alarm               = $this->request->getPost('bike_stand_alarm');
            $bike_low_fuel_indicator        = $this->request->getPost('bike_low_fuel_indicator');
            $bike_low_oil_indicator         = $this->request->getPost('bike_low_oil_indicator');
            $bike_start_type                = $this->request->getPost('bike_start_type');
            $bike_kill_switch               = $this->request->getPost('bike_kill_switch');
            $bike_break_light               = $this->request->getPost('bike_break_light');
            $bike_turn_signal_indicator     = $this->request->getPost('bike_turn_signal_indicator');

            // Get the form input values
            $regular_price   = $this->request->getPost('regular_price');
            $selling_price   = $this->request->getPost('selling_price');
            $pricing_type    = $this->request->getPost('pricing_type');
            $created_by      = $this->session->get('adminData.loggedUserInfo.id');
            $created_datetime = date("Y-m-d H:i:s");

            // Prepare the data to be inserted
            $formData = [
                'unique_id'         => $uniqueId,   
                'branch_id'         => $branch_id,
                'vehicle_type'      => $vehicle_type,
                'cmp_id'            => $cmp_id,
                'model_id'          => $model_id,
                'fuel_type'         => $fuel_type,
                'variant_id'        => $variant_id,
                'mileage'           => $mileage,
                'kms_driven'        => $kms_driven,
                'owner'             => $owner,
                'transmission_id'   => $transmission_id,
                'color_id'          => $color_id,

                'manufacture_year'      => $manufacture_year,
                'registration_year'     => $registration_year,
                'registered_state_id'   => $registered_state_id,
                'rto'                   => $rto,
                
                'insurance_type'      => $insurance_type,
                'insurance_validity'  => date("Y-m-d",strtotime($insurance_validity)),

                'accidental_status' => $accidental_status,
                'flooded_status'    => $flooded_status,
                'last_service_kms'  => $last_service_kms,
                'last_service_date' => date("Y-m-d",strtotime($last_service_date)),

                'car_no_of_airbags'             => isset($car_no_of_airbags)?$car_no_of_airbags:'',
                'car_central_locking'           => isset($car_central_locking)?$car_central_locking:'',
                'car_seat_upholstery'           => isset($car_seat_upholstery)?$car_seat_upholstery:'',
                'car_sunroof'                   => isset($car_sunroof)?$car_sunroof:'',
                'car_integrated_music_system'   => isset($car_integrated_music_system)?$car_integrated_music_system:'',
                'car_rear_ac'                   => isset($car_rear_ac)?$car_rear_ac:'',
                'car_outside_rear_view_mirrors' => isset($car_outside_rear_view_mirrors)?$car_outside_rear_view_mirrors:'',
                'car_power_windows'             => isset($car_power_windows)?$car_power_windows:'',
                'car_engine_start_stop'         => isset($car_engine_start_stop)?$car_engine_start_stop:'',
                'car_headlamps'                 => isset($car_headlamps)?$car_headlamps:'',
                'car_power_steering'            => isset($car_power_steering)?$car_power_steering:'',

                'bike_headlight_type'           => isset($bike_headlight_type)?$bike_headlight_type:'',
                'bike_odometer'                 => isset($bike_odometer)?$bike_odometer:'',
                'bike_drl'                      => isset($bike_drl)?$bike_drl:'',
                'bike_mobile_connectivity'      => isset($bike_mobile_connectivity)?$bike_mobile_connectivity:'',
                'bike_gps_navigation'           => isset($bike_gps_navigation)?$bike_gps_navigation:'',
                'bike_usb_charging_port'        => isset($bike_usb_charging_port)?$bike_usb_charging_port:'',
                'bike_low_battery_indicator'    => isset($bike_low_battery_indicator)?$bike_low_battery_indicator:'',
                'bike_under_seat_storage'       => isset($bike_under_seat_storage)?$bike_under_seat_storage:'',
                'bike_speedometer'              => isset($bike_speedometer)?$bike_speedometer:'',
                'bike_stand_alarm'              => isset($bike_stand_alarm)?$bike_stand_alarm:'',
                'bike_low_fuel_indicator'       => isset($bike_low_fuel_indicator)?$bike_low_fuel_indicator:'',
                'bike_low_oil_indicator'        => isset($bike_low_oil_indicator)?$bike_low_oil_indicator:'',
                'bike_start_type'               => isset($bike_start_type)?$bike_start_type:'',
                'bike_kill_switch'              => isset($bike_kill_switch)?$bike_kill_switch:'',
                'bike_break_light'              => isset($bike_break_light)?$bike_break_light:'',
                'bike_turn_signal_indicator'    => isset($bike_turn_signal_indicator)?$bike_turn_signal_indicator:'',

                'regular_price' => $regular_price,
                'selling_price' => $selling_price,
                'pricing_type'  => $pricing_type,
                'created_by'    => $created_by,
                'created_datetime'=> $created_datetime
            ];

            // Insert the data into the database table
            $result = $this->VehicleModel->insert($formData);
            // Get the last inserted ID
            $lastInsertedId = $this->VehicleModel->getInsertID();

            if (!$result) {
                // Return a JSON response
                return $this->response->setJSON(['errors' => true, 'message' => 'Error occurred while inserting data.']);
            }

            // Commit the transaction if all insertions were successful
            $db->transCommit();

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Vehicle added successfully.','vehicleId'=>$lastInsertedId]);

        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            $db->transRollback();

            // Error handling and logging
            $logger = \Config\Services::logger();
            $logger->error('Error occurred while inserting vehicle information: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function edit_vehicle($vehicleId){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        $this->pageData['adminData'] = session()->get('adminData');
        $vehicleId = $this->decryptId($vehicleId);
        if($vehicleId==false){
            echo 'Access Denied'; exit;
        }
        $this->pageData['vehicleDetails'] = $this->VehicleModel->getVehicleDetails($vehicleId);
        $this->pageData['vehicleImagesDetails'] = $this->VehicleImagesModel->getVehicleImagesDetails($vehicleId);
        $this->pageData['showroomList'] = $this->BranchModel->findAll();
        $this->pageData['cmpList'] = $this->CompanyModel->findAll(); 
        if(isset($this->pageData['vehicleDetails']['cmp_id']) && !empty($this->pageData['vehicleDetails']['cmp_id'])){
            $this->pageData['cmpModelList'] = $this->CompanyModelModel->where('cmp_id', $this->pageData['vehicleDetails']['cmp_id'])->findAll();
        }
        $this->pageData['fuelTypeList'] = $this->CommonModel->get_fuel_types();
        $this->pageData['fuelVariantList'] = $this->CommonModel->get_fuel_variants();
        $this->pageData['transmissionList'] = $this->CommonModel->get_vehicle_transmissions();
        $this->pageData['colorList'] = $this->CommonModel->get_vehicle_colors();
        $this->pageData['stateList'] = $this->CommonModel->get_country_states(101);
        if(isset($this->pageData['vehicleDetails']['cmp_id']) && !empty($this->pageData['vehicleDetails']['cmp_id'])){
            $this->pageData['vehicleRegRtoList'] = $this->CommonModel->get_registered_state_rto($this->pageData['vehicleDetails']['registered_state_id']);
        }
        return view('admin/edit_vehicle',$this->pageData);
    }

    public function update_vehicle(){
        $db = db_connect();
        $db->transBegin();
        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'branch_id'         => 'required',
                'vehicle_type'      => 'required',
                'cmp_id'            => 'required',
                'model_id'          => 'required',
                'fuel_type'         => 'required',
                'variant_id'        => 'required',
                'mileage'           => 'required',
                'kms_driven'        => 'required',
                'owner'             => 'required',
                'transmission_id'   => 'required',
                'color_id'          => 'required',

                'manufacture_year'      => 'required',
                'registration_year'     => 'required',
                'registered_state_id'   => 'required',
                'rto'                   => 'required',

                'insurance_type'      => 'required',
                'insurance_validity'     => 'required',

                'accidental_status'  => 'required',
                'flooded_status'     => 'required',
                'last_service_kms'   => 'required',
                'last_service_date'  => 'required',
                
                'regular_price'  => 'required',
                'selling_price'  => 'required',
                'pricing_type'   => 'required',
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
            $vehicleId      = $this->request->getPost('vehicleId');
            $branch_id      = $this->request->getPost('branch_id');
            $vehicle_type   = $this->request->getPost('vehicle_type');
            $cmp_id         = $this->request->getPost('cmp_id');
            $model_id       = $this->request->getPost('model_id');
            $fuel_type      = $this->request->getPost('fuel_type');
            $variant_id     = $this->request->getPost('variant_id');
            $mileage        = $this->request->getPost('mileage',FILTER_SANITIZE_STRING);
            $kms_driven     = $this->request->getPost('kms_driven',FILTER_SANITIZE_STRING);
            $owner          = $this->request->getPost('owner');
            $transmission_id = $this->request->getPost('transmission_id');
            $color_id       = $this->request->getPost('color_id');

            // Get the form input values
            $manufacture_year       = $this->request->getPost('manufacture_year');
            $registration_year      = $this->request->getPost('registration_year');
            $registered_state_id    = $this->request->getPost('registered_state_id');
            $rto                    = $this->request->getPost('rto');

            // Get the form input values
            $insurance_type         = $this->request->getPost('insurance_type');
            $insurance_validity     = $this->request->getPost('insurance_validity');

            // Get the form input values
            $accidental_status   = $this->request->getPost('accidental_status');
            $flooded_status      = $this->request->getPost('flooded_status');
            $last_service_kms    = $this->request->getPost('last_service_kms');
            $last_service_date   = $this->request->getPost('last_service_date');

            // Get the form input values
            $car_no_of_airbags              = $this->request->getPost('car_no_of_airbags');
            $car_central_locking            = $this->request->getPost('car_central_locking');
            $car_seat_upholstery            = $this->request->getPost('car_seat_upholstery');
            $car_sunroof                    = $this->request->getPost('car_sunroof');
            $car_integrated_music_system    = $this->request->getPost('car_integrated_music_system');
            $car_rear_ac                    = $this->request->getPost('car_rear_ac');
            $car_outside_rear_view_mirrors  = $this->request->getPost('car_outside_rear_view_mirrors');
            $car_power_windows              = $this->request->getPost('car_power_windows');
            $car_engine_start_stop          = $this->request->getPost('car_engine_start_stop');
            $car_headlamps                  = $this->request->getPost('car_headlamps');
            $car_power_steering             = $this->request->getPost('car_power_steering');

            // Get the form input values
            $bike_headlight_type            = $this->request->getPost('bike_headlight_type');
            $bike_odometer                  = $this->request->getPost('bike_odometer');
            $bike_drl                       = $this->request->getPost('bike_drl');
            $bike_mobile_connectivity       = $this->request->getPost('bike_mobile_connectivity');
            $bike_gps_navigation            = $this->request->getPost('bike_gps_navigation');
            $bike_usb_charging_port         = $this->request->getPost('bike_usb_charging_port');
            $bike_low_battery_indicator     = $this->request->getPost('bike_low_battery_indicator');
            $bike_under_seat_storage        = $this->request->getPost('bike_under_seat_storage');
            $bike_speedometer               = $this->request->getPost('bike_speedometer');
            $bike_stand_alarm               = $this->request->getPost('bike_stand_alarm');
            $bike_low_fuel_indicator        = $this->request->getPost('bike_low_fuel_indicator');
            $bike_low_oil_indicator         = $this->request->getPost('bike_low_oil_indicator');
            $bike_start_type                = $this->request->getPost('bike_start_type');
            $bike_kill_switch               = $this->request->getPost('bike_kill_switch');
            $bike_break_light               = $this->request->getPost('bike_break_light');
            $bike_turn_signal_indicator     = $this->request->getPost('bike_turn_signal_indicator');

            // Get the form input values
            $regular_price   = $this->request->getPost('regular_price');
            $selling_price   = $this->request->getPost('selling_price');
            $pricing_type    = $this->request->getPost('pricing_type');
            $updated_by      = $this->session->get('adminData.loggedUserInfo.id');
            $updated_datetime = date("Y-m-d H:i:s");

            // Prepare the data to be updated
            $formData = [
                'branch_id'         => $branch_id,
                'vehicle_type'      => $vehicle_type,
                'cmp_id'            => $cmp_id,
                'model_id'          => $model_id,
                'fuel_type'         => $fuel_type,
                'variant_id'        => $variant_id,
                'mileage'           => $mileage,
                'kms_driven'        => $kms_driven,
                'owner'             => $owner,
                'transmission_id'   => $transmission_id,
                'color_id'          => $color_id,

                'manufacture_year'      => $manufacture_year,
                'registration_year'     => $registration_year,
                'registered_state_id'   => $registered_state_id,
                'rto'                   => $rto,
                
                'insurance_type'      => $insurance_type,
                'insurance_validity'  => date("Y-m-d",strtotime($insurance_validity)),

                'accidental_status' => $accidental_status,
                'flooded_status'    => $flooded_status,
                'last_service_kms'  => $last_service_kms,
                'last_service_date' => date("Y-m-d",strtotime($last_service_date)),

                'car_no_of_airbags'             => isset($car_no_of_airbags)?$car_no_of_airbags:'',
                'car_central_locking'           => isset($car_central_locking)?$car_central_locking:'',
                'car_seat_upholstery'           => isset($car_seat_upholstery)?$car_seat_upholstery:'',
                'car_sunroof'                   => isset($car_sunroof)?$car_sunroof:'',
                'car_integrated_music_system'   => isset($car_integrated_music_system)?$car_integrated_music_system:'',
                'car_rear_ac'                   => isset($car_rear_ac)?$car_rear_ac:'',
                'car_outside_rear_view_mirrors' => isset($car_outside_rear_view_mirrors)?$car_outside_rear_view_mirrors:'',
                'car_power_windows'             => isset($car_power_windows)?$car_power_windows:'',
                'car_engine_start_stop'         => isset($car_engine_start_stop)?$car_engine_start_stop:'',
                'car_headlamps'                 => isset($car_headlamps)?$car_headlamps:'',
                'car_power_steering'            => isset($car_power_steering)?$car_power_steering:'',

                'bike_headlight_type'           => isset($bike_headlight_type)?$bike_headlight_type:'',
                'bike_odometer'                 => isset($bike_odometer)?$bike_odometer:'',
                'bike_drl'                      => isset($bike_drl)?$bike_drl:'',
                'bike_mobile_connectivity'      => isset($bike_mobile_connectivity)?$bike_mobile_connectivity:'',
                'bike_gps_navigation'           => isset($bike_gps_navigation)?$bike_gps_navigation:'',
                'bike_usb_charging_port'        => isset($bike_usb_charging_port)?$bike_usb_charging_port:'',
                'bike_low_battery_indicator'    => isset($bike_low_battery_indicator)?$bike_low_battery_indicator:'',
                'bike_under_seat_storage'       => isset($bike_under_seat_storage)?$bike_under_seat_storage:'',
                'bike_speedometer'              => isset($bike_speedometer)?$bike_speedometer:'',
                'bike_stand_alarm'              => isset($bike_stand_alarm)?$bike_stand_alarm:'',
                'bike_low_fuel_indicator'       => isset($bike_low_fuel_indicator)?$bike_low_fuel_indicator:'',
                'bike_low_oil_indicator'        => isset($bike_low_oil_indicator)?$bike_low_oil_indicator:'',
                'bike_start_type'               => isset($bike_start_type)?$bike_start_type:'',
                'bike_kill_switch'              => isset($bike_kill_switch)?$bike_kill_switch:'',
                'bike_break_light'              => isset($bike_break_light)?$bike_break_light:'',
                'bike_turn_signal_indicator'    => isset($bike_turn_signal_indicator)?$bike_turn_signal_indicator:'',

                'regular_price' => $regular_price,
                'selling_price' => $selling_price,
                'pricing_type'  => $pricing_type,
                'updated_by'    => $updated_by,
                'updated_datetime'=> $updated_datetime
            ];

            // Update the data into the database table
            $result = $this->VehicleModel->updateData($vehicleId, $formData);

            if(!$result){
                // Return a JSON response
                return $this->response->setJSON(['errors' => true, 'message' => 'Error occurred while inserting data.']);
            }

            // Commit the transaction if all updations were successful
            $db->transCommit();

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Vehicle updated successfully.']);

        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            $db->transRollback();

            // Error handling and logging
            $logger = \Config\Services::logger();
            $logger->error('Error occurred while updating vehicle information: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function single_vehicle_info($vehicleId){
        if (!$this->session->get('adminData.isLoggedIn')) { /* Check if the admin is logged in */
            return redirect()->to('admin/login'); /* Admin is not logged in, redirect to the login page or show an error message */
        }
        $this->pageData['adminData'] = session()->get('adminData');
        $vehicleId = $this->decryptId($vehicleId);
        if($vehicleId==false){
            echo 'Access Denied'; exit;
        }
        $this->pageData['vehicleDetails'] = $this->VehicleModel->getVehicleDetails($vehicleId);
        $this->pageData['vehicleImagesDetails'] = $this->VehicleImagesModel->getVehicleImagesDetails($vehicleId);
        $this->pageData['showroomList'] = $this->BranchModel->findAll();
        $this->pageData['cmpList'] = $this->CompanyModel->findAll(); 
        if(isset($this->pageData['vehicleDetails']['cmp_id']) && !empty($this->pageData['vehicleDetails']['cmp_id'])){
            $this->pageData['cmpModelList'] = $this->CompanyModelModel->where('cmp_id', $this->pageData['vehicleDetails']['cmp_id'])->findAll();
        }
        $this->pageData['fuelTypeList'] = $this->CommonModel->get_fuel_types();
        $this->pageData['fuelVariantList'] = $this->CommonModel->get_fuel_variants();
        $this->pageData['transmissionList'] = $this->CommonModel->get_vehicle_transmissions();
        $this->pageData['colorList'] = $this->CommonModel->get_vehicle_colors();
        $this->pageData['stateList'] = $this->CommonModel->get_country_states(101);
        if(isset($this->pageData['vehicleDetails']['cmp_id']) && !empty($this->pageData['vehicleDetails']['cmp_id'])){
            $this->pageData['vehicleRegRtoList'] = $this->CommonModel->get_registered_state_rto($this->pageData['vehicleDetails']['registered_state_id']);
        }
        return view('admin/single_vehicle_info',$this->pageData);
    }

    public function remove_vehicle(){
        try {
            // Get the form input values
            $vehicleId      = $this->request->getPost('id');
            $updated_by      = $this->session->get('adminData.loggedUserInfo.id');
            $updated_datetime = date("Y-m-d H:i:s");

            // Retrieve user data
            $vehicleInfo = $this->VehicleModel->find($vehicleId);

            if ($vehicleInfo) {
                // Prepare the data to be updated
                $formData = [
                    'is_active'  => 3,
                    'updated_by'    => $updated_by,
                    'updated_datetime'=> $updated_datetime
                ];

                // Update the data into the database table
                $result = $this->VehicleModel->updateData($vehicleId,$formData);

                if(!$result){
                    // Return a JSON response
                    return $this->response->setJSON(['errors' => true, 'message' => 'Error occurred while removing data.']);
                }
    
                // Return a success JSON response
                return $this->response->setJSON(['success' => true, 'message' => 'Vehicle removed successfully.']);
            } else {
                // Return a JSON response
                return $this->response->setJSON(['errors' => true, 'message' => 'Vehicle data not found.']);
            }
        } catch (\Exception $e) {
            // Error handling and logging
            $logger = \Config\Services::logger();
            $logger->error('Error occurred while removing vehicle information: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }
    
}

?>