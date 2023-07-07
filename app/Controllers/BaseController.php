<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

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
    var $pageData;

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

        $this->pageData['token'] = $this->request->getVar('token');

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

}
