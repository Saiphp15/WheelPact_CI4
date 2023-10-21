<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;
use App\Libraries\JwtLibrary;

class CustomerController extends BaseController
{
    private $jwtLib;
    protected $CustomerModel;

    public function __construct()
    {
        $this->jwtLib = new JwtLibrary();
        $this->CustomerModel = new CustomerModel();
        
    }
    
    // public function save_customer(){
    //     if(isset($_POST['name']) && !empty($_POST['name'])){
    //         if(isset($_POST['email']) && !empty($_POST['email'])){
    //             if(isset($_POST['contact_no']) && !empty($_POST['contact_no'])){
    //                 $requestData = json_encode(array(
    //                     'name' => $_POST['name'],
    //                     'email' => $_POST['email'],
    //                     'contact_no' => $_POST['contact_no']
    //                 ));
    //                 $apiUrl = base_url('/api/customer/customer-register');
    //                 $apiResponse = $this->callAPI('POST', $apiUrl, $requestData); /* call api by curl */
    //                 $apiData = json_decode($apiResponse, true);
    //                 if($apiData['statusCode']===200){
    //                     $resp['responseCode'] = $apiData['statusCode'];
    //                     $resp['responseMessage'] = $apiData['statusMessage'];
    //                 }else{
    //                     $resp['responseCode'] = $apiData['statusCode'];
    //                     $resp['responseMessage'] = $apiData['statusMessage'];
    //                 }
    //             }else{
    //                 $resp['responseCode'] = 500;
    //                 $resp['responseMessage'] = 'Please enter your contact no';
    //             }
    //         }else{
    //             $resp['responseCode'] = 500;
    //             $resp['responseMessage'] = 'Please enter your email address';
    //         }
    //     }else{
    //         $resp['responseCode'] = 500;
    //         $resp['responseMessage'] = 'Please enter your name';
    //     }
    //     return json_encode($resp); exit;
    // }

    // public function customer_login(){
    //     if(isset($_POST['contact_no']) &&!empty($_POST['contact_no'])){
    //         $requestData = json_encode(array(
    //             'contact_no' => $_POST['contact_no']
    //         ));
    //         $apiUrl = base_url('/api/customer/customer-login');
    //         $apiResponse = $this->callAPI('POST', $apiUrl, $requestData); /* call api by curl */
    //         $apiData = json_decode($apiResponse, true);
    //         if($apiData['statusCode']===200){
    //             $resp['responseCode'] = $apiData['statusCode'];
    //             $resp['responseMessage'] = $apiData['statusMessage'];
    //             $resp['data'] = $apiData['data'];
    //         }else{
    //             $resp['responseCode'] = $apiData['statusCode'];
    //             $resp['responseMessage'] = $apiData['statusMessage'];
    //         }
    //     }else{
    //         $resp['responseCode'] = 500;
    //         $resp['responseMessage'] = 'Please enter your contact number';
    //     }
    //     return json_encode($resp); exit;
    // }
    
    public function my_account(){
        return view('user/my-account', $this->pageData);
    }

    public function my_wishlist(){
        return view('user/my-wishlist', $this->pageData);
    }

    public function verify_otp($data=''){
        if(isset($data) &&!empty($data)){
            $contact_no = $this->jwtLib->base64url_decode($data);
            $customer = $this->CustomerModel->where('contact_no', $contact_no)->where('otp_status', 1)->first();
            if($customer) {
                $this->pageData['contact_no'] = $this->jwtLib->base64url_decode($data);
                return view('user/verify-otp', $this->pageData);
            } else {
                return redirect()->to('/home');
            }
        }else{
            return redirect()->to('/home');
        }
    }

}
