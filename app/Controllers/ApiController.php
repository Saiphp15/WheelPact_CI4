<?php

namespace App\Controllers;
use App\Services\OTPService;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\VehicleModel;
use App\Models\CommonModel;
use App\Models\CompanyModelModel;
use App\Models\BranchModel;

use CodeIgniter\API\ResponseTrait;

use App\Libraries\JwtLibrary;
use CodeIgniter\HTTP\Response;

class ApiController extends BaseController
{
    use ResponseTrait;

    private $jwtLib;
    protected $CustomerModel;
    protected $UserModel;
    protected $VehicleModel;
    protected $CommonModel;
    protected $CompanyModelModel;
    protected $BranchModel;

    public function __construct()
    {
        $this->jwtLib = new JwtLibrary();
        $this->CustomerModel = new CustomerModel();
        $this->UserModel = new UserModel();
        $this->VehicleModel = new VehicleModel();
        $this->CommonModel = new CommonModel();
        $this->CompanyModelModel = new CompanyModelModel();
        $this->BranchModel = new BranchModel();
        
    }

    public function customer_register() {
		$name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $contact_no = $this->request->getVar('contact_no');
        $profile_picture = $this->request->getFile('profile_picture');
		$response = '';
        if(isset($name) && !empty($name)){
            if(isset($email) && !empty($email)){
                if(isset($contact_no) && !empty($contact_no)){
                    $customer = $this->CustomerModel->where('email', $email)->where('contact_no', $contact_no)->first();
                    if($customer) {
                        $response = array(
                            'responseCode'   => 409,
                            'responseMessage' => 'Customer already exists'
                        );
                    } else {	
                        $this->CustomerModel->save([
                            'name' => $name,
                            'email' => $email,
                            'contact_no' => $contact_no
                        ]);	
                        $response = array(
                            'responseCode'   => 200,
                            'responseMessage' => 'Customer registered successfully'
                        );
                    }
                }else{
                    $response = array(
                        'responseCode'   => 409,
                        'responseMessage' => 'Required Contact Number.'
                    );
                }
            }else{
                $response = array(
                    'responseCode'   => 409,
                    'responseMessage' => 'Required Email.'
                );
            }
        }else{
            $response = array(
				'responseCode'   => 409,
				'responseMessage' => 'Required Name.'
			);
        }
        return $this->response->setJSON($response);
    }
	
	public function customer_login() {
		$contact_no = $this->request->getVar('contact_no');
        if(isset($contact_no) && !empty($contact_no)){
            $customer = $this->CustomerModel->where('contact_no', $contact_no)->first();
            if($customer) {
                
                // Generate and store OTP
                $otp = OTPService::generateOTP();
                $this->CustomerModel->update($customer['id'], ['otp' => $otp, 'otp_status'=>true]);
                
                //$contact_no = $this->jwtLib->base64url_encode($customer['contact_no']);

                $response = array(
                    'responseCode'   => 200,
                    'responseMessage' => 'OTP generated successfully',
                    'responseData' => $contact_no
                );
            } else {
                $response = array(
                   'responseCode'   => 404,
                   'responseMessage' => 'Customer not found'
                );
            }
        }else{
            $response = array(
				'responseCode'   => 409,
				'responseMessage' => 'Required Contact Number.'
			);
        } 
        return $this->response->setJSON($response);
    }

