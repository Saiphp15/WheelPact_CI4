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

class AdminController extends BaseController{
    protected $UserModel;
    protected $CommonModel;
    protected $BranchModel;
    protected $CompanyModel;

    public function __construct()
    {
        // Create a Model instance
        $this->UserModel    = new UserModel();
        $this->CommonModel  = new CommonModel();
        $this->BranchModel  = new BranchModel();
        $this->CompanyModel = new CompanyModel();
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
            $logger->error('Error occurred while adding family members: ' . $e->getMessage());

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
        return view('admin/add_vehicle',$this->pageData);
    }
}

?>