<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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

$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::index');
$routes->get('/Register', 'Home::Register');
$routes->get('/RegisterRecruiter', 'Home::RRegister');
$routes->post('/ApplicantRegister', 'Home::ApplicantRegister');
$routes->post('/RegisteringRecruiter', 'Home::RecruiterRegister');
$routes->get('/Login', 'Home::LoginForm');

$routes->get('/otherReport', 'AdminC::ReportTwo');

$routes->get('/Rdashboard', 'RecruiterC::dashboard');
$routes->get('/PostJob', 'RecruiterC::jobpost');
$routes->post('/LoginA', 'Home::LoginVerify');
$routes->get('/Logout', 'Home::logout');
$routes->post('/LoginA', 'Home::LoginVerify');
$routes->get('/AppView/(:num)/(:num)', 'RecruiterC::ApplicationView/$1/$2');
$routes->get('/YourJob', 'RecruiterC::YourJobs');
$routes->post('/SaveJobPost', 'RecruiterC::SaveJobPost');
$routes->post('/updateStatus', 'RecruiterC::updateStatus');
$routes->get('/RAccountSettings', 'RecruiterC::RAccountSettings');
$routes->get('/RupdateAccount', 'RecruiterC::RupdateAccount');
$routes->post('/RupdateAccount', 'RecruiterC::RupdateAccount');
$routes->post('/RChangePassword', 'RecruiterC::ChangePassword');
 
$routes->get('/ApplyRequest', 'Home::loginpopup');
$routes->get('/RecruitersList', 'AdminC::rList');
$routes->post('/RecruitersList', 'AdminC::rList');

$routes->get('/AdminDashboard', 'AdminC::dashboard');
$routes->post('/joblist', 'AdminC::jobList');
$routes->get('/joblist', 'AdminC::jobList');
$routes->post('/AdeleteJob', 'AdminC::AdeleteJob');
$routes->get('/SettingsAd', 'AdminC::SettingsAdmin');
$routes->get('/AdupdateAccount', 'AdminC::updateAccount');
$routes->post('/AdupdateAccount', 'AdminC::updateAccount');
 $routes->post('/AdChangePassword', 'AdminC::ChangePassword');
$routes->get('/AdChangePassword', 'AdminC::ChangePassword');
//$routes->get('/generateJobPostingsReport', 'AdminC::generateJobPostingsReport');

$routes->get('/AdReport', 'AdminC::ReportsG');

$routes->post('/BrowseJobs', 'Home::BrowseJobs');

$routes->post('/AChangePassword', 'ApplicantC::ChangePassword');
$routes->get('/Adashboard', 'ApplicantC::dashboard');
$routes->get('/SearchJobs', 'ApplicantC::SearchJobs');
$routes->post('/SearchingJobs', 'ApplicantC::SearchingJobs');
$routes->post('/YourApplications', 'ApplicantC::yourApplications');
$routes->get('/YourApplications', 'ApplicantC::yourApplications');
$routes->get('/b', 'ApplicantC::getJobDetails');
$routes->post('/submitApplication', 'ApplicantC::submitA');
$routes->post('/deleteApplication', 'ApplicantC::deleteApplication');
$routes->get('/applyjob/(:num)/', 'ApplicantC::applyJob/$1');
$routes->get('/AccountSettings', 'ApplicantC::AccountSettings');
$routes->get('/updateAccount', 'ApplicantC::updateAccount');
$routes->post('/updateAccount', 'ApplicantC::updateAccount');


 /* --------------------------------------------------------------------
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
