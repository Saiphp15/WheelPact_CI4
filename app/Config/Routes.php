<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/* for language detection */
//$routes->setAutoRoute(false);
$routes->get('/', 'HomeController::index');
//$routes->get('/{locale}', 'HomeController::index');

/*
 * --------------------------------------------------------------------
 * Web Routing
 * --------------------------------------------------------------------
 */

 $routes->get('/home', 'HomeController::index');
 $routes->get('/vehicle-details/(:num)', 'VehicleController::vehicle_details/$1');
 $routes->get("/my-account", "CustomerController::my_account");
 $routes->get("/my-wishlist", "CustomerController::my_wishlist");
 $routes->get("/verify-otp/(:any)", "CustomerController::verify_otp/$1");

 /*
 * --------------------------------------------------------------------
 * Admin Routing
 * --------------------------------------------------------------------
 */

$routes->get('admin/generate_password', 'AuthController::generate_password');
$routes->get('admin/', 'AuthController::user_login');
$routes->get('admin/login', 'AuthController::user_login');
$routes->post('admin/authenticate', 'AuthController::chk_user_login');
$routes->get('admin/logout', 'AuthController::user_logout');
$routes->get('admin/dashboard', 'AdminController::dashboard');
$routes->get('admin/add-branch', 'AdminController::add_branch');
$routes->post('admin/save-branch', 'AdminController::save_branch');
$routes->get('admin/add-vehicle', 'AdminController::add_vehicle');
$routes->post('admin/save-vehicle', 'AdminController::save_vehicle');

$routes->post('admin/save-vehicle-form-step1', 'AdminController::save_vehicle_form_step1');
$routes->post('admin/save-vehicle-form-step2', 'AdminController::save_vehicle_form_step2');
$routes->post('admin/save-vehicle-form-step3', 'AdminController::save_vehicle_form_step3');
$routes->post('admin/save-vehicle-form-step4', 'AdminController::save_vehicle_form_step4');
$routes->post('admin/save-car-vehicle-form-step5', 'AdminController::save_car_vehicle_form_step5');
$routes->post('admin/save-bike-vehicle-form-step5', 'AdminController::save_bike_vehicle_form_step5');
$routes->post('admin/save-vehicle-form-step6', 'AdminController::save_vehicle_form_step6');

/*
 * --------------------------------------------------------------------
 * API Routing
 * --------------------------------------------------------------------
 */

$routes->post('/api/customer/customer-register', 'ApiController::customer_register');
$routes->post('/api/customer/customer-login', 'ApiController::customer_login');
$routes->post('/api/customer/customer-login-verify-otp', 'ApiController::customer_login_verify_otp');
$routes->post('/api/customer/generate-new-otp', 'ApiController::generate_new_otp');
$routes->post('/api/customer/update-otp-status', 'ApiController::update_otp_status');
$routes->post('/api/customer/customer-is-already-logined', 'ApiController::customer_is_already_logined');
$routes->post('/api/customer/chk-otp-status', 'ApiController::chk_otp_status');

$routes->post('/api/customer/customer-profile', 'ApiController::customer_profile');

$routes->get('/api/vehicle-details/(:num)', 'ApiController::get_vehicle_details/$1');
$routes->post('/api/country-states', 'ApiController::get_country_state');
$routes->post('/api/state-cities', 'ApiController::get_state_cities');

$routes->post('/api/cmp-models', 'ApiController::get_cmp_models');
$routes->post('/api/registered-state-rto', 'ApiController::get_registered_state_rto');


// $routes->get('/api/students', 'ApiController::index');
// $routes->post('/api/students', 'ApiController::create');
// $routes->get('/api/students/(:num)', 'ApiController::show/$1');
// $routes->post('/api/students/(:num)', 'ApiController::update/$1');
// $routes->delete('/api/students/(:num)', 'ApiController::delete/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
