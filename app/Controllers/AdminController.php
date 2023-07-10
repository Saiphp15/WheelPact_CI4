<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;

class AdminController extends BaseController{

    public function __construct()
    {
        // Check if the admin is logged in
        if (!session()->get('adminData.isLoggedIn')) {
            // Admin is not logged in, redirect to the login page or show an error message
            return redirect()->to('admin/login');
        }
    }
    
    public function index(){
        return view('admin/dashboard');
    }

    public function dashboard(){
        $this->pageData['adminData'] = session()->get('adminData');
        //echo '<pre>'; print_r($this->pageData['adminData']); exit;
        return view('admin/dashboard',$this->pageData);
    }
}

?>