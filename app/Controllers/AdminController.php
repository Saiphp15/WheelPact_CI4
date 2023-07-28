<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
use Exception;
use CodeIgniter\Services;
use App\Models\UserModel;
use App\Models\CommonModel;
use App\Models\BranchModel;
use App\Models\CompanyModel;
use App\Models\VehicleModel;

class AdminController extends BaseController{
    protected $UserModel;
    protected $CommonModel;
    protected $BranchModel;
    protected $CompanyModel;
    protected $VehicleModel;

    public function __construct()
    {
        // Create a Model instance
        $this->UserModel    = new UserModel();
        $this->CommonModel  = new CommonModel();
        $this->BranchModel  = new BranchModel();
        $this->CompanyModel = new CompanyModel();
        $this->VehicleModel = new VehicleModel();
    }
    
    public function index(){
        // Check if the admin is logged in
        if (!$this->session->get('adminData.isLoggedIn')) {
            // Admin is not logged in, redirect to the login page or show an error message
            return redirect()->to('admin/login');
        }
        return view('admin/dashboard');
    }

    public function dashboard(){
        // Check if the admin is logged in
        if (!$this->session->get('adminData.isLoggedIn')) {
            // Admin is not logged in, redirect to the login page or show an error message
            return redirect()->to('admin/login');
        }
        $this->pageData['adminData'] = session()->get('adminData');
        return view('admin/dashboard',$this->pageData);
    }

