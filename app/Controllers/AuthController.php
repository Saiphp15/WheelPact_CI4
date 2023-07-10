<?php
namespace App\Controllers;


use CodeIgniter\Controller;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserCredentialModel;
use CodeIgniter\API\ResponseTrait;
use Exception;
use CodeIgniter\Services;

class AuthController extends BaseController {
    
    use ResponseTrait;
		
	private $UserModel;
    private $UserCredentialModel;

	public function __construct() {
        $this->UserModel = new UserModel();
        $this->UserCredentialModel = new UserCredentialModel();
	}

    public function generate_password(){
        echo password_hash('Admin@123', PASSWORD_DEFAULT);
    }
	
	public function user_login() {
		// Display admin login form
        return view('admin/login');
    }

    public function chk_user_login(){
        try {
            // Load the form validation library
            $validation = \Config\Services::validation();

            // Set validation rules for each form field
            $validation->setRules([
                'email' => 'required',
                'password' => 'required'
            ]);

            // Run the validation
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed, return to the form with errors
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }

            $email = $this->request->getPost('email');
            $plainPassword = $this->request->getPost('password');

            // Check if email and password exist in the usercredentials table
            $userCredentials = $this->UserModel->chkUserCredentials($email, $plainPassword);
            if(!$userCredentials) {
                return redirect()->back()->withInput()->with('errors', ['Invalid Credentials!']);
            }
            
            // Password exists, retrieve user data
            $userData = [
                'email' => $userCredentials['email'],
                'role_id' => $userCredentials['role_id'],
                'role_name' => $userCredentials['role_name'],
                'is_active' => $userCredentials['is_active']
            ];
            // Set admin session data
            $adminData = [
                'loggedUserInfo' => $userData,
                'isLoggedIn' => true
            ];
            session()->set('adminData', $adminData);
            // Redirect to admin dashboard or any other page
            return redirect()->to('admin/dashboard');

        } catch (\Exception $e) {
            
            // Error handling and logging
            //$logger = Services::logger();
            $logger = service('logger');
            $logger->error('Error occurred while super admin login: ' . $e->getMessage());

            // Throw or handle the exception as needed
            throw $e;
        }
    }

    public function user_logout()
    {
        // Destroy admin session data
        session()->remove('adminData');
        session()->destroy();

        // Redirect to admin login page
        return redirect()->to('admin/login');
    }

}