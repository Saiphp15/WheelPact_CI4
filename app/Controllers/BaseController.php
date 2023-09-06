<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use Config\Services;

use App\Libraries\JwtLibrary;
use CodeIgniter\HTTP\Response;
use CodeIgniter\API\ResponseTrait;

use App\Models\CustomerModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    use ResponseTrait;

    private $jwtLib;
    protected $CustomerModel;

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['url','html','form','text','security','file','language','cookie'];

    /* "global" veriable */
    var $pageData = array();

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
        
        $this->pageData['locale'] = $request->getLocale();
        $this->pageData['supportedLocales'] = $request->config->supportedLocales;
        
        $this->pageData['customerData'] = '';
        $cookieToken = $request->getCookie('token');
        if ($cookieToken !== null) {
            $this->pageData['token'] = $cookieToken;
            $this->jwtLib = new JwtLibrary();
            if(isset($cookieToken) && !empty($cookieToken)){
                $decoded = $this->jwtLib->decode_jwt($cookieToken);
                $customerData = json_decode($decoded,true); 
                $this->CustomerModel = new CustomerModel();
                $customer = $this->CustomerModel->where('id', $customerData['id'])->first();
                if($customer) {
                    $this->pageData['customerData'] = $customer;
                }
            }
        } else {
            $this->pageData['token'] = "";
        }

    }

    function callAPI($method, $url, $data){
        /* Load the HTTPClient library */
        $client = \Config\Services::curlrequest();
        $curl = curl_init();
        switch ($method){
           case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data); /* Set the request payload */
                break;
           case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
                break;
           default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        /* OPTIONS: */
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Access-Control-Allow-Origin: *",
            "Access-Control-Allow-Methods: GET, POST, OPTIONS",
            "Access-Control-Allow-Headers: Content-Type",
            'Content-Type: application/json',
         ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        /* EXECUTE: */
        $result = curl_exec($curl);
        //echo '<pre>'; print_r(json_decode($result,true)); exit;
        if(!$result){die("Connection Failure");}
        /* $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); */
        return $result;
    }

    public function uploadImage($fieldId){
        $imgUrl = '';

        $file = $this->request->getFile($fieldId);
        $newName = $file->getRandomName(); // Generate a new name for the image to prevent name conflicts
        $file->move(ROOTPATH . 'public/uploads/vehicle_'.$fieldId, $newName); // Move the uploaded file to the public/uploads directory
        $imgUrl = base_url('uploads/vehicle_'.$fieldId.'/' . $newName); // Get the image URL to display in the preview
        /*
        switch ($fieldId) {
            case 'exterior_main_front_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_front_img');
                $newName = $exterior_main_front_img->getRandomName(); // Generate a new name for the image to prevent name conflicts
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_front_img', $newName); // Move the uploaded file to the writable/uploads directory
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_front_img/' . $newName); // Get the image URL to display in the preview
                break;
            case 'exterior_main_right_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_right_img');
                $newName = $exterior_main_front_img->getRandomName(); 
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_right_img', $newName); 
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_right_img/' . $newName); 
                break;
            case 'exterior_main_back_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_back_img');
                $newName = $exterior_main_front_img->getRandomName(); 
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_back_img', $newName); 
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_back_img/' . $newName); 
                break;
            case 'exterior_main_left_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_left_img');
                $newName = $exterior_main_front_img->getRandomName(); 
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_left_img', $newName); 
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_left_img/' . $newName); 
                break;
            case 'exterior_main_roof_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_roof_img');
                $newName = $exterior_main_front_img->getRandomName(); 
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_roof_img', $newName); 
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_roof_img/' . $newName); 
                break;
            case 'exterior_main_bonetopen_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_bonetopen_img');
                $newName = $exterior_main_front_img->getRandomName(); 
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_bonetopen_img', $newName); 
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_bonetopen_img/' . $newName); 
                break;
            case 'exterior_main_engine_img':
                $exterior_main_front_img = $this->request->getFile('exterior_main_engine_img');
                $newName = $exterior_main_front_img->getRandomName(); 
                $exterior_main_front_img->move(ROOTPATH . 'writable/uploads/vehicle_exterior_main_engine_img', $newName); 
                $imgUrl = base_url('writable/uploads/vehicle_exterior_main_engine_img/' . $newName); 
                break;
            case 'default':  
                break;
        }
        */
        return $imgUrl;
    }

    public function encryptId($id){
        $data = array(
            "vehicle_id" => $id
        );
        $token = base64_encode(json_encode($data));
        return $token;
    }

    public function decryptId($encryptedId){
        $decodedToken = json_decode(base64_decode($encryptedId), true);
        if ($decodedToken) {
            return $decodedToken["vehicle_id"];
        } else {
            return false;
        }
    }

    public function calculateEMI($loanAmount, $annualInterestRate, $loanTenureMonths) {
        // Convert annual interest rate to monthly interest rate
        $monthlyInterestRate = ($annualInterestRate / 12) / 100;
    
        // Calculate the number of monthly installments
        $numOfMonths = $loanTenureMonths;
    
        // Calculate EMI using the formula
        $emi = ($loanAmount * $monthlyInterestRate * pow((1 + $monthlyInterestRate), $numOfMonths)) / (pow((1 + $monthlyInterestRate), $numOfMonths) - 1);
    
        return $emi;
    }

}
