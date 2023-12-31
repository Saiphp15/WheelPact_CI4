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
 $routes->get('/view-all-stores', 'WebController::view_all_stores');
 $routes->get('/store-details/(:any)', 'WebController::store_details/$1');
 $routes->get('/vehicle-details/(:any)', 'WebController::vehicle_details/$1');
 $routes->get('/view-all-featured-vehicles', 'WebController::view_all_featured_vehicles');
 $routes->get('/view-all-latest-addition-vehicles', 'WebController::view_all_latest_addition_vehicles');
 $routes->get('/view-all-onsale-vehicles', 'WebController::view_all_onsale_vehicles');
 $routes->get('/reserve-vehicle/(:any)', 'WebController::reserve_vehicle/$1');
 
 $routes->match(['get', 'post'], 'load-more-featured-vehicles', 'WebController::load_more_featured_vehicles');
 $routes->match(['get', 'post'], 'load-more-latest-addition-vehicles', 'WebController::load_more_latest_addition_vehicles');
 $routes->match(['get', 'post'], 'load-more-onsale-vehicles', 'WebController::load_more_onsale_vehicles');
 
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

$routes->get('admin/view-vehicles', 'AdminController::view_vehicles');
$routes->get('admin/add-vehicle', 'AdminController::add_vehicle');
$routes->post('admin/save-vehicle', 'AdminController::save_vehicle');
$routes->post('admin/update-vehicle', 'AdminController::update_vehicle');
$routes->get('admin/edit-vehicle/(:any)', 'AdminController::edit_vehicle/$1');
$routes->get('admin/single-vehicle-info/(:any)', 'AdminController::single_vehicle_info/$1');

$routes->post('admin/remove-vehicle', 'AdminController::remove_vehicle');

$routes->post('upload/upload-thumbnail', 'UploadController::upload_thumbnail');
$routes->post('upload/upload-exterior-main-vehicle-images', 'UploadController::upload_exterior_main_vehicle_images');
$routes->post('upload/upload-interior-vehicle-images', 'UploadController::upload_interior_vehicle_images');
$routes->post('upload/upload-others-vehicle-images', 'UploadController::upload_others_vehicle_images');
/* Santosh Routing start */
$routes->get('admin/add-company', 'AdminController::add_company');
$routes->get('admin/view-companies', 'AdminController::view_companies');
$routes->get('admin/edit-vehicle-company/(:num)', 'AdminController::edit_vehicle_company/$1');
$routes->get('admin/single-vehicle-company-info/(:num)', 'AdminController::single_vehicle_company_info/$1');
$routes->post('admin/save-vehicle-company-models', 'AdminController::save_vehicle_company_models');
$routes->post('admin/edit-update-vehicle-company', 'AdminController::edit_update_vehicle_company');
$routes->post('admin/edit-update-vehicle-company-models', 'AdminController::edit_update_vehicle_company_models');
$routes->post('admin/remove-company', 'AdminController::remove_company');

$routes->post('admin/change-company-status/(:any)', 'AdminController::change_company_status/$1');
/* Santosh Routing End */

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

$routes->post('/api/customer/add-vehicle-wishlist', 'ApiController::add_vehicle_wishlist');
$routes->post('/api/customer/remove-vehicle-wishlist', 'ApiController::remove_vehicle_wishlist');

$routes->post('/api/customer/write-store-review', 'ApiController::write_store_review');
$routes->post('/api/customer/get-single-store-all-review', 'ApiController::get_single_store_all_review');



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
