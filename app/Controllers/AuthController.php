<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use App\Libraries\JwtLibrary;
use Exception;

class AuthController extends BaseController {
    
    use ResponseTrait;
		
	private $jwtLib;
	private $userModel;

	public function __construct() {
		$this->jwtLib = new JwtLibrary();
        $this->userModel = new UserModel();
	}

    public function register() {
        
		$name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
		$response = '';
        if(isset($name) && !empty($name)){
            if(isset($email) && !empty($email)){
                if(isset($password) && !empty($password)){
                    $user = $this->userModel->where('email', $email)->first();
                    if($user) {
                        $response = array(
                            'status'   => 409,
                            'messages' => 'User already exists'
                        );
                    } else {	
                        $this->userModel->save([
                            'name' => $name,
                            'email' => $email,
                            'password' => password_hash($password, PASSWORD_DEFAULT)
                        ]);	
                        $response = array(
                            'status'   => 200,
                            'messages' => 'User registered successfully'
                        );
                    }
                }else{
                    $response = array(
                        'status'   => 409,
                        'messages' => 'Required Password.'
                    );
                }
            }else{
                $response = array(
                    'status'   => 409,
                    'messages' => 'Required Email.'
                );
            }
        }else{
            $response = array(
				'status'   => 409,
				'messages' => 'Required Name.'
			);
        }
        return $this->respond($response);
    }
	
	public function login() {
		$email = $this->request->getVar('email');
        $password = $this->request->getPost('password');
        if(isset($email) && !empty($email)){
            if(isset($password) && !empty($password)){
                $user = $this->userModel->where('email', $email)->first();
                if($user) {
                    if (!$user || !password_verify($password, $user['password'])) {
                        $response = array(
                            'status'   => 409,
                            'messages' => 'Invalid Credentials!'
                        );
                    }else{
                        $headers = array('alg'=>'HS256','typ'=>'JWT');
                        $payload = array('id'=>$user['id'], 'email'=>$user['email'], 'exp'=>(time() + 60));
                        $jwt = $this->jwtLib->generate_jwt($headers, $payload);
                        $response = array(
                            'status'   => 200,
                            'messages' => 'Login Success.',
                            'token' => $jwt
                        );
                    }
                } else {	
                    $response = array(
                        'status'   => 401,
                        'messages' => 'No user found'
                    );
                }
            }else{
                $response = array(
                    'status'   => 409,
                    'messages' => 'Required Password.'
                );
            }
        }else{
            $response = array(
				'status'   => 409,
				'messages' => 'Required Email.'
			);
        }
        return $this->respond($response);
    }

    public function profile(){
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
        return $this->respond($response);
    }

}