    public function update_otp_status(){
        $contact_no = $this->request->getPost('contact_no');
        if(isset($contact_no) && !empty($contact_no)){
            $customer = $this->CustomerModel->where('contact_no', $contact_no)->first();
            if($customer) {
                
                // update OTP status
                $this->CustomerModel->update($customer['id'], ['otp_status'=>false]);
                
                $response = array(
                   'responseCode'   => 200,
                   'responseMessage' => 'OTP updated successfully'
                );
            } else {
                $response = array(
                  'responseCode'   => 404,
                  'responseMessage' => 'Customer not found'
                );
            }
        }else{
            $response = array(
               'responseCode'   => 409,
               'responseMessage' => 'Required Contact Number.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function generate_new_otp(){
        
        $contact_no = $this->request->getPost('contact_no');
        if(isset($contact_no) && !empty($contact_no)){
            $customer = $this->CustomerModel->where('contact_no', $contact_no)->first();
            if($customer) {
                
                // Generate and store OTP
                $otp = OTPService::generateOTP();
                $this->CustomerModel->update($customer['id'], ['otp' => $otp, 'otp_status'=>true]);
                
                $response = array(
                   'responseCode'   => 200,
                   'responseMessage' => 'OTP generated successfully'
                );
            } else {
                $response = array(
                  'responseCode'   => 404,
                  'responseMessage' => 'Customer not found'
                );
            }
        }else{
            $response = array(
               'responseCode'   => 409,
               'responseMessage' => 'Required Contact Number.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function customer_login_verify_otp()
    {
        $otp = $this->request->getVar('otp');
        $contact_no = $this->request->getVar('contact_no');
        if(isset($otp) && !empty($otp)){
            if(isset($contact_no) &&!empty($contact_no)){
                /* Verify OTP */
                $customer = $this->CustomerModel->where('contact_no', $contact_no)->where('otp', $otp)->where('otp_status', true)->first();
                if($customer) {
                    /* Update customer as verified */
                    $this->CustomerModel->update($customer['id'], ['otp_status' => false]);

                    $expiryTime = time() + 1500; /* 1500 seconds (25 minutes) from the current time */
                    //$expiryTime = time() + (24 * 60 * 60); /* 24 hours in seconds 
                    $headers = array('alg'=>'HS256','typ'=>'JWT');
                    $payload = array('id'=>$customer['id'], 'name'=>$customer['name'], 'email'=>$customer['email'], 'contact_no'=>$customer['contact_no'], 'exp'=>$expiryTime);
                    $jwt = $this->jwtLib->generate_jwt($headers, $payload);

                    /* Redirect to the dashboard or any other page */
                    $response = array(
                        'responseCode'   => 200,
                        'responseMessage' => 'OTP verified, Customer logged in successfully.',
                        //'responseData' => $customer,
                        'token' => $jwt
                    );
                } else {
                    $response = array(
                      'responseCode'   => 404,
                      'responseMessage' => 'Invalid OTP.'
                    );
                }
            }else{
                $response = array(
                    'responseCode'   => 409,
                    'responseMessage' => 'Required Contact Number.'
                );
            }
        }else{
            $response = array(
                'responseCode'   => 409,
                'responseMessage' => 'Required OTP.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function chk_otp_status(){
        $contact_no = $this->request->getVar('contact_no');
        if(isset($contact_no) &&!empty($contact_no)){
            $customer = $this->CustomerModel->where('contact_no', $contact_no)->where('otp_status', 1)->first();
            if($customer) {
                $response = array(
                   "responseCode" => 200,
                   "responseMessage" => "OTP verification pending, please Enter OTP and verify identity."
                );
            } else {
                $response = array(
                  'responseCode'   => 404,
                  'responseMessage' => 'Customer not found'
                );
            }
        }else{
            $response = array(
               'responseCode'   => 409,
               'responseMessage' => 'Required Contact Number.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function customer_is_already_logined(){
        $authorizationHeader = $this->request->getHeaderLine('Authorization');
        $token = str_replace('Bearer ', '', $authorizationHeader);
        $bearer_token = $this->jwtLib->get_bearer_token();
		$is_jwt_valid = $this->jwtLib->is_jwt_valid($bearer_token);
		if($is_jwt_valid) {
            if(isset($token) && !empty($token)){
                $decoded = $this->jwtLib->decode_jwt($token);
                $customerData = json_decode($decoded,true); 
                $customer = $this->CustomerModel->where('id', $customerData['id'])->first();
                if($customer) {
                    $response = array(
                        'responseCode'   => 200,
                        'responseMessage' => 'Customer logged in successfully',
                        'responseData' => $customer
                    );
                } else {
                    $response = array(
                        'responseCode'   => 404,
                        'responseMessage' => 'Customer not found'
                    );
                }
            }else{
                $response = array(
                    'responseCode'   => 409,
                    'responseMessage' => 'Required Token.'
                );
            }
		} else {
            $response = array(
                'responseCode'   => 409,
                'responseMessage' => 'Unauthorized Access'
            );
		}
        return $this->response->setJSON($response);
    }

    public function customer_profile(){
        $userId = $this->request->getVar('user_id');
        if(isset($userId) && !empty($userId)){
           
                $user = $this->userModel->where('id', $userId)->first();
                if($user) {
                    $response = array(
                        'status'   => 200,
                        'messages' => 'User profile data retrived successfully.',
                        'data' => $user
                    );
                } else {	
                    $response = array(
                        'status'   => 401,
                        'messages' => 'No user found'
                    );
                }
            
        }else{
            $response = array(
				'status'   => 409,
				'messages' => 'Required User ID.'
			);
        }
        return $this->response->setJSON($response);
    }

    public function get_vehicle_details($vehicleId){
        if(isset($vehicleId) &&!empty($vehicleId)){
            $vehicle = $this->VehicleModel->where('id', $vehicleId)->first();
            //echo '<pre>'; print_r($vehicle); exit; 
            if($vehicle) {
                $response = array(
                    'status'   => 200,
                    'messages' => 'Vehicle data retrived successfully.',
                    'data' => $vehicle
                );
            } else {    
                $response = array(
                    'status'   => 401,
                    'messages' => 'No record found'
                );
            }
        }else{
            $response = array(
                'status'   => 401,
                'messages' => 'vehicle id required'
            );
        }
        return $this->response->setJSON($response);
    }

    public function index()
    {
        $bearer_token = $this->jwtLib->get_bearer_token();
		$is_jwt_valid = $this->jwtLib->is_jwt_valid($bearer_token);
		if($is_jwt_valid) {
			$data = $this->UserModel->orderBy('id', 'DESC')->findAll();
            if($data){
                return $this->respond([
                    'status' => 200,
                    'message' => 'data retrived successfully',
                    'data' => $data
                ]);
            }else {
                return $this->respond([
                    'status' => 404,
                    'message' => $id . ' Not Found'
                ]);
            }
		} else {
			return $this->failUnauthorized('Unauthorized Access');
		}
    }

    public function get_country_state(){
        $countryId = $this->request->getVar('country_id');
        if(isset($countryId) &&!empty($countryId)){
            $states = $this->CommonModel->get_country_states($countryId);
            if($states) {
                $response = array(
                   'status'   => 200,
                   'messages' => 'State data retrived successfully.',
                    'data' => $states
                );
            } else {    
                $response = array(
                   'status'   => 401,
                   'messages' => 'No record found'
                );
            }
        }else{
            $response = array(
              'status'   => 401,
              'messages' => 'country id required'
            );
        }
        return $this->response->setJSON($response);
    }

    public function get_state_cities(){
        $stateId = $this->request->getVar('state_id');
        if(isset($stateId) &&!empty($stateId)){
            $cities = $this->CommonModel->get_state_cities($stateId);
            if($cities) {
                $response = array(
                   'status'   => 200,
                   'messages' => 'Cities data retrived successfully.',
                    'data' => $cities
                );
            } else {    
                $response = array(
                   'status'   => 401,
                   'messages' => 'No record found'
                );
            }
        }else{
            $response = array(
              'status'   => 401,
              'messages' => 'state id required'
            );
        }
        return $this->response->setJSON($response);
    }

    public function get_cmp_models(){
        $cmpId = $this->request->getVar('cmp_id');
        if(isset($cmpId) &&!empty($cmpId)){
            $models = $this->CompanyModelModel->where('cmp_id', $cmpId)->findAll();
            if($models) {
                $response = array(
                   'status'   => 200,
                   'messages' => 'Compay Model data retrived successfully.',
                    'data' => $models
                );
            } else {    
                $response = array(
                   'status'   => 401,
                   'messages' => 'No record found'
                );
            }
        }else{
            $response = array(
              'status'   => 401,
              'messages' => 'state id required'
            );
        }
        return $this->response->setJSON($response);
    }

    public function get_registered_state_rto(){
        $stateId = $this->request->getVar('state_id');
        if(isset($stateId) &&!empty($stateId)){
            $rtoList = $this->CommonModel->get_registered_state_rto($stateId);
            if($rtoList) {
                $response = array(
                   'status'   => 200,
                   'messages' => 'State RTO data retrived successfully.',
                   'data' => $rtoList
                );
            } else {    
                $response = array(
                   'status'   => 401,
                   'messages' => 'No record found'
                );
            }
        }else{
            $response = array(
              'status'   => 401,
              'messages' => 'state id required'
            );
        }
        return $this->response->setJSON($response);
    }

    public function add_vehicle_wishlist(){
        $customer_id = $this->request->getPost('customer_id');
        $vehicle_id = $this->request->getPost('vehicle_id');

        if(isset($customer_id) && !empty($customer_id)){
            if(isset($vehicle_id) && !empty($vehicle_id)){
                $data = array(
                    'customer_id' => $customer_id,
                    'vehicle_id' => $vehicle_id,
                    'created_by' => $customer_id,
                    'created_datetime' => DATETIME
                );
                $insertStatus = $this->CommonModel->add_vehicle_wishlist($data);
                if($insertStatus) {
                    
                    $response = array(
                        'responseCode'   => 200,
                        'responseMessage' => 'Vehicle Added into Wishlist Successfully'
                    );
                } else {
                    $response = array(
                        'responseCode'   => 404,
                        'responseMessage' => 'Error while inserting vehicle into wishlist'
                    );
                }
            }else{
                $response = array(
                    'responseCode'   => 409,
                    'responseMessage' => 'Required vehicle Id.'
                );
            }
        }else{
            $response = array(
               'responseCode'   => 409,
               'responseMessage' => 'Required customer Id.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function remove_vehicle_wishlist(){
        $customer_id = $this->request->getPost('customer_id');
        $vehicle_id = $this->request->getPost('vehicle_id');

        if(isset($customer_id) && !empty($customer_id)){
            if(isset($vehicle_id) && !empty($vehicle_id)){
                $data = array(
                    'customer_id' => $customer_id,
                    'vehicle_id' => $vehicle_id
                );
                $removeStatus = $this->CommonModel->remove_vehicle_wishlist($data);
                if($removeStatus) {
                    $response = array(
                        'responseCode'   => 200,
                        'responseMessage' => 'Vehicle Removed from Wishlist Successfully'
                    );
                } else {
                    $response = array(
                        'responseCode'   => 404,
                        'responseMessage' => 'Error while removing vehicle from wishlist'
                    );
                }
            }else{
                $response = array(
                    'responseCode'   => 409,
                    'responseMessage' => 'Required vehicle Id.'
                );
            }
        }else{
            $response = array(
               'responseCode'   => 409,
               'responseMessage' => 'Required customer Id.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function write_store_review(){
        $branch_id = $this->request->getPost('branch_id');
        $customer_id = $this->request->getPost('customer_id');
        $rating = $this->request->getPost('rate');
        $message = $this->request->getPost('message');

        if(isset($customer_id) && !empty($customer_id)){
            if(isset($branch_id) && !empty($branch_id)){
                $data = array(
                    'branch_id' => $branch_id,
                    'customer_id' => $customer_id,
                    'rating' => $rating,
                    'message' => $message,
                    'created_datetime' => DATETIME
                );
                $insertStatus = $this->BranchModel->save_store_review($data);
                if($insertStatus) {
                    $response = array(
                        'responseCode'   => 200,
                        'responseMessage' => 'Branch Review Added Successfully'
                    );
                } else {
                    $response = array(
                        'responseCode'   => 404,
                        'responseMessage' => 'Error while adding Branch Review'
                    );
                }
            }else{
                $response = array(
                    'responseCode'   => 409,
                    'responseMessage' => 'Required Branch Id.'
                );
            }
        }else{
            $response = array(
               'responseCode'   => 409,
               'responseMessage' => 'Required customer Id.'
            );
        }
        return $this->response->setJSON($response);
    }

    public function get_single_store_all_review(){
        $branch_id = $this->request->getPost('branch_id');
        $data = $this->BranchModel->get_single_store_all_review($branch_id);
        if ($data) {
            return $this->respond([
                'status' => 200,
                'message' => 'data retrived successfully',
                'data' => $data
            ]);
        } else {
            return $this->respond([
                'status' => 0,
                'message' => 'No Review Found'
            ]);
        }
    }

    /* CRUD Operations
    public function create()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'contact_no' => $this->request->getVar('contact_no'),
        ];
        $result = $this->UserModel->save($data);
        if ($result) {
            return $this->respond([
                'status' => 200,
                'message' => 'Student Add Successfully'
            ]);
        } else {
            return $this->respond([
                'status' => 500,
                'message' => 'Student Not Add Successfully'
            ]);
        }
    }

    public function show($id)
    {
        $data = $this->UserModel->find($id);
        if ($data) {
            return $this->respond([
                'status' => 200,
                'message' => 'data retrived successfully',
                'data' => $data
            ]);
        } else {
            return $this->respond([
                'status' => 0,
                'message' => $id . ' Not Found'
            ]);
        }
    }

    public function update($id)
    {
        $bearer_token = $this->jwtLib->get_bearer_token();
		$is_jwt_valid = $this->jwtLib->is_jwt_valid($bearer_token);
		if($is_jwt_valid) {
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'contact' => $this->request->getVar('contact'),
            ];

            $result = $this->UserModel->update($id, $data);
            if ($result) {
                return $this->respond([
                    'status' => 1,
                    'message' => 'Student Update Successfully'
                ]);
            } else {
                return $this->respond([
                    'status' => 0,
                    'message' => 'Student Not Update Successfully'
                ]);
            }
        } else {
            return $this->failUnauthorized('Unauthorized Access');
        }
    }

    public function delete($id)
    {
        $bearer_token = $this->jwtLib->get_bearer_token();
		$is_jwt_valid = $this->jwtLib->is_jwt_valid($bearer_token);
		if($is_jwt_valid) {
            $result = $this->UserModel->delete($id);
            if ($result) {
                return $this->respond([
                    'status' => 1,
                    'message' => 'Student Delete Successfully'
                ]);
            } else {
                return $this->respond([
                    'status' => 0,
                    'message' => $id . " Not Found, ' Student Not Delete Successfully"
                ]);
            }
        } else {
            return $this->failUnauthorized('Unauthorized Access');
        }
    }
    */
}