    public function add_branch(){
        // Check if the admin is logged in
        if (!$this->session->get('adminData.isLoggedIn')) {
            // Admin is not logged in, redirect to the login page or show an error message
            return redirect()->to('admin/login');
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
            $branchType = $this->request->getPost('branchType');
            $countryId = $this->request->getPost('chooseCountry');
            $stateId = $this->request->getPost('chooseState');
            $cityId = $this->request->getPost('chooseCity');
            $address = $this->request->getPost('address',FILTER_SANITIZE_STRING);

            // Prepare the data to be inserted
            $data = [
                'dealer_id' => $dealerId,
                'name' => $branchName,
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

    public function add_vehicle(){
        // Check if the admin is logged in
        if (!$this->session->get('adminData.isLoggedIn')) {
            // Admin is not logged in, redirect to the login page or show an error message
            return redirect()->to('admin/login');
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

    public function save_vehicle_form_step1(){
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
                'color_id'          => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
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

            // Prepare the data to be inserted
            $data = [
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
                'color_id'          => $color_id
            ];

            // Save the data to the session or a database (depending on your needs)
            session()->set('form_data_step1', $data);

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Validation succeeded.']);
        } catch (\Exception $e) {
            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while inserting step 1 form: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function save_vehicle_form_step2(){
        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'manufacture_year'      => 'required',
                'registration_year'     => 'required',
                'registered_state_id'   => 'required',
                'rto'                   => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
            $manufacture_year       = $this->request->getPost('manufacture_year');
            $registration_year      = $this->request->getPost('registration_year');
            $registered_state_id    = $this->request->getPost('registered_state_id');
            $rto                    = $this->request->getPost('rto');

            // Prepare the data to be inserted
            $data = [
                'manufacture_year'      => $manufacture_year,
                'registration_year'     => $registration_year,
                'registered_state_id'   => $registered_state_id,
                'rto'                   => $rto
            ];

            // Save the data to the session or a database (depending on your needs)
            session()->set('form_data_step2', $data);

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Validation succeeded.']);
        } catch (\Exception $e) {
            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while inserting step 2 form: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function save_vehicle_form_step3(){
        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'insurance_type'      => 'required',
                'insurance_validity'     => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
            $insurance_type       = $this->request->getPost('insurance_type');
            $insurance_validity      = $this->request->getPost('insurance_validity');

            // Prepare the data to be inserted
            $data = [
                'insurance_type'      => $insurance_type,
                'insurance_validity'  => $insurance_validity
            ];

            // Save the data to the session or a database (depending on your needs)
            session()->set('form_data_step3', $data);

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Validation succeeded.']);
        } catch (\Exception $e) {
            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while inserting step 3 form: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function save_vehicle_form_step4(){
        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'accidental_status'  => 'required',
                'flooded_status'     => 'required',
                'last_service_kms'   => 'required',
                'last_service_date'  => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
            $accidental_status   = $this->request->getPost('accidental_status');
            $flooded_status      = $this->request->getPost('flooded_status');
            $last_service_kms    = $this->request->getPost('last_service_kms');
            $last_service_date   = $this->request->getPost('last_service_date');

            // Prepare the data to be inserted
            $data = [
                'accidental_status' => $accidental_status,
                'flooded_status'    => $flooded_status,
                'last_service_kms'  => $last_service_kms,
                'last_service_date' => $last_service_date
            ];

            // Save the data to the session or a database (depending on your needs)
            session()->set('form_data_step4', $data);

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Validation succeeded.']);
        } catch (\Exception $e) {
            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while inserting step 4 form: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function save_vehicle_form_step5(){
        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'car_no_of_airbags'             => 'required',
                'car_central_locking'           => 'required',
                'car_seat_upholstery'           => 'required',
                'car_sunroof'                   => 'required',
                'car_integrated_music_system'   => 'required',
                'car_rear_ac'                   => 'required',
                'car_outside_rear_view_mirrors' => 'required',
                'car_power_windows'             => 'required',
                'car_engine_start_stop'         => 'required',
                'car_headlamps'                 => 'required',
                'car_power_steering'            => 'required',
                'bike_headlight_type'           => 'required',
                'bike_odometer'                 => 'required',
                'bike_drl'                      => 'required',
                'bike_mobile_connectivity'      => 'required',
                'bike_gps_navigation'           => 'required',
                'bike_usb_charging_port'        => 'required',
                'bike_low_battery_indicator'    => 'required',
                'bike_under_seat_storage'       => 'required',
                'bike_speedometer'              => 'required',
                'bike_stand_alarm'              => 'required',
                'bike_low_fuel_indicator'       => 'required',
                'bike_low_oil_indicator'        => 'required',
                'bike_start_type'               => 'required',
                'bike_kill_switch'              => 'required',
                'bike_break_light'              => 'required',
                'bike_turn_signal_indicator'    => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

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
            
            // Prepare the data to be inserted
            $data = [
                'car_no_of_airbags'             => $car_no_of_airbags,
                'car_central_locking'           => $car_central_locking,
                'car_seat_upholstery'           => $car_seat_upholstery,
                'car_sunroof'                   => $car_sunroof,
                'car_integrated_music_system'   => $car_integrated_music_system,
                'car_rear_ac'                   => $car_rear_ac,
                'car_outside_rear_view_mirrors' => $car_outside_rear_view_mirrors,
                'car_power_windows'             => $car_power_windows,
                'car_engine_start_stop'         => $car_engine_start_stop,
                'car_headlamps'                 => $car_headlamps,
                'car_power_steering'            => $car_power_steering,
                'bike_headlight_type'           => $bike_headlight_type,
                'bike_odometer'                 => $bike_odometer,
                'bike_drl'                      => $bike_drl,
                'bike_mobile_connectivity'      => $bike_mobile_connectivity,
                'bike_gps_navigation'           => $bike_gps_navigation,
                'bike_usb_charging_port'        => $bike_usb_charging_port,
                'bike_low_battery_indicator'    => $bike_low_battery_indicator,
                'bike_under_seat_storage'       => $bike_under_seat_storage,
                'bike_speedometer'              => $bike_speedometer,
                'bike_stand_alarm'              => $bike_stand_alarm,
                'bike_low_fuel_indicator'       => $bike_low_fuel_indicator,
                'bike_low_oil_indicator'        => $bike_low_oil_indicator,
                'bike_start_type'               => $bike_start_type,
                'bike_kill_switch'              => $bike_kill_switch,
                'bike_break_light'              => $bike_break_light,
                'bike_turn_signal_indicator'    => $bike_turn_signal_indicator
            ];

            // Save the data to the session or a database (depending on your needs)
            session()->set('form_data_step5', $data);

            // Return a success JSON response
            return $this->response->setJSON(['success' => true, 'message' => 'Validation succeeded.']);
        } catch (\Exception $e) {
            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while inserting step 5 form: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function save_vehicle_form_step6(){
        // Start the transaction
        $db = db_connect();
        $db->transBegin();

        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'regular_price'  => 'required',
                'selling_price'  => 'required',
                'pricing_type'   => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return errors in JSON format
                $errors = $validation->getErrors();
                return $this->response->setJSON(['success' => false, 'errors' => $errors]);
            }

            // Get the form input values
            $regular_price   = $this->request->getPost('regular_price');
            $selling_price   = $this->request->getPost('selling_price');
            $pricing_type    = $this->request->getPost('pricing_type');

            // Prepare the data to be inserted
            $data = [
                'regular_price' => $regular_price,
                'selling_price' => $selling_price,
                'pricing_type'  => $pricing_type
            ];

            // Save the data to the session or a database (depending on your needs)
            session()->set('form_data_step6', $data);

            // Process the entire form and save it in the database or perform other actions
            $formData = array_merge(session('form_data_step1'), session('form_data_step2'), session('form_data_step3'), session('form_data_step4'), session('form_data_step5'), session('form_data_step6'));
            // Save $formData to the database

            // Insert the data into the database table
            $result = $this->VehicleModel->insert($formData);

            if (!$result) {
                // Error occurred while inserting data
                // Return a success JSON response
                return $this->response->setJSON(['success' => true, 'message' => 'Vehicle added successfully.']);
            }

            // Clear the form data from the session after saving (optional)
            session()->remove('form_data_step1');
            session()->remove('form_data_step2');
            session()->remove('form_data_step3');
            session()->remove('form_data_step4');
            session()->remove('form_data_step5');
            session()->remove('form_data_step6');

            // Commit the transaction if all insertions were successful
            $db->transCommit();

        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            $db->transRollback();

            // Error handling and logging
            $logger = Services::logger();
            $logger->error('Error occurred while inserting step 6 form: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    
}

